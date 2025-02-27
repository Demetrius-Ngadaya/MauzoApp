<?php

session_start();

if(!isset($_SESSION['user_session'])){

    header("location:index.php");
}
?>
<html>
<head>
<title>MauzApp/Malipo</title>
<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<div class="checkout">
	<form method="post" action="previewCashier.php?invoice_number=<?php echo $_GET['invoice_number']?>">
		<center>
      <h3>Customer names</h3>
<input type="hidden" name="medicine_name" value="<?php echo $_GET['medicine_name']?>">
<input type="hidden" name="category" value="<?php echo $_GET['category']?>">
<input type="hidden" name="quantity" value="<?php echo $_GET['quantity']?>">
<input type="hidden" name="grand_total" value="<?php echo $_GET['total']?>">
<input type="hidden" name="grand_profit" value="<?php echo $_GET['profit']?>">
<input type="hidden" name="date" value="<?php echo date("Y/m/d");?>">
<input type="text" name="paid_amount"  placeholder="" style="width: 300px; height:30px;  margin-bottom: 15px;"  required/><br>
      <button class="btn btn-success btn-block btn-large" name="submit">Save</button>
        </center>
   </form>
</div>
</body>
</html>
