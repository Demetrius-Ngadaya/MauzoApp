
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
$quantity =  $_POST['used_quantity'] + $_POST['act_remain_quantity'];
$used_qty = $_POST['used_quantity'];
$remain_quantity = $_POST['act_remain_quantity'];  
$act_remain_quantity = $_POST['act_remain_quantity'];  
$reg_date = strtotime($_POST['reg_date']);
$new_reg_date = date('Y-m-d',$reg_date);
$exp_date= strtotime($_POST['exp_date']); 
$new_exp_date = date('Y-m-d',$exp_date);
$stock_alert =  $_POST['stock_alert']; 
$old_quantity =  $_POST['old_quantity']; 
$company =  $_POST['company']; 
$sell_type = $_POST['sell_type'];
$actual_price = $_POST['actual_price'];  
$selling_price = $_POST['selling_price'];
$profit_price = $_POST['profit_price'];
$status =  $_POST['status']; 
$edited_by =  $_SESSION['user_session']; 
$edit_reason =  $_POST['edit_reason']; 
$edited_date =  date('y,m,d'); 


$sql=" UPDATE stock SET medicine_name='$med_name',category='$category',quantity='$quantity', used_quantity='$used_qty',act_remain_quantity='$act_remain_quantity',register_date='$new_reg_date',expire_date='$new_exp_date',stock_alert='$stock_alert',company='$company',sell_type='$sell_type',actual_price='$actual_price',selling_price='$selling_price',profit_price='$profit_price',edited_by='$edited_by',edited_date='$edited_date',status='$status' WHERE id = '$id' ";


$result =mysqli_query($con,$sql); 

$sql="INSERT INTO edited_products(medicine_name, category, quantity,used_quantity,old_quantity,act_remain_quantity,register_date,expire_date,stock_alert,company, sell_type, actual_price, selling_price, profit_price,edited_by,edit_reason,edited_date, status) 
VALUES ('$med_name', '$category', '$quantity','$used_qty','$old_quantity','$act_remain_quantity','$new_reg_date','$new_exp_date','$stock_alert','$company', '$sell_type', '$actual_price', '$selling_price', '$profit_price','$edited_by','$edit_reason','$edited_date','$status')";

  $result =mysqli_query($con,$sql);
  if ($result) {
   $_SESSION['success_message'] = "Product details updated successfuly!";
   header("Location: new_product.php?invoice_number=$invoice_number");
} else {
   echo "<div style='color: red; text-align: center;'>Failed to update product details!</div>";
}

}
?>