<?php
session_start();
include('dbcon.php');

$get_id = $_GET['id'];
$invoice_number = isset($_GET['invoice_number']) ? $_GET['invoice_number'] : '';

mysqli_query($con, "DELETE FROM expenditure WHERE expenditure_id='$get_id'") or die(mysqli_error());

// Set success message in session
$_SESSION['success_message'] = "Data deleted successfully!";

if (!empty($invoice_number)) {
    header('location: expenditure.php?invoice_number=' . $invoice_number);
} else {
    header('location: expenditure.php');
}
exit();
?>