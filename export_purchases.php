<?php
// Include database connection file
include("dbcon.php");

// Include FPDF library
require('fpdf/fpdf.php');

// Fetch data between specified dates and other filters
$d1 = $_GET['d1'];
$d2 = $_GET['d2'];
$medicine = isset($_GET['medicine_name']) ? $_GET['medicine_name'] : '';
$category = isset($_GET['received_date']) ? $_GET['received_date'] : '';
$category = isset($_GET['category']) ? $_GET['category'] : '';

// Initialize the SQL query
$select_sql = "SELECT * FROM purchases_report WHERE received_date BETWEEN '$d1' AND '$d2'";

// Append additional filters if they are provded
if (!empty($medicine_name)) {
    $select_sql .= " AND medicine_name LIKE '%$medicine_name %'";
}
if (!empty($received_date)) {
    $select_sql .= " AND received_date LIKE '%$received_date%'";
}
if (!empty($category)) {
    $select_sql .= " AND category LIKE '%$category%'";
}

$select_sql .= " ORDER BY received_date ASC";
$select_query = mysqli_query($con, $select_sql);

// Initialize FPDF
$pdf = new FPDF();
$pdf->AddPage();

// Set font for the entire document
$pdf->SetFont('Arial', '', 12);

// Add a title
$pdf->Cell(0, 10, 'D_TECH PHARMACY', 0, 1, 'C');
$pdf->Cell(0, 10, 'Product Purchases report', 0, 1, 'C');

// Add a line break
$pdf->Ln(10);

// Add a table header
$pdf->Cell(10, 10, 'No', 1, 0, 'C');  // Serial number column
$pdf->Cell(30, 10, 'Received Date', 1, 0, 'C');
$pdf->Cell(40, 10, 'Medicine', 1, 0, 'C');
$pdf->Cell(30, 10, 'Quantity', 1, 0, 'C');
$pdf->Cell(30, 10, 'Amount', 1, 0, 'C');
$pdf->Cell(30, 10, 'Batch number', 1, 0, 'C');
$pdf->Cell(30, 10, 'Receipt number', 1, 0, 'C');

// Initialize the serial number
$serial_number = 0;

// Add data from the database
while ($row = mysqli_fetch_array($select_query)) {
    $pdf->Cell(10, 10, $serial_number++, 1, 0, 'C');  // Print serial number and increment it
    $pdf->Cell(30, 10, $row['received_date'], 1, 0, 'C');
    $pdf->Cell(40, 10, $row['medicine_name'], 1, 0, 'C');
    $pdf->Cell(30, 10, $row['received_quantity'], 1, 0, 'C');
    $pdf->Cell(30, 10, number_format($row['credit_amount'], 2), 1, 0, 'C'); // Format profit
    $pdf->Cell(30, 10, $row['batch_number'], 1, 0, 'C');
    $pdf->Cell(30, 10, $row['receipt_number'], 1, 1, 'C');
}

// Fetch the sum of total_amount and total_profit
$sum_sql = "SELECT SUM(credit_amount) AS credit_amount, SUM(received_quantity) AS received_quantity FROM purchases_report WHERE received_date BETWEEN '$d1' AND '$d2'";
if (!empty($medicine_name)) {
    $select_sql .= " AND medicine_name LIKE '%$medicine_name %'";
}
if (!empty($received_date)) {
    $select_sql .= " AND received_date LIKE '%$received_date%'";
}
if (!empty($category)) {
    $select_sql .= " AND category LIKE '%$category%'";
}
$sum_query = mysqli_query($con, $sum_sql);
$sum_row = mysqli_fetch_array($sum_query);

$total_credit_amount = $sum_row['credit_amount'];
$total_received_quantity = $sum_row['received_quantity'];

// Add a line break before the summary
$pdf->Ln(10);

// Add summary for total_amount and total_profit
$pdf->Cell(0, 10, 'Total:', 0, 1, 'C');
$pdf->Cell(0, 10, 'Total products purchased: ' . $total_received_quantity . ' ', 0, 1, 'C');
$pdf->Cell(0, 10, 'Total amount of money value: ' . number_format($total_credit_amount, 2) . ' Tsh', 0, 1, 'C');

// Output PDF
$pdf->Output('Product purchase report.pdf', 'D');
?>
