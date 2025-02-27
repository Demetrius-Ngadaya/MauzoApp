<?php
include "dbcon.php";
require "fpdf.php";
session_start();

if(!isset($_SESSION['user_session'])){
    header("location:index.php");
}

function generate_unique_invoice_number($con) {
    $is_unique = false;
    $invoice_number = '';
    
    while (!$is_unique) {
        $invoice_number = "CA-" . generate_random_number();
        $check_sql = "SELECT COUNT(*) AS count FROM on_hold WHERE invoice_number = ?";
        $stmt = $con->prepare($check_sql);
        $stmt->bind_param("s", $invoice_number);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        
        if ($row['count'] == 0) {
            $is_unique = true;
        }
    }
    
    return $invoice_number;
}

function generate_random_number() {
    $chars = "09302909209300923";
    srand((double)microtime() * 1000000);
    $i = 1;
    $pass = '';

    while ($i <= 7) {
        $num  = rand() % 10;
        $tmp  = substr($chars, $num, 1);
        $pass = $pass . $tmp;
        $i++;
    }
    
    return $pass;
}

class myPDF extends FPDF{

    function header() {
        $invoice_number = $_POST['invoice_number'];
        $date = $_POST['date'];

        $this->SetFont('Arial','B',20);
        $this->Cell(276,10,'D_TECH PHARMACY',0,0,'C');
        $this->Ln();
        $this->Cell(276,10,'P.O.BOX 196,IFAKARA',0,0,'C');
        $this->Ln();
        $this->Cell(276,10,'TEL:0655551379',0,0,'C');
        $this->Ln();
        $this->Cell(276,10,'TIN:131-913-184,VRN:40-025450-R',0,0,'C');
        $this->Cell(80,40,'Namba ya oda:'.$invoice_number,0,0,'C');
        $this->Ln();
        $this->Cell(50,-10,$date,0,0,'C');
        $this->Ln(10);
    }

    function footer() {
        $this->Cell(276,10,'Asante,Karibu tena',0,0,'C');
        $this->Ln(20);
    }

    function headerTable() {
        $this->SetFont('Times','B',15);
        $this->Cell(40,10,'Jina la Dawa',1,0,'C');
        $this->Cell(40,10,'Aina ya Dawa',1,0,'C');
        $this->Cell(40,10,'Idadi',1,0,'C');
        $this->Cell(50,10,'Bei',1,0,'C');
        $this->Cell(50,10,'Njia ya malipo',1,0,'C');
        $this->Cell(100,10,'Kiasi',1,0,'C');
        $this->Ln();
    }

    function viewTable() {
        include "dbcon.php";

        $paid_amount = $_POST['paid_amount'];
        $invoice_number = $_POST['invoice_number'];

        $select_sql = "SELECT * FROM on_hold where invoice_number = '$invoice_number'";
        $select_query = mysqli_query($con,$select_sql);

        while($row = mysqli_fetch_array($select_query)) {
            $this->SetFont('Times','',12);
            $this->Cell(40,10,$row['medicine_name'],1,0,'C');
            $this->Cell(40,10,$row['category'],1,0,'C');
            $this->Cell(40,10,$row['qty']."(".$row['type'].")",1,0,'C');
            $this->Cell(50,10,$row['cost'],1,0,'C');
            $this->Cell(50,10,$row['payment_method'],1,0,'C');
            $this->Cell(100,10,$row['amount'],1,0,'C');
            $this->Ln();
        }

        $select_sql = "SELECT sum(amount) from on_hold where invoice_number = '$invoice_number'";
        $select_sql = mysqli_query($con,$select_sql); 

        while($row = mysqli_fetch_array($select_sql)) {
            $amount =  $row['sum(amount)'];

            $this->Cell(170,10,'Jumla',1,0,'C');
            $this->Cell(100,10,$amount,1,0,'C');
            $this->Ln();
        
            $this->SetFont('Times','B',15);
            $this->Cell(170,10,'Jina la mteja',1,0,'C');
            $this->Cell(100,10,$paid_amount,1,0,'C');
            $this->Ln();
            $this->SetFont('Times','B',20);
            $this->Ln(20);
        }
    }
}

$date1 = date("YMd");

if (!file_exists("C:/invoices")) {
    mkdir("C:/invoices");
}
if (!file_exists("C:/invoices/$date1")) {
    mkdir("C:/invoices/$date1");
}
if (!file_exists("C:/invoices/all_invoices")) {
    mkdir("C:/invoices/all_invoices");
}
if (isset($_POST['submit'])) {
    $invoice_number = $_POST['invoice_number'];
    $date = $_POST['date'];
    $created_by = $_POST['created_by'];

    $medicine_names = isset($_POST['medicine_name']) ? (array)$_POST['medicine_name'] : array();
    $quantities = isset($_POST['qty']) ? (array)$_POST['qty'] : array();
    $paid_amount = isset($_POST['paid_amount']) ? mysqli_real_escape_string($con, $_POST['paid_amount']) : '';

    $pdf = new myPDF();
    $pdf->AddPage('L', 'A4', 0);
    $pdf->headerTable();
    $pdf->viewTable();
    
    $filename = "i-" . $invoice_number . ".pdf";
    $pdf->Output('C:/invoices/' . $date1 . '/' . $filename, 'F');
    $pdf->Output('C:/invoices/all_invoices/' . $filename, 'F');

    foreach ($medicine_names as $index => $medicine_name) {
        $quantity = $quantities[$index];
        
        // Fetch medicine details from `on_hold`
        $select_on_hold = "SELECT * FROM on_hold WHERE invoice_number = '$invoice_number' AND medicine_name = '$medicine_name'";
        $select_on_hold_query = mysqli_query($con, $select_on_hold);
        $row = mysqli_fetch_array($select_on_hold_query);

        $category = $row['category'];
        $expire_date = $row['expire_date'];
        $amount = $row['amount'];
        $profit_amount = $row['profit_amount'];
        $payment_method = $row['payment_method'];
        $status = $row['hali_ya_malipo'];
        $phone_number = $row['phone_number'];
        $date_to_pay = $row['date_to_pay'];

        // Fetch medicine ID from `stock`
        $select_stock = "SELECT id, act_remain_quantity FROM stock WHERE medicine_name = '$medicine_name' AND category = '$category' AND expire_date = '$expire_date'";
        $select_stock_query = mysqli_query($con, $select_stock);
        $stock_row = mysqli_fetch_array($select_stock_query);
        $medicine_id = $stock_row['id'];
        $remain_quantity = $stock_row['act_remain_quantity'];

        // Insert sales record into `sales` table
        $insert_sql = "INSERT INTO sales (medicine_id, invoice_number, medicines, category, quantity, total_amount, total_profit, payment_method,phone_number,date_to_pay, customer_name, created_by, date,hali_ya_malipo) 
                       VALUES('$medicine_id', '$invoice_number', '$medicine_name', '$category', '$quantity', '$amount', '$profit_amount', '$payment_method','$phone_number','$date_to_pay','$paid_amount', '$created_by', '$date', '$status')";
        $insert_query = mysqli_query($con, $insert_sql);

        if ($insert_query) {
            // Update stock
            $new_remain_quantity = $remain_quantity - $quantity;
            $update_stock = "UPDATE stock SET act_remain_quantity = '$new_remain_quantity' WHERE id = '$medicine_id'";
            $update_stock_query = mysqli_query($con, $update_stock);

            if (!$update_stock_query) {
                $_SESSION['message'] = "Failed to update stock for medicine: $medicine_name.";
                $_SESSION['message_type'] = "error";
                break;
            }
        } else {
            $_SESSION['message'] = "Failed to insert sales data for medicine: $medicine_name.";
            $_SESSION['message_type'] = "error";
            break;
        }
    }

    if (!isset($_SESSION['message_type']) || $_SESSION['message_type'] == "success") {
        $_SESSION['message'] = "Sales transaction completed successfully.";
        $_SESSION['message_type'] = "success";
    }

    $new_invoice_number = generate_unique_invoice_number($con);
    header("location:cashierPOS.php?invoice_number=$new_invoice_number");
}