<?php

session_start();

if(!isset($_SESSION['user_session'])){

    header("location:index.php");
}

include("dbcon.php");

if(isset($_POST['submit'])){

$invoice_number= $_GET['invoice_number'];
$product =$_POST['product'];
$expire_date=$_POST['expire_date'];
$qty    = $_POST['qty'];
$discount = $_POST['discount'];
$payment_method = "Amebandika";
$status = "paid";
$phone_number = $_POST['phone_number'];
$date_to_pay = $_POST['date_to_pay'];
$date   = $_POST['date'];

$select_sql= "SELECT * FROM stock where medicine_name = '$product' and expire_date = '$expire_date'";

$select_query= mysqli_query($con,$select_sql);

	while($row = mysqli_fetch_array($select_query)){
		$medicine_name =$row['medicine_name'];
		$category      = $row['category'];
		$quantity      = $row['quantity'];
        $sell_type     = $row['sell_type'];
		$cost          = $row['selling_price'];
		$profit        = $row['profit_price'];
		$expire_date   = $row['expire_date'];

	}
 
    //  stock update is disabled kwa kubandika product
    
	// $update_sql="UPDATE stock SET used_quantity = used_quantity + '$qty' , remain_quantity = remain_quantity - '$qty' where medicine_name = '$product' and expire_date = '$expire_date'";//*******UPDATING Stock if Sale Made **********

	// $update_query = mysqli_query($con,$update_sql);

	$select_sql = "SELECT * FROM stock where medicine_name = '$product' and expire_date = '$expire_date' ";

	$select_query = mysqli_query($con,$select_sql);

	while($row = mysqli_fetch_array($select_query)){

		  $quantity = $row['remain_quantity'];
	}
	   echo "<h1>....LOADING</h1>";

	   if($quantity <= 0){

	   	   $update_quantity_sql = "UPDATE stock set status =  'Unavailable' where medicine_name = '$product' and expire_date = '$expire_date' ";//********Updating Unavailable if medicine_qty  is zero***********

	   	   $update_quantity_query = mysqli_query($con,$update_quantity_sql);
	   }
// Calculate the discounted price
$discounted_price = $cost - $discount ;
$amount = $qty * $discounted_price;
$profit_amt = $profit*$qty;
 $insert_sql ="INSERT INTO on_hold values('','$invoice_number','$medicine_name','$category','$expire_date','$qty','$sell_type','$cost','$amount','$discounted_price', '$payment_method','$phone_number','$date_to_pay','$profit_amt','$date','$status')";//*****INSERTING INTO on_HOLD TABLE*******

 $insert_query = mysqli_query($con,$insert_sql);

	if($insert_query){

     header("location:home.php?invoice_number=$invoice_number");
  
     // echo "<script type='text/javascript'>window.location.href = home.php?invoice_number=$invoice_number '</script>";
	}else{

	}

  }

?>