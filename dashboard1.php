<?php

session_start();

if(!isset($_SESSION['user_session'])){

    header("location:index.php");
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>MauzoApp</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="adminDashboard.php" class="nav-link">Nyumbani</a>
      </li>     
    </ul>

<!-- Right navbar links -->
<ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      
      <li class="nav-item">
      <a href="logout.php" class="nav-link">
                &nbsp;&nbsp;&nbsp;<i class="fa fa-power-off"></i>
                  &nbsp;&nbsp;Ondoka
                </a>
      </li>
    </ul>
  </nav>
  
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
  <a href="index.php" class="brand-link">   
      <H1><span class="brand-text font-weight-light"> MauzoApp</span></H1>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar Menu -->
      
      <?php include('indexSideBar.php') ?>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">	

          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Admin</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div>
        </div>
      </div>
      
      <!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
             
            <div class="card">
              <div class="card-header">

   
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>  
                    
                 
                <?php
include("dbcon.php");

// Get the current date
$currentDate = date("Y-m-d");

// Construct the SQL query to calculate the total profit for today's sales
$select_sql = "SELECT SUM(total_amount) AS total_profit FROM sales WHERE date = '$currentDate'";

// Execute the SQL query
$select_query = mysqli_query($con, $select_sql);

// Check if there are results
if ($row = mysqli_fetch_assoc($select_query)) {
    // Display the total profit
    echo 'Tsh ' . $row['total_profit'];
} else {
    // If there are no sales recorded for today, display a message
    echo 'No sales recorded for today.';
}
?>


                </h3>
                


                <p>mauzo leo</p>
              </div>
              <div class="icon">
                <i class="fa fa-users"></i>
              </div>
              <a href="today_sales.php" class="small-box-footer">Tazama mauzo <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3> 
              
                <?php
include("dbcon.php");

// Get the year
$currentYear = date("Y");

// Construct the SQL query to calculate the total profit for the sales from July to December of the current year
$select_sql = "SELECT SUM(total_profit) AS total_profit FROM sales WHERE YEAR(Date) = '$currentYear' AND MONTH(Date) BETWEEN 7 AND 12";

// Execute the SQL query
$select_query = mysqli_query($con, $select_sql);

// Check if there are results
if ($row = mysqli_fetch_array($select_query)) {
    // Display the total profit
    echo 'Tsh ' . $row['total_profit'];
} else {
    // If there are no sales recorded for the specified period, display a message
    echo 'No sales recorded for the specified period.';
}
?>
          
              </h3>   
                 
                <p>faida 6 - 7</p>
              </div>
              <div class="icon">
                <i class="fa fa-users"></i>
              </div>
              <a href="#" class="small-box-footer">Tazama faida <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3> 
                    
                <?php
include("dbcon.php");

// Get the current year
$currentYear = date("Y");

// Construct the SQL query to calculate the total profit for the current year
$select_sql = "SELECT SUM(total_profit) AS total_profit FROM sales WHERE YEAR(Date) = '$currentYear'";

// Execute the SQL query
$select_query = mysqli_query($con, $select_sql);

// Check if there are results
if ($row = mysqli_fetch_array($select_query)) {
    // Display the total profit
    echo 'Tsh ' . $row['total_profit'];
} else {
    // If there are no sales recorded for the current year, display a message
    echo 'No sales recorded for the current year.';
}
?>
             </h3>

                <p>Jumla faida ya mwaka huu</p>
              </div>
              <div class="icon">
                <i class="fa fa-users"></i>
              </div>
              <a href="adminDiplomaLecturer.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3> 

                <?php
include("dbcon.php");

// Construct the SQL query to count the number of medicines from the stock table where the quantity is equal to 0
$select_sql = "SELECT COUNT(*) AS medicine_name FROM stock WHERE used_quantity = 0";

// Execute the SQL query
$select_query = mysqli_query($con, $select_sql);

// Check if there are results
if ($row = mysqli_fetch_array($select_query)) {
    // Display the total number of medicines with quantity = 0
    echo 'Total: ' . $row['medicine_name'];
} else {
    // If there are no medicines with quantity = 0, display a message
    echo 'No medicines found with quantity = 0.';
}
?>


                    </h3>

                <p>Dawa hujawahi kuuza</p>
              </div>
              <div class="icon">
                <i class="fa fa-clipboard-list fa-beat"></i>
              </div>
              <a href="adminTestSchedule.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          
          <!-- /.Left col -->
         
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>  
                    
                 
                <?php
  
  include("dbcon.php");

  $date = date("Y-m-d");

  $select_sql = "SELECT sum(total_amount) from sales";

  $select_query = mysqli_query($con,$select_sql);

  while($row = mysqli_fetch_array($select_query)){

             echo 'Tsh '.$row['sum(total_amount)'];


  }



?>
                </h3>
                


                <p>Jumla ya mauzo</p>
              </div>
              <div class="icon">
                <i class="fa fa-users"></i>
              </div>
              <a href="#" class="small-box-footer">Tazama mauzo <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3> 
              
                <?php
  
  include("dbcon.php");

  $date = date("Y-m-d");

  $select_sql = "SELECT sum(total_profit) from sales";

  $select_query = mysqli_query($con,$select_sql);

  while($row = mysqli_fetch_array($select_query)){

             echo 'Tsh '.$row['sum(total_profit)'];


  }



?>
              
              </h3>   
                 
                <p>Jumla ya faida</p>
              </div>
              <div class="icon">
                <i class="fa fa-users"></i>
              </div>
              <a href="#" class="small-box-footer">Tazama faida <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3> 
                    
                 
                <?php
include("dbcon.php");

// Get the current year and month in the format YYYY-MM
$currentYearMonth = date("Y-m");

// Construct the SQL query to calculate the total profit for the current month
$select_sql = "SELECT SUM(total_amount) AS total_amount FROM sales WHERE DATE_FORMAT(Date, '%Y-%m') = '$currentYearMonth'";

// Execute the SQL query
$select_query = mysqli_query($con, $select_sql);

// Check if there are results
if ($row = mysqli_fetch_array($select_query)) {
    // Display the total profit
    echo 'Tsh ' . $row['total_amount'];
} else {
    // If there are no sales recorded for the current month, display a message
    echo 'No sales recorded for the current month.';
}
?>
                </h3>

                <p>Jumla mauzo ya mwezi huu</p>
              </div>
              <div class="icon">
                <i class="fa fa-users"></i>
              </div>
              <a href="adminDiplomaLecturer.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3> 

                <?php
include("dbcon.php");

// Get the current week's starting and ending dates
$currentWeekStart = date('Y-m-d', strtotime('monday this week'));
$currentWeekEnd = date('Y-m-d', strtotime('sunday this week'));

// Construct the SQL query to calculate the total profit for the current week
$select_sql = "SELECT SUM(total_profit) AS total_profit FROM sales WHERE Date BETWEEN '$currentWeekStart' AND '$currentWeekEnd'";

// Execute the SQL query
$select_query = mysqli_query($con, $select_sql);

// Check if there are results
if ($row = mysqli_fetch_array($select_query)) {
    // Display the total profit
    echo 'Tsh ' . $row['total_profit'];
} else {
    // If there are no sales recorded for the current week, display a message
    echo 'No sales recorded for the current week.';
}
?>

                    </h3>

                <p>Faida wiki hii</p>
              </div>
              <div class="icon">
                <i class="fa fa-clipboard-list fa-beat"></i>
              </div>
              <a href="adminTestSchedule.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          
          <!-- /.Left col -->
         
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>


    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>  
                    
                 
                <?php
include("dbcon.php");

// Get the year
$currentYear = date("Y");

// Construct the SQL query to calculate the total profit for the sales from January to June of the current year
$select_sql = "SELECT SUM(total_profit) AS total_profit FROM sales WHERE YEAR(Date) = '$currentYear' AND MONTH(Date) BETWEEN 1 AND 6";

// Execute the SQL query
$select_query = mysqli_query($con, $select_sql);

// Check if there are results
if ($row = mysqli_fetch_array($select_query)) {
    // Display the total profit
    echo 'Tsh ' . $row['total_profit'];
} else {
    // If there are no sales recorded for the specified period, display a message
    echo 'No sales recorded for the specified period.';
}
?>

                </h3>
                


                <p>Jumla ya faida 1 - 6</p>
              </div>
              <div class="icon">
                <i class="fa fa-users"></i>
              </div>
              <a href="#" class="small-box-footer">Tazama mauzo <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3> 
              
                <?php
include("dbcon.php");

// Get the year
$currentYear = date("Y");

// Construct the SQL query to calculate the total profit for the sales from July to December of the current year
$select_sql = "SELECT SUM(total_profit) AS total_profit FROM sales WHERE YEAR(Date) = '$currentYear' AND MONTH(Date) BETWEEN 7 AND 12";

// Execute the SQL query
$select_query = mysqli_query($con, $select_sql);

// Check if there are results
if ($row = mysqli_fetch_array($select_query)) {
    // Display the total profit
    echo 'Tsh ' . $row['total_profit'];
} else {
    // If there are no sales recorded for the specified period, display a message
    echo 'No sales recorded for the specified period.';
}
?>
          
              </h3>   
                 
                <p>faida 6 - 7</p>
              </div>
              <div class="icon">
                <i class="fa fa-users"></i>
              </div>
              <a href="#" class="small-box-footer">Tazama faida <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3> 
                    
                <?php
include("dbcon.php");

// Get the current year
$currentYear = date("Y");

// Construct the SQL query to calculate the total profit for the current year
$select_sql = "SELECT SUM(total_profit) AS total_profit FROM sales WHERE YEAR(Date) = '$currentYear'";

// Execute the SQL query
$select_query = mysqli_query($con, $select_sql);

// Check if there are results
if ($row = mysqli_fetch_array($select_query)) {
    // Display the total profit
    echo 'Tsh ' . $row['total_profit'];
} else {
    // If there are no sales recorded for the current year, display a message
    echo 'No sales recorded for the current year.';
}
?>
             </h3>

                <p>Jumla faida ya mwaka huu</p>
              </div>
              <div class="icon">
                <i class="fa fa-users"></i>
              </div>
              <a href="adminDiplomaLecturer.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3> 

                <?php
include("dbcon.php");

// Construct the SQL query to count the number of medicines from the stock table where the quantity is equal to 0
$select_sql = "SELECT COUNT(*) AS medicine_name FROM stock WHERE used_quantity = 0";

// Execute the SQL query
$select_query = mysqli_query($con, $select_sql);

// Check if there are results
if ($row = mysqli_fetch_array($select_query)) {
    // Display the total number of medicines with quantity = 0
    echo 'Total: ' . $row['medicine_name'];
} else {
    // If there are no medicines with quantity = 0, display a message
    echo 'No medicines found with quantity = 0.';
}
?>


                    </h3>

                <p>Dawa hujawahi kuuza</p>
              </div>
              <div class="icon">
                <i class="fa fa-clipboard-list fa-beat"></i>
              </div>
              <a href="adminTestSchedule.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          
          <!-- /.Left col -->
         
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>













    
              <!-- /.card-body -->
            </div>
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2023-2024 D_TECH.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
    <strong>Designed and Developed by <a href="https://wa.me/message/JYOOWVES6MT7M1"> D_TECH</a>.</strong>
    </div>
  </footer>


  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
<?php include ('script.php');?>
<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables -->
<script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
</body>
</html>
