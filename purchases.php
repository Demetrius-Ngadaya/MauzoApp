
<?php

session_start();
include("dbcon.php");

if(!isset($_SESSION['user_session'])){


    header("location:index.php");
}


   $invoice_number = $_GET['invoice_number'];

   if(isset($_POST['update'])){

$id = $_POST['id'];
$med_name = $_POST['med_name'];  
$category = $_POST['category'];    
$quantity =  $_POST['used_quantity'] + $_POST['received_quantity'] + $_POST['act_remain_quantity'];
$used_qty = $_POST['used_quantity'];
$remain_quantity = $_POST['received_quantity'] + $_POST['act_remain_quantity'] ;  
$act_remain_quantity = $_POST['received_quantity'] + $_POST['act_remain_quantity'];  
$exp_date= strtotime($_POST['exp_date']); 
$new_exp_date = date('Y-m-d',$exp_date);
$company =  $_POST['company']; 
$received_date =  $_POST['received_date']; 
$receipt_number =  $_POST['receipt_number']; 
$batch_number =  $_POST['batch_number']; 
$old_quantity = $_POST['act_remain_quantity']; 
$received_quantity =  $_POST['received_quantity']; 
$sell_type = $_POST['sell_type'];
$actual_price = $_POST['actual_price'];  
$selling_price = $_POST['selling_price'];
$profit_price = $_POST['profit_price'];
$credit_amount = $_POST['received_quantity'] * $_POST['actual_price'];
$status = 'Available'; 
$created_by = $_SESSION['user_session']; 
$purchases_status = 'cash'; 

  // HAPA UNAWEZA KUECHO KITU CHOCHOTE KIFUNGUKE MDA WA KU LOAD
  $sql=" UPDATE stock SET medicine_name='$med_name',category='$category',quantity='$quantity', used_quantity='$used_qty', remain_quantity= '$act_remain_quantity',act_remain_quantity='$act_remain_quantity',expire_date='$new_exp_date',company='$company',sell_type='$sell_type',actual_price='$actual_price',selling_price='$selling_price',profit_price='$profit_price',status='$status' WHERE id = '$id' ";

   $result =mysqli_query($con,$sql); 
   
  $sql="INSERT INTO purchases_report(medicine_name, category, old_quantity,received_quantity, receipt_number,batch_number,received_date, expire_date, company, sell_type, actual_price, selling_price, profit_price, credit_amount,created_by, status) 
  VALUES ('$med_name', '$category', '$old_quantity', '$received_quantity', '$receipt_number','$batch_number','$received_date','$new_exp_date', '$company', '$sell_type', '$actual_price', '$selling_price', '$profit_price', '$credit_amount','$created_by', '$purchases_status')";
  
     $result =mysqli_query($con,$sql);
     if ($result) {
      $_SESSION['success_message'] = "New purchases details recorded successfuly!";
      header("Location: record_purchases.php?invoice_number=$invoice_number");
  } else {
      echo "<div style='color: red; text-align: center;'>Failed to record product purchase record!</div>";
  }
 
}
 
?>