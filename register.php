
<?php

   include("dbcon.php");


	session_start();

	if(!isset($_SESSION['user_session'])){

	    header("location:index.php");
	}
   ?>
   <!DOCTYPE html>  
   <html>
   <head>
     <meta charset="utf-8">
     <title>MauzApp</title>
     <!-- Tell the browser to be responsive to screen width -->
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <!-- THE BELOW LINKS FOR MODAL TO FUNCTION -->
     <link rel="stylesheet" type="text/css" href="src/facebox.css">
     <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
     <!-- Font Awesome -->
     <link rel="stylesheet" href="./plugins/fontawesome-free/css/all.min.css">
     <!-- Ionicons -->
     <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
     <!-- DataTables -->
     <link rel="stylesheet" href="./plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
     <link rel="stylesheet" href="./plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
     <!-- Theme style -->
     <link rel="stylesheet" href="./dist/css/adminlte.min.css">
     <!-- Google Font: Source Sans Pro -->
     <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet"> 
   
   
       <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
     <link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">
     <link rel="stylesheet" type="text/css" href="../css/bootstrap-responsive.css">
     <link rel="stylesheet" type="text/css" href="../css/style.css">
       <script type="text/javascript" src="../js/jquery-1.7.2.min.js"></script>
       <script type="text/javascript" src="../js/bootstrap.min.js"></script>
       <script type="text/javascript" src="../src/facebox.js"></script>
   
       <script src="js/jquery-1.7.2.min.js"></script>
       <script src="js/jquery_ui.js"></script>
       <script type="text/javascript" src="js/bootstrap.js"></script>
       <script type="text/javascript" src="src/facebox.js"></script>
       
</head>



<body class="hold-transition sidebar-mini">
   
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">         
          <div class="col-sm-6">
           
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
  

    </aside>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">

<?php

   if(isset($_POST['submit'])){//***INSERTING NEW  MEDICEINES******
$invoice_number = $_GET['invoice_number'];


   // HAPA UNAWEZA KUECHO KITU CHOCHOTE KIFUNGUKE MDA WA KU LOAD
// $bar_code= $_POST['bar_code'];
$med_name= $_POST['med_name'];  
$category= $_POST['category'];    
$quantity=  $_POST['quantity']; 
$reg_date = strtotime($_POST['reg_date']);
$new_reg_date = date('Y-m-d',$reg_date);
$exp_date= strtotime($_POST['exp_date']);   
$stock_alert =  $_POST['stock_alert']; 
$new_exp_date = date('Y-m-d',$exp_date);
$company =  $_POST['company']; 
$sell_type = $_POST['sell_type'];
$actual_price = $_POST['actual_price'];  
$selling_price = $_POST['selling_price'];
$profit_price = $_POST['profit_price'];
$created_by = $_POST['created_by'];
$status = "Available";

// Check if the product already exists
$query = "SELECT * FROM stock WHERE medicine_name = ? AND category = ?";
$stmt = $con->prepare($query);
$stmt->bind_param("ss", $med_name, $category);
$stmt->execute();
$result = $stmt->get_result();

if($result->num_rows > 0) {
    // If the product exists, redirect back with an error message
    $_SESSION['error_message'] = "Dawa uliyoingiza tayari ipo!";
    header("Location: new_product.php?invoice_number=$invoice_number");
    exit();
}

$sql="INSERT INTO stock(medicine_name, category, quantity, remain_quantity, act_remain_quantity, register_date, expire_date, stock_alert, company, sell_type, actual_price, selling_price, profit_price, created_by, status) 
VALUES ('$med_name', '$category', '$quantity', '$quantity', '$quantity', '$new_reg_date', '$new_exp_date', '$stock_alert', '$company', '$sell_type', '$actual_price', '$selling_price', '$profit_price', '$created_by', '$status')";

   $result =mysqli_query($con,$sql);
   if ($result) {
    $_SESSION['success_message'] = "Dawa imeongezwa kikamilifu!";
    header("Location: new_product.php?invoice_number=$invoice_number");
} else {
    echo "<div style='color: red; text-align: center;'>Failed to register product!</div>";
}

}
 

?>

 <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      </div>
      <!-- /.container-fluid -->
    </section>
</div>
<script src="./plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->

<!-- THE SCRIPT BELOW MAKES Sidebar MENU TO BE NAVIGETABLE -->
<script src="./dist/js/adminlte.min.js"></script>
</body>
</html>