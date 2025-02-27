<?php
// Include database connection file
include("dbcon.php");

// Include FPDF library
require('fpdf/fpdf.php');

$created_by = isset($_GET['created_by']) ? $_GET['created_by'] : '';
$medicine_name = isset($_GET['medicine_name']) ? $_GET['medicine_name'] : '';
$category = isset($_GET['category']) ? $_GET['category'] : '';
$company = isset($_GET['company']) ? $_GET['company'] : '';

// Initialize the SQL query
$select_sql = "SELECT * FROM stock WHERE 1=1";

// Append additional filters if they are provided
if (!empty($created_by)) {
    $select_sql .= " AND created_by LIKE '%$created_by%'";
}
if (!empty($medicine_name)) {
    $select_sql .= " AND medicine_name LIKE '%$medicine_name%'";
}
if (!empty($category)) {
    $select_sql .= " AND category LIKE '%$category%'";
}
if (!empty($company)) {
    $select_sql .= " AND company LIKE '%$company%'";
}

// $select_sql .= " ORDER BY Date DESC";
$select_query = mysqli_query($con, $select_sql);

// Initialize FPDF
$pdf = new FPDF();
$pdf->AddPage();
// Add the company logo
// $pdf->Image('images/logo.JPEG', 10, 6, 30);
// Set font for the entire document
$pdf->SetFont('Arial', '', 12);

// Add a title
$pdf->Cell(0, 10, 'D_TECH PHARMACY', 0, 1, 'C');
$pdf->Cell(0, 10, 'Ripoti ya Dawa', 0, 1, 'C');

// Add a line break
$pdf->Ln(10);

// Add a table header
$pdf->Cell(10, 10, 'No', 1, 0, 'C');  // Serial number column
$pdf->Cell(50, 10, 'Jina la Dawa', 1, 0, 'C');
$pdf->Cell(35, 10, 'Bei ya kununulia', 1, 0, 'C');
$pdf->Cell(30, 10, 'Bei ya kuuzia', 1, 0, 'C');
$pdf->Cell(30, 10, 'Idadi iliyopo', 1, 0, 'C');
$pdf->Cell(30, 10, 'Idadi iliyouzwa', 1, 1, 'C');

// Initialize the serial number
$serial_number = 1;

// Add data from the database
while ($row = mysqli_fetch_array($select_query)) {
    $pdf->Cell(10, 10, $serial_number++, 1, 0, 'C');  // Print serial number and increment it
    $pdf->Cell(50, 10, $row['medicine_name'], 1, 0, 'C');
    $pdf->Cell(35, 10, number_format($row['actual_price'], 2), 1, 0, 'C'); // Format amount
    $pdf->Cell(30, 10, number_format($row['selling_price'], 2), 1, 0, 'C'); // Format profit
    $pdf->Cell(30, 10, $row['act_remain_quantity'], 1, 0, 'C');
    $pdf->Cell(30, 10, $row['used_quantity'], 1, 1, 'C');
}

// Fetch the sum of total_amount and total_profit
$sum_sql = "SELECT SUM(act_remain_quantity) AS total_actual_price_sum, SUM(used_quantity) AS total_selling_price_sum FROM stock WHERE 1=1";
if (!empty($created_by)) {
    $sum_sql .= " AND created_by LIKE '%$created_by%'";
}
if (!empty($medicine_name)) {
    $sum_sql .= " AND medicine_name LIKE '%$medicine_name%'";
}
if (!empty($category)) {
    $sum_sql .= " AND category LIKE '%$category%'";
}
if (!empty($company)) {
    $sum_sql .= " AND company LIKE '%$company%'";
}
$sum_query = mysqli_query($con, $sum_sql);
$sum_row = mysqli_fetch_array($sum_query);

$total_actual_price_sum = $sum_row['total_actual_price_sum'];
$total_selling_price_sum = $sum_row['total_selling_price_sum'];

// Add a line break before the summary
$pdf->Ln(10);

// Add summary for total_amount and total_profit
$pdf->Cell(0, 10, 'Jumla idadi iliyobaki: ' . number_format($total_actual_price_sum, 0), 0, 1, 'C');
$pdf->Cell(0, 10, 'Jumla idadi iliyouzwa: ' . number_format($total_selling_price_sum, 0), 0, 1, 'C');

// Output PDF
$pdf->Output('Ripoti ya dawa.pdf', 'D');

?>