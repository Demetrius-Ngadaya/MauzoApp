<?php

session_start();

if(!isset($_SESSION['user_session'])){

    header("location:index.php");
}
$mtumiaji = $_SESSION['user_session'];
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


</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper"> 
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="adminDashboard.php" class="nav-link">Home</a>
      </li>     
    </ul>

<!-- Right navbar links -->
<ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      <li class="nav-item">
      <a href="#" class="nav-link">
                &nbsp;&nbsp;&nbsp;<i class="fa fa-user"></i>
                <strong><?php echo $mtumiaji ?> </strong>
                </a>
      </li>
      <li class="nav-item">
      <a href="#" class="nav-link">
                &nbsp;&nbsp;&nbsp;<i class="fa fa-power-off"></i>
                <strong>  &nbsp;&nbsp;Logout</strong>
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
              <!-- <li class="breadcrumb-item"><a href="#">Admin</a></li>
              <li class="breadcrumb-item active">Dashboard</li> -->
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


// Construct the SQL query to calculate the total sales for the period from July to September
$select_sql = "SELECT SUM(total_amount) AS total_sales FROM sales";

// Execute the SQL query
$select_query = mysqli_query($con, $select_sql);

// Check if there are results
if ($row = mysqli_fetch_array($select_query)) {
    // Display the total sales
    echo 'Tsh ' . number_format($row['total_sales']);
} else {
    // If there are no sales recorded for the specified period, display a message
    echo 'No sales recorded from July to September.';
}
?>
                </h3> 
                


                <p>All sales</p>
              </div>
              
              <a href="mauzo_dukani.php?invoice_number=<?php echo $_GET['invoice_number']?>" class="small-box-footer">Tazama mauzo <i class="fas fa-arrow-circle-right"></i></a>
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

// SQL query to count the total products in which quantity - act_remain_quantity > 50
$select_sql = "SELECT COUNT(*) AS count_matching_rows FROM stock WHERE quantity - act_remain_quantity > 50";


// Execute the SQL query
$select_query = mysqli_query($con, $select_sql);

// Check if there are results
if ($row = mysqli_fetch_assoc($select_query)) {
    // Display the total profit
    echo '' . $row['count_matching_rows'];
} else {
    // If no matching rows found, display a message
    echo 'No matching rows found.';
}
?>


                </h3>

                <p>Most sold</p>
              </div>
             
             
              <a href="zilizouzika_sana.php?invoice_number=<?php echo $_GET['invoice_number']?>" class="small-box-footer">zitazame  <i class="fas fa-arrow-circle-right"></i></a>
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

// SQL query to count the total products where quantity - act_remain_quantity is between 1 to 50
$select_sql = "SELECT COUNT(*) AS count_matching_rows 
               FROM stock 
               WHERE quantity - act_remain_quantity BETWEEN 1 AND 50";

// Execute the SQL query
$select_query = mysqli_query($con, $select_sql);

// Check if there are results
if ($row = mysqli_fetch_assoc($select_query)) {
    // Display the count of matching rows
    echo '' . $row['count_matching_rows'];
} else {
    // If no matching rows found, display a message
    echo 'No matching rows found.';
}
?>


                </h3>

                <p>Less sold</p>
              </div>
              <a href="zilizouzika_kidogo.php?invoice_number=<?php echo $_GET['invoice_number']?>" class="small-box-footer">zitazame izo Dawa<i class="fas fa-arrow-circle-right"></i></a>
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

// Construct the SQL query to count rows in the stock table where quantity is equal to act_remaining_quantity
$select_sql = "SELECT COUNT(*) AS count_matching_rows FROM stock WHERE quantity = act_remain_quantity";

// Execute the SQL query
$select_query = mysqli_query($con, $select_sql);

// Check if there are results
if ($row = mysqli_fetch_assoc($select_query)) {
    // Display the count of matching rows
    echo ' ' . $row['count_matching_rows'];
} else {
    // If no matching rows found, display a message
    echo 'No matching rows found.';
}
?>


                    </h3>

                <p>Never sold </p>
              </div>
              <a href="never_sold_products.php?invoice_number=<?php echo $_GET['invoice_number']?>" class="small-box-footer">zitazame izo a <i class="fas fa-arrow-circle-right"></i></a>
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


// Construct the SQL query to calculate the total amount earned for 20 best products 
$select_sql = "SELECT SUM(total_amount) AS total_amount_earned FROM (
  SELECT total_amount
  FROM sales 
  ORDER BY total_amount DESC
  LIMIT 20
) AS top_20_sales;
";

// Execute the SQL query
$select_query = mysqli_query($con, $select_sql);

// Check if there are results
if ($row = mysqli_fetch_assoc($select_query)) {
    // Display the total profit
    echo 'Tsh ' . number_format($row['total_amount_earned']);
} else {
    // If there are no sales recorded for today, display a message
    echo 'No sales recorded for today.';
}
?>


                </h3>
                


                <p>Best medicines</p>
              </div>
              
              <a href="bidhaa_20_zilizoingiza_pesa_nyingi.php?invoice_number=<?php echo $_GET['invoice_number']?>" class="small-box-footer">Tazama mauzo <i class="fas fa-arrow-circle-right"></i></a>
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

// Construct the SQL query to calculate the total profit from sales table for all medicines sold where in stock table quantity - act_remain_quantity > 50
$select_sql = "SELECT SUM(sales.total_amount) AS total_profit 
               FROM sales 
               JOIN stock ON sales.medicine_id = stock.id 
               WHERE stock.quantity - stock.act_remain_quantity >50";
// Execute the SQL query
$select_query = mysqli_query($con, $select_sql);

// Check if there are results
if ($row = mysqli_fetch_assoc($select_query)) {
    // Display the total profit
    echo '' . number_format($row['total_profit']);
} else {
    // If no matching rows found, display a message
    echo 'No matching rows found.';
}
?>

              
              </h3>   
                 
                <p>Pesa ziliyopatikana za bidhaa bora</p>
              </div>
             
             
              <a href="zilizouzika_sana.php?invoice_number=<?php echo $_GET['invoice_number']?>" class="small-box-footer">zitazame  <i class="fas fa-arrow-circle-right"></i></a>
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

// Construct the SQL query to calculate the total profit from sales table for all medicines sold where in stock table quantity - act_remain_quantity <= 50
$select_sql = "SELECT  SUM(sales.total_amount) AS total_profit 
               FROM sales 
               JOIN stock ON sales.medicine_id = stock.id 
               WHERE stock.quantity - stock.act_remain_quantity BETWEEN 1 AND 50";


// Execute the SQL query
$select_query = mysqli_query($con, $select_sql);

// Check if there are results
if ($row = mysqli_fetch_assoc($select_query)) {
    // Display the total profit
    echo '' . $row['total_profit'];
} else {
    // If no matching rows found, display a message
    echo 'No matching rows found.';
}
?>



                </h3>

                <p>pesa iliyopatikana</p>
              </div>
              <a href="Zilizouzika_kidogo.php?invoice_number=<?php echo $_GET['invoice_number']?>" class="small-box-footer">zitazame izo Dawa<i class="fas fa-arrow-circle-right"></i></a>
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

// Construct the SQL query to calculate the total profit for all medicines where quantity = act_remaining_quantity
$select_sql = "SELECT SUM(actual_price * quantity) AS total_profit FROM stock WHERE quantity = act_remain_quantity";

// Execute the SQL query
$select_query = mysqli_query($con, $select_sql);

// Check if there are results
if ($row = mysqli_fetch_assoc($select_query)) {
    // Display the total profit
    echo '' . $row['total_profit'];
} else {
    // If no matching rows found, display a message
    echo 'No matching rows found.';
}
?>

              
              </h3>   
                 
                <p>Thamani zisizowahi kuuzwa</p>
              </div>
              <a href="never_sold_products.php?invoice_number=<?php echo $_GET['invoice_number']?>" class="small-box-footer">zitazame izo Dawa <i class="fas fa-arrow-circle-right"></i></a>
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

// Get the current date
$currentDate = date("Y-m-d");

// Construct the SQL query to calculate the total sales for today's sales
$select_sql = "SELECT SUM(total_amount) AS total_amount_earned FROM (
  SELECT total_amount
  FROM sales 
  ORDER BY total_amount ASC
  LIMIT 20
) AS bottom_20_sales;
";

// Execute the SQL query
$select_query = mysqli_query($con, $select_sql);

// Check if there are results
if ($row = mysqli_fetch_assoc($select_query)) {
    // Display the total profit
    echo 'Tsh ' . $row['total_amount_earned'];
} else {
    // If there are no sales recorded for today, display a message
    echo 'No sales recorded for today.';
}
?>


                </h3>
                


                <p>20 za mwisho</p>
              </div>
              
              <a href="bidhaa_20_zisizoingiza_pesa_nyingi.php?invoice_number=<?php echo $_GET['invoice_number']?>" class="small-box-footer">Tazama mauzo <i class="fas fa-arrow-circle-right"></i></a>
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

// Construct the SQL query to calculate the total profit from sales table for all medicines sold where in stock table quantity - act_remain_quantity <= 50
$select_sql = "SELECT SUM(sales.total_profit) AS total_profit 
               FROM sales 
               JOIN stock ON sales.medicine_id = stock.id 
               WHERE stock.quantity - stock.act_remain_quantity > 50";

// Execute the SQL query
$select_query = mysqli_query($con, $select_sql);

// Check if there are results
if ($row = mysqli_fetch_assoc($select_query)) {
    // Display the total profit
    echo '' . $row['total_profit'];
} else {
    // If no matching rows found, display a message
    echo 'No matching rows found.';
}
?>

              
              </h3>   
                 
                <p>Faida iliyopatikana</p>
              </div>
             
             
              <a href="zilizouzika_sana.php?invoice_number=<?php echo $_GET['invoice_number']?>" class="small-box-footer">zitazame  <i class="fas fa-arrow-circle-right"></i></a>
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

// Construct the SQL query to calculate the total profit from sales table for all medicines sold where in stock table quantity - act_remain_quantity <= 50
$select_sql = "SELECT SUM(sales.total_profit) AS total_profit 
               FROM sales 
               JOIN stock ON sales.medicine_id = stock.id 
               WHERE stock.quantity - stock.act_remain_quantity BETWEEN 1 AND 50";

// Execute the SQL query
$select_query = mysqli_query($con, $select_sql);

// Check if there are results
if ($row = mysqli_fetch_assoc($select_query)) {
    // Display the total profit
    echo 'Tsh ' . $row['total_profit'];
} else {
    // If no matching rows found, display a message
    echo 'No matching rows found.';
}
?>


                </h3>  

                <p>faida iliyopatikana</p>
              </div>
              <a href="zilizouzika_kidogo.php?invoice_number=<?php echo $_GET['invoice_number']?>" class="small-box-footer">zitazame izo Dawa<i class="fas fa-arrow-circle-right"></i></a>
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

// Construct the SQL query to calculate the total profit for all medicines where quantity = act_remaining_quantity
$select_sql = "SELECT SUM(profit_price * quantity) AS total_profit FROM stock WHERE quantity = act_remain_quantity";

// Execute the SQL query
$select_query = mysqli_query($con, $select_sql);

// Check if there are results
if ($row = mysqli_fetch_assoc($select_query)) {
    // Display the total profit
    echo '' . $row['total_profit'];
} else {
    // If no matching rows found, display a message
    echo 'No matching rows found.';
}
?>


                </h3>

                <p>faida ukiuza Hazijawahi kuuzwa</p>
              </div>
              <a href="never_sold_products.php?invoice_number=<?php echo $_GET['invoice_number']?>" class="small-box-footer">zitazame izo Dawa <i class="fas fa-arrow-circle-right"></i></a>
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

// Get the current date
$currentDate = date("Y-m-d");

// Construct the SQL query to calculate the total sales for today's sales
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
              
              <a href="today_sales.php?invoice_number=<?php echo $_GET['invoice_number']?>" class="small-box-footer">Tazama mauzo <i class="fas fa-arrow-circle-right"></i></a>
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

// Get the current date
$currentDate = date("Y-m-d");

// Construct the SQL query to calculate the total profit for today's sales
$select_sql = "SELECT SUM(total_profit) AS total_profit FROM sales WHERE date = '$currentDate'";

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
                 
                <p>faida kwa leo</p>
              </div>
             
              <a href="profit_today.php?invoice_number=<?php echo $_GET['invoice_number']?>" class="small-box-footer">Tazama faida <i class="fas fa-arrow-circle-right"></i></a>
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

// Get the current date
$currentDate = date("Y-m-d");

// Construct the SQL query to calculate the total sales for today's sales
$select_sql = "SELECT COUNT(total_amount) AS total_profit FROM sales WHERE date = '$currentDate'";

// Execute the SQL query
$select_query = mysqli_query($con, $select_sql);

// Check if there are results
if ($row = mysqli_fetch_assoc($select_query)) {
    // Display the total profit
    echo ' ' . $row['total_profit'];
} else {
    // If there are no sales recorded for today, display a message
    echo 'No sales recorded for today.';
}
?>

                </h3>

                <p>Dawa zilizouzwa leo</p>
              </div>
              <a href="today_sales.php?invoice_number=<?php echo $_GET['invoice_number']?>" class="small-box-footer">Tazama zaidi<i class="fas fa-arrow-circle-right"></i></a>
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

// Get the current date
$currentDate = date("Y-m-d");

// Construct the SQL query to calculate the total sales for today's sales
$select_sql = "SELECT SUM(expenditure_amount) AS expenditure_amount FROM expenditure WHERE created_at = '$currentDate'";

// Execute the SQL query
$select_query = mysqli_query($con, $select_sql);

// Check if there are results
if ($row = mysqli_fetch_assoc($select_query)) {
    // Display the total profit
    echo 'Tsh ' . $row['expenditure_amount'];
} else {
    // If there are no sales recorded for today, display a message
    echo 'No sales recorded for today.';
}
?>


                    </h3>

                <p>Matumizi leo</p>
              </div>
              <a href="today_expenditure.php?invoice_number=<?php echo $_GET['invoice_number']?>" class="small-box-footer">Tazama matumizi <i class="fas fa-arrow-circle-right"></i></a>
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

// Get the current week's starting and ending dates
$currentWeekStart = date('Y-m-d', strtotime('monday this week'));
$currentWeekEnd = date('Y-m-d', strtotime('sunday this week'));

// Construct the SQL query to calculate the total sales for the current week
$select_sql = "SELECT SUM(total_amount) AS total_profit FROM sales WHERE Date BETWEEN '$currentWeekStart' AND '$currentWeekEnd'";

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
                


                <p>Sales this week</p>
              </div>
              <a href="sales_this_week.php?invoice_number=<?php echo $_GET['invoice_number']?>" class="small-box-footer">Tazama mauzo <i class="fas fa-arrow-circle-right"></i></a>
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

// Get the current week's starting and ending dates
$currentWeekStart = date('Y-m-d', strtotime('monday this week'));
$currentWeekEnd = date('Y-m-d', strtotime('sunday this week'));

// Construct the SQL query to calculate the total sales for the current week
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
                 
                <p>Profit this week</p>
              </div>
              <a href="sales_this_week.php?invoice_number=<?php echo $_GET['invoice_number']?>" class="small-box-footer">Tazama faida <i class="fas fa-arrow-circle-right"></i></a>
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
$select_sql = "SELECT COUNT(total_amount) AS total_amount FROM sales WHERE DATE_FORMAT(Date, '%Y-%m') = '$currentYearMonth'";

// Execute the SQL query
$select_query = mysqli_query($con, $select_sql);

// Check if there are results
if ($row = mysqli_fetch_array($select_query)) {
    // Display the total profit
    echo '' . $row['total_amount'];
} else {
    // If there are no sales recorded for the current month, display a message
    echo 'No sales recorded for the current month.';
}
?>
                </h3>

                <p>Quantity sold this week</p>
              </div>
              <a href="sales_this_week.php?invoice_number=<?php echo $_GET['invoice_number']?>" class="small-box-footer">Tazama mauzo <i class="fas fa-arrow-circle-right"></i></a>
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
$select_sql = "SELECT SUM(expenditure_amount) AS expenditure_amount FROM expenditure WHERE created_at  BETWEEN '$currentWeekStart' AND '$currentWeekEnd'";

// Execute the SQL query
$select_query = mysqli_query($con, $select_sql);

// Check if there are results
if ($row = mysqli_fetch_array($select_query)) {
    // Display the total profit
    echo 'Tsh ' . $row['expenditure_amount'];
} else {
    // If there are no sales recorded for the current week, display a message
    echo 'No sales recorded for the current week.';
}
?>

                    </h3>

                <p>Expenditure this week</p>
              </div>
              <a href="this_week_expenditure.php?invoice_number=<?php echo $_GET['invoice_number']?>" class="small-box-footer">Tazama matumizi<i class="fas fa-arrow-circle-right"></i></a>
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
                


                <p>Mauzo mwezi huu</p>
              </div>
              <a href="sales_this_month.php?invoice_number=<?php echo $_GET['invoice_number']?>" class="small-box-footer">Tazama mauzo <i class="fas fa-arrow-circle-right"></i></a>
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
// Get the current year and month in the format YYYY-MM
$currentYearMonth = date("Y-m");

// Construct the SQL query to calculate the total profit for the current month
$select_sql = "SELECT SUM(total_profit) AS total_profit FROM sales WHERE DATE_FORMAT(Date, '%Y-%m') = '$currentYearMonth'";

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
                 
                <p>Profit this month</p>
              </div>
              <a href="sales_this_month.php?invoice_number=<?php echo $_GET['invoice_number']?>" class="small-box-footer">Tazama faida <i class="fas fa-arrow-circle-right"></i></a>
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
$select_sql = "SELECT COUNT(total_amount) AS total_amount FROM sales WHERE DATE_FORMAT(Date, '%Y-%m') = '$currentYearMonth'";

// Execute the SQL query
$select_query = mysqli_query($con, $select_sql);

// Check if there are results
if ($row = mysqli_fetch_array($select_query)) {
    // Display the total profit
    echo '' . $row['total_amount'];
} else {
    // If there are no sales recorded for the current month, display a message
    echo 'No sales recorded for the current month.';
}
?>
                </h3>

                <p>Quantity sold this month</p>
              </div>
              <a href="sales_this_week.php?invoice_number=<?php echo $_GET['invoice_number']?>" class="small-box-footer">Tazama mauzo <i class="fas fa-arrow-circle-right"></i></a>
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

// Get the current year and month
$currentYear = date("Y");
$currentMonth = date("m");

// Construct the SQL query to calculate the total expenditure for the current month
$select_sql = "SELECT SUM(expenditure_amount) AS expenditure_amount FROM expenditure WHERE YEAR(created_at) = '$currentYear' AND MONTH(created_at) = '$currentMonth'";

// Execute the SQL query
$select_query = mysqli_query($con, $select_sql);

// Check if there are results
if ($row = mysqli_fetch_assoc($select_query)) {
    // Display the total expenditure for the current month
    echo 'Tsh ' . $row['expenditure_amount'];
} else {
    // If there are no expenditures recorded for the current month, display a message
    echo 'No expenditure recorded for the current month.';
}
?>

                    </h3>

                <p>Expenditures this months</p>
              </div>
              <a href="this_month_expenditure.php?invoice_number=<?php echo $_GET['invoice_number']?>" class="small-box-footer">Tazama matumizi<i class="fas fa-arrow-circle-right"></i></a>
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

// Get the current year
$currentYear = date("Y");

// Construct the SQL query to calculate the total profit for sales from January to March
$select_sql = "SELECT SUM(total_amount) AS total_amount FROM sales 
               WHERE Date >= '$currentYear-01-01' AND Date <= '$currentYear-03-31'";

// Execute the SQL query
$select_query = mysqli_query($con, $select_sql);

// Check if there are results
if ($row = mysqli_fetch_array($select_query)) {
    // Display the total profit
    echo 'Tsh ' . $row['total_amount'];
} else {
    // If there are no sales recorded for the specified period, display a message
    echo 'Hakuna mauzo yaliyofanyika  mwezi wa kwanza mbaka wa tatu';
}
?>

                </h3>
                


                <p>Sales 1-3</p>
              </div>
              <a href="sales_1-3.php?invoice_number=<?php echo $_GET['invoice_number']?>" class="small-box-footer">Tazama mauzo <i class="fas fa-arrow-circle-right"></i></a>
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

// Get the current year
$currentYear = date("Y");

// Construct the SQL query to calculate the total profit for sales from January to March
$select_sql = "SELECT SUM(total_profit) AS total_profit FROM sales
               WHERE Date >= '$currentYear-01-01' AND Date <= '$currentYear-03-31'";

// Execute the SQL query
$select_query = mysqli_query($con, $select_sql);

// Check if there are results
if ($row = mysqli_fetch_array($select_query)) {
    // Display the total profit
    echo 'Tsh ' . $row['total_profit'];
} else {
    // If there are no sales recorded for the specified period, display a message
    echo 'Hakuna mauzo yaliyofanyika  mwezi wa kwanza mbaka wa tatu';
}
?>      </h3>   
                 
                <p>Sales 1-3</p>
              </div>
              <a href="sales_1-3.php?invoice_number=<?php echo $_GET['invoice_number']?>" class="small-box-footer">Tazama faida <i class="fas fa-arrow-circle-right"></i></a>
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

// Construct the SQL query to calculate the total profit for sales from January to March
$select_sql = "SELECT COUNT(total_profit) AS total_profit FROM sales
               WHERE Date >= '$currentYear-01-01' AND Date <= '$currentYear-03-31'";

// Execute the SQL query
$select_query = mysqli_query($con, $select_sql);

// Check if there are results
if ($row = mysqli_fetch_array($select_query)) {
    // Display the total profit
    echo ' ' . $row['total_profit'];
} else {
    // If there are no sales recorded for the specified period, display a message
    echo 'Hakuna mauzo yaliyofanyika  mwezi wa kwanza mbaka wa tatu';
}
?>              </h3>

                <p>Quantity sold 1-3</p>
              </div>
              <a href="sales_1-3.php?invoice_number=<?php echo $_GET['invoice_number']?>" class="small-box-footer">Tazama mauzo <i class="fas fa-arrow-circle-right"></i></a>
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

// Get the current year
$currentYear = date("Y");

// Construct the SQL query to calculate the total expenditure for January to March
$select_sql = "SELECT SUM(expenditure_amount) AS expenditure_amount FROM expenditure 
               WHERE created_at >= '$currentYear-01-01' AND created_at <= '$currentYear-03-31'";

// Execute the SQL query
$select_query = mysqli_query($con, $select_sql);

// Check if there are results
if ($row = mysqli_fetch_array($select_query)) {
    // Display the total expenditure
    echo 'Tsh ' . $row['expenditure_amount'];
} else {
    // If there are no expenditures recorded for the specified period, display a message
    echo 'No expenditure recorded from January to March.';
}
?>

                    </h3>

                <p>Expenditures 1-3</p>
              </div>
              <a href="expenditure_1-3.phpWall putty" class="small-box-footer">Tazama matumizi<i class="fas fa-arrow-circle-right"></i></a>
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

// Get the current year
$currentYear = date("Y");

// Construct the SQL query to calculate the total profit for sales from April to June
$select_sql = "SELECT SUM(total_amount) AS total_amount FROM sales 
               WHERE Date >= '$currentYear-04-01' AND Date <= '$currentYear-06-30'";

// Execute the SQL query
$select_query = mysqli_query($con, $select_sql);

// Check if there are results
if ($row = mysqli_fetch_array($select_query)) {
    // Display the total profit
    echo 'Tsh ' . $row['total_amount'];
} else {
    // If there are no sales recorded for the specified period, display a message
    echo 'No sales recorded from April to June.';
}
?>
            </h3> 
                


                <p>Sales 4-6</p>
              </div>
              <a href="sales_4-6.php?invoice_number=<?php echo $_GET['invoice_number']?>" class="small-box-footer">Tazama mauzo <i class="fas fa-arrow-circle-right"></i></a>
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

// Get the current year
$currentYear = date("Y");

// Construct the SQL query to calculate the total profit for sales from April to June
$select_sql = "SELECT SUM(total_profit) AS total_profit FROM sales 
               WHERE Date >= '$currentYear-04-01' AND Date <= '$currentYear-06-30'";

// Execute the SQL query
$select_query = mysqli_query($con, $select_sql);

// Check if there are results
if ($row = mysqli_fetch_array($select_query)) {
    // Display the total profit
    echo 'Tsh ' . $row['total_profit'];
} else {
    // If there are no sales recorded for the specified period, display a message
    echo 'No sales recorded from April to June.';
}
?>

              </h3>   
                 
                <p>Profit 4-6</p>
              </div>
              <a href="sales_4-6.php?invoice_number=<?php echo $_GET['invoice_number']?>" class="small-box-footer">Tazama faida <i class="fas fa-arrow-circle-right"></i></a>
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

// Construct the SQL query to calculate the total profit for sales from April to June
$select_sql = "SELECT COUNT(total_profit) AS total_profit FROM sales 
               WHERE Date >= '$currentYear-04-01' AND Date <= '$currentYear-06-30'";

// Execute the SQL query
$select_query = mysqli_query($con, $select_sql);

// Check if there are results
if ($row = mysqli_fetch_array($select_query)) {
    // Display the total profit
    echo ' ' . $row['total_profit'];
} else {
    // If there are no sales recorded for the specified period, display a message
    echo 'No sales recorded from April to June.';
}
?>

                </h3>

                <p>Quantity sold 4-6</p>
              </div>
              <a href="sales_4-6.php?invoice_number=<?php echo $_GET['invoice_number']?>" class="small-box-footer">Tazama mauzo <i class="fas fa-arrow-circle-right"></i></a>
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

// Get the current year
$currentYear = date("Y");

// Construct the SQL query to calculate the total expenditure for April to June
$select_sql = "SELECT SUM(expenditure_amount) AS expenditure_amount FROM expenditure 
               WHERE created_at >= '$currentYear-04-01' AND created_at <= '$currentYear-06-30'";

// Execute the SQL query
$select_query = mysqli_query($con, $select_sql);

// Check if there are results
if ($row = mysqli_fetch_array($select_query)) {
    // Display the total expenditure
    echo 'Tsh ' . $row['expenditure_amount'];
} else {
    // If there are no expenditures recorded for the specified period, display a message
    echo 'No expenditures recorded from April to June.';
}
?>

                    </h3>

                <p>Expenditures 4-6</p>
              </div>
              <a href="expenditure_4-6.php?invoice_number=<?php echo $_GET['invoice_number']?>" class="small-box-footer">Tazama matumizi<i class="fas fa-arrow-circle-right"></i></a>
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

// Get the current year
$currentYear = date("Y");

// Construct the SQL query to calculate the total sales for the period from July to September
$select_sql = "SELECT SUM(total_amount) AS total_sales FROM sales 
               WHERE Date >= '$currentYear-07-01' AND Date <= '$currentYear-09-30'";

// Execute the SQL query
$select_query = mysqli_query($con, $select_sql);

// Check if there are results
if ($row = mysqli_fetch_array($select_query)) {
    // Display the total sales
    echo 'Tsh ' . $row['total_sales'];
} else {
    // If there are no sales recorded for the specified period, display a message
    echo 'No sales recorded from July to September.';
}
?>
          </h3>
                


                <p>Sales 7-9</p>
              </div>
              <a href="sales_7-9.php?invoice_number=<?php echo $_GET['invoice_number']?>" class="small-box-footer">Tazama mauzo <i class="fas fa-arrow-circle-right"></i></a>
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

// Get the current year
$currentYear = date("Y");

// Construct the SQL query to calculate the total s the period from July to September
$select_sql = "SELECT SUM(total_profit) AS total_profit FROM sales 
               WHERE Date >= '$currentYear-07-01' AND Date <= '$currentYear-09-30'";

// Execute the SQL query
$select_query = mysqli_query($con, $select_sql);

// Check if there are results
if ($row = mysqli_fetch_array($select_query)) {
    // Display the total sales
    echo 'Tsh ' . $row['total_profit'];
} else {
    // If there are no sales recorded for the specified period, display a message
    echo 'No sales recorded from July to September.';
}
?>
         
              </h3>   
                 
                <p>Profit 7-9</p>
              </div>
              <a href="sales_7-9.php?invoice_number=<?php echo $_GET['invoice_number']?>" class="small-box-footer">Tazama faida <i class="fas fa-arrow-circle-right"></i></a>
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

// Construct the SQL query to calculate the total s the period from July to September
$select_sql = "SELECT COUNT(total_profit) AS total_profit FROM sales 
               WHERE Date >= '$currentYear-07-01' AND Date <= '$currentYear-09-30'";

// Execute the SQL query
$select_query = mysqli_query($con, $select_sql);

// Check if there are results
if ($row = mysqli_fetch_array($select_query)) {
    // Display the total sales
    echo 'Tsh ' . $row['total_profit'];
} else {
    // If there are no sales recorded for the specified period, display a message
    echo 'No sales recorded from July to September.';
}
?>
    
                </h3>

                <p>quantity sold 7-9</p>
              </div>
              <a href="sales_7-9.php?invoice_number=<?php echo $_GET['invoice_number']?>" class="small-box-footer">Tazama mauzo <i class="fas fa-arrow-circle-right"></i></a>
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

// Get the current year
$currentYear = date("Y");

// Construct the SQL query to calculate the total expenditure for the period from July to September
$select_sql = "SELECT SUM(expenditure_amount) AS expenditure_amount FROM expenditure 
               WHERE created_at >= '$currentYear-07-01' AND created_at <= '$currentYear-09-30'";

// Execute the SQL query
$select_query = mysqli_query($con, $select_sql);

// Check if there are results
if ($row = mysqli_fetch_array($select_query)) {
    // Display the total expenditure
    echo 'Tsh ' . $row['expenditure_amount'];
} else {
    // If there are no expenditure recorded for the specified period, display a message
    echo 'No expenditure recorded from July to September.';
}
?>


                    </h3>

                <p>Expenditures 7-9</p>
              </div>
              <a href="expenditure_7-9.php?invoice_number=<?php echo $_GET['invoice_number']?>" class="small-box-footer">Tazama matumizi<i class="fas fa-arrow-circle-right"></i></a>
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

// Get the current year
$currentYear = date("Y");

// Construct the SQL query to calculate the total sales for the period from July to September
$select_sql = "SELECT SUM(total_amount) AS total_sales FROM sales 
               WHERE Date >= '$currentYear-10-01' AND Date <= '$currentYear-12-31'";

// Execute the SQL query
$select_query = mysqli_query($con, $select_sql);

// Check if there are results
if ($row = mysqli_fetch_array($select_query)) {
    // Display the total sales
    echo 'Tsh ' . $row['total_sales'];
} else {
    // If there are no sales recorded for the specified period, display a message
    echo 'No sales recorded from July to September.';
}
?>
                </h3> 
                


                <p>Sales  10-12</p>
              </div>
              <a href="sales_this_month.php?invoice_number=<?php echo $_GET['invoice_number']?>" class="small-box-footer">Tazama mauzo <i class="fas fa-arrow-circle-right"></i></a>
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

// Get the current year
$currentYear = date("Y");

// Construct the SQL query to calculate the total sales for the period from July to September
$select_sql = "SELECT SUM(total_profit) AS total_profit FROM sales
               WHERE Date >= '$currentYear-10-01' AND Date <= '$currentYear-12-31'";

// Execute the SQL query
$select_query = mysqli_query($con, $select_sql);

// Check if there are results
if ($row = mysqli_fetch_array($select_query)) {
    // Display the total sales
    echo 'Tsh ' . $row['total_profit'];
} else {
    // If there are no sales recorded for the specified period, display a message
    echo 'No sales recorded from July to September.';
}
?>
        
              </h3>   
                 
                <p>Profit 10-12</p>
              </div>
              <a href="sales_10-12.php?invoice_number=<?php echo $_GET['invoice_number']?>" class="small-box-footer">Tazama faida <i class="fas fa-arrow-circle-right"></i></a>
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

// Construct the SQL query to calculate the total sales for the period from July to September
$select_sql = "SELECT COUNT(total_profit) AS total_profit FROM sales
               WHERE Date >= '$currentYear-10-01' AND Date <= '$currentYear-12-31'";

// Execute the SQL query
$select_query = mysqli_query($con, $select_sql);

// Check if there are results
if ($row = mysqli_fetch_array($select_query)) {
    // Display the total sales
    echo 'Tsh ' . $row['total_profit'];
} else {
    // If there are no sales recorded for the specified period, display a message
    echo 'No sales recorded from July to September.';
}
?>
                </h3>

                <p>quantity sold 10-12</p>
              </div>
              <a href="sales_10-12.php?invoice_number=<?php echo $_GET['invoice_number']?>" class="small-box-footer">Tazama mauzo <i class="fas fa-arrow-circle-right"></i></a>
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

// Get the current year
$currentYear = date("Y");

// Construct the SQL query to calculate the total expenditure for the period from July to September
$select_sql = "SELECT SUM(expenditure_amount) AS expenditure_amount FROM expenditure 
               WHERE created_at >= '$currentYear-10-01' AND created_at <= '$currentYear-12-31'";

// Execute the SQL query
$select_query = mysqli_query($con, $select_sql);

// Check if there are results
if ($row = mysqli_fetch_array($select_query)) {
    // Display the total expenditure
    echo 'Tsh ' . $row['expenditure_amount'];
} else {
    // If there are no expenditure recorded for the specified period, display a message
    echo 'No expenditure recorded from July to September.';
}
?>
                    </h3>

                <p>Expenditures 10-12</p>
              </div>
              <a href="expenditure_10-12.php?invoice_number=<?php echo $_GET['invoice_number']?>" class="small-box-footer">Tazama matumizi<i class="fas fa-arrow-circle-right"></i></a>
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

// Get the current year
$currentYear = date("Y");

// Construct the SQL query to calculate the total sales for the period from July to September
$select_sql = "SELECT SUM(total_amount) AS total_sales FROM sales 
               WHERE Date >= '$currentYear-01-01' AND Date <= '$currentYear-06-31'";

// Execute the SQL query
$select_query = mysqli_query($con, $select_sql);

// Check if there are results
if ($row = mysqli_fetch_array($select_query)) {
    // Display the total sales
    echo 'Tsh ' . $row['total_sales'];
} else {
    // If there are no sales recorded for the specified period, display a message
    echo 'No sales recorded from July to September.';
}
?>
                </h3> 
                


                <p>Sales  1-6</p>
              </div>
              <a href="sales_1-6.php?invoice_number=<?php echo $_GET['invoice_number']?>" class="small-box-footer">Tazama mauzo <i class="fas fa-arrow-circle-right"></i></a>
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

// Get the current year
$currentYear = date("Y");

// Construct the SQL query to calculate the total sales for the period from July to September
$select_sql = "SELECT SUM(total_profit) AS total_profit FROM sales
               WHERE Date >= '$currentYear-01-01' AND Date <= '$currentYear-06-30'";

// Execute the SQL query
$select_query = mysqli_query($con, $select_sql);

// Check if there are results
if ($row = mysqli_fetch_array($select_query)) {
    // Display the total sales
    echo 'Tsh ' . $row['total_profit'];
} else {
    // If there are no sales recorded for the specified period, display a message
    echo 'No sales recorded from July to September.';
}
?>
        
              </h3>   
                 
                <p>Profit 1-6</p>
              </div>
              <a href="sales_1-6.php?invoice_number=<?php echo $_GET['invoice_number']?>" class="small-box-footer">Tazama faida <i class="fas fa-arrow-circle-right"></i></a>
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

// Construct the SQL query to calculate the total sales for the period from July to September
$select_sql = "SELECT COUNT(total_profit) AS total_profit FROM sales
               WHERE Date >= '$currentYear-01-01' AND Date <= '$currentYear-06-31'";

// Execute the SQL query
$select_query = mysqli_query($con, $select_sql);

// Check if there are results
if ($row = mysqli_fetch_array($select_query)) {
    // Display the total sales
    echo 'Tsh ' . $row['total_profit'];
} else {
    // If there are no sales recorded for the specified period, display a message
    echo 'No sales recorded from July to September.';
}
?>
                </h3>

                <p>quantity sold 1-6</p>
              </div>
              <a href="sales_1-6.php?invoice_number=<?php echo $_GET['invoice_number']?>" class="small-box-footer">Tazama mauzo <i class="fas fa-arrow-circle-right"></i></a>
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

// Get the current year
$currentYear = date("Y");

// Construct the SQL query to calculate the total expenditure for the period from July to September
$select_sql = "SELECT SUM(expenditure_amount) AS expenditure_amount FROM expenditure 
               WHERE created_at >= '$currentYear-01-01' AND created_at <= '$currentYear-06-31'";

// Execute the SQL query
$select_query = mysqli_query($con, $select_sql);

// Check if there are results
if ($row = mysqli_fetch_array($select_query)) {
    // Display the total expenditure
    echo 'Tsh ' . $row['expenditure_amount'];
} else {
    // If there are no expenditure recorded for the specified period, display a message
    echo 'No expenditure recorded from July to September.';
}
?>
                    </h3>

                <p>Expenditures 1-6</p>
              </div>
              <a href="expenditure_1-6.php?invoice_number=<?php echo $_GET['invoice_number']?>" class="small-box-footer">Tazama matumizi<i class="fas fa-arrow-circle-right"></i></a>
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

// Get the current year
$currentYear = date("Y");

// Construct the SQL query to calculate the total sales for the period from July to September
$select_sql = "SELECT SUM(total_amount) AS total_sales FROM sales 
               WHERE Date >= '$currentYear-07-01' AND Date <= '$currentYear-12-31'";

// Execute the SQL query
$select_query = mysqli_query($con, $select_sql);

// Check if there are results
if ($row = mysqli_fetch_array($select_query)) {
    // Display the total sales
    echo 'Tsh ' . $row['total_sales'];
} else {
    // If there are no sales recorded for the specified period, display a message
    echo 'No sales recorded from July to September.';
}
?>
                </h3> 
                


                <p>Sales  7-12</p>
              </div>
              <a href="sales_10-12.php?invoice_number=<?php echo $_GET['invoice_number']?>" class="small-box-footer">Tazama mauzo <i class="fas fa-arrow-circle-right"></i></a>
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

// Get the current year
$currentYear = date("Y");

// Construct the SQL query to calculate the total sales for the period from July to September
$select_sql = "SELECT SUM(total_profit) AS total_profit FROM sales
               WHERE Date >= '$currentYear-07-01' AND Date <= '$currentYear-12-31'";

// Execute the SQL query
$select_query = mysqli_query($con, $select_sql);

// Check if there are results
if ($row = mysqli_fetch_array($select_query)) {
    // Display the total sales
    echo 'Tsh ' . $row['total_profit'];
} else {
    // If there are no sales recorded for the specified period, display a message
    echo 'No sales recorded from July to September.';
}
?>
        
              </h3>   
                 
                <p>Profit 7-12</p>
              </div>
              <a href="sales_10-12.php?invoice_number=<?php echo $_GET['invoice_number']?>" class="small-box-footer">Tazama faida <i class="fas fa-arrow-circle-right"></i></a>
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

// Construct the SQL query to calculate the total sales for the period from July to September
$select_sql = "SELECT COUNT(total_profit) AS total_profit FROM sales
               WHERE Date >= '$currentYear-07-01' AND Date <= '$currentYear-12-31'";

// Execute the SQL query
$select_query = mysqli_query($con, $select_sql);

// Check if there are results
if ($row = mysqli_fetch_array($select_query)) {
    // Display the total sales
    echo '' . $row['total_profit'];
} else {
    // If there are no sales recorded for the specified period, display a message
    echo 'No sales recorded from July to September.';
}
?>
                </h3>

                <p>quantity sold 7-12</p>
              </div>
              <a href="sales_07-12.php?invoice_number=<?php echo $_GET['invoice_number']?>" class="small-box-footer">Tazama mauzo <i class="fas fa-arrow-circle-right"></i></a>
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

// Get the current year
$currentYear = date("Y");

// Construct the SQL query to calculate the total expenditure for the period from July to September
$select_sql = "SELECT SUM(expenditure_amount) AS expenditure_amount FROM expenditure 
               WHERE created_at >= '$currentYear-07-01' AND created_at <= '$currentYear-12-31'";

// Execute the SQL query
$select_query = mysqli_query($con, $select_sql);

// Check if there are results
if ($row = mysqli_fetch_array($select_query)) {
    // Display the total expenditure
    echo 'Tsh ' . $row['expenditure_amount'];
} else {
    // If there are no expenditure recorded for the specified period, display a message
    echo 'No expenditure recorded from July to September.';
}
?>
                    </h3>

                <p>Expenditures 7-12</p>
              </div>
              <a href="expenditure_7-12.php?invoice_number=<?php echo $_GET['invoice_number']?>" class="small-box-footer">Tazama matumizi<i class="fas fa-arrow-circle-right"></i></a>
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

// Get the current year
$currentYear = date("Y");

// Construct the SQL query to calculate the total sales for the period from July to September
$select_sql = "SELECT SUM(total_amount) AS total_sales FROM sales 
               WHERE Date >= '$currentYear-01-01' AND Date <= '$currentYear-12-30'";

// Execute the SQL query
$select_query = mysqli_query($con, $select_sql);

// Check if there are results
if ($row = mysqli_fetch_array($select_query)) {
    // Display the total sales
    echo 'Tsh ' . $row['total_sales'];
} else {
    // If there are no sales recorded for the specified period, display a message
    echo 'No sales recorded from July to September.';
}
?>
                </h3> 
                


                <p>Sales 1-12</p>
              </div>
              <a href="sales_1-12.php?invoice_number=<?php echo $_GET['invoice_number']?>" class="small-box-footer">Tazama mauzo <i class="fas fa-arrow-circle-right"></i></a>
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

// Get the current year
$currentYear = date("Y");

// Construct the SQL query to calculate the total sales for the period from July to September
$select_sql = "SELECT SUM(total_profit) AS total_profit FROM sales
               WHERE Date >= '$currentYear-01-01' AND Date <= '$currentYear-12-31'";

// Execute the SQL query
$select_query = mysqli_query($con, $select_sql);

// Check if there are results
if ($row = mysqli_fetch_array($select_query)) {
    // Display the total sales
    echo 'Tsh ' . $row['total_profit'];
} else {
    // If there are no sales recorded for the specified period, display a message
    echo 'No sales recorded from July to September.';
}
?>
        
              </h3>   
                 
                <p>Profit 1-12</p>
              </div>
              <a href="sales_1-12.php?invoice_number=<?php echo $_GET['invoice_number']?>" class="small-box-footer">Tazama faida <i class="fas fa-arrow-circle-right"></i></a>
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

// Construct the SQL query to calculate the total sales for the period from July to September
$select_sql = "SELECT COUNT(total_profit) AS total_profit FROM sales
               WHERE Date >= '$currentYear-01-01' AND Date <= '$currentYear-12-31'";

// Execute the SQL query
$select_query = mysqli_query($con, $select_sql);

// Check if there are results
if ($row = mysqli_fetch_array($select_query)) {
    // Display the total sales
    echo 'Tsh ' . $row['total_profit'];
} else {
    // If there are no sales recorded for the specified period, display a message
    echo 'No sales recorded from July to September.';
}
?>
                </h3>

                <p>quantity sold 1-12</p>
              </div>
              <a href="sales_1-12.php?invoice_number=<?php echo $_GET['invoice_number']?>" class="small-box-footer">Tazama mauzo <i class="fas fa-arrow-circle-right"></i></a>
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

// Get the current year
$currentYear = date("Y");

// Construct the SQL query to calculate the total expenditure for the period from July to September
$select_sql = "SELECT SUM(expenditure_amount) AS expenditure_amount FROM expenditure 
               WHERE created_at >= '$currentYear-01-01' AND created_at <= '$currentYear-12-31'";

// Execute the SQL query
$select_query = mysqli_query($con, $select_sql);

// Check if there are results
if ($row = mysqli_fetch_array($select_query)) {
    // Display the total expenditure
    echo 'Tsh ' . $row['expenditure_amount'];
} else {
    // If there are no expenditure recorded for the specified period, display a message
    echo 'No expenditure recorded from July to September.';
}
?>
                    </h3>

                <p>Expenditures 1-12</p>
              </div>
              <a href="expenditure_1-12.php?invoice_number=<?php echo $_GET['invoice_number']?>" class="small-box-footer">Tazama matumizi<i class="fas fa-arrow-circle-right"></i></a>
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


// Construct the SQL query to calculate the total sales for the period from July to September
$select_sql = "SELECT SUM(total_amount) AS total_sales FROM sales";

// Execute the SQL query
$select_query = mysqli_query($con, $select_sql);

// Check if there are results
if ($row = mysqli_fetch_array($select_query)) {
    // Display the total sales
    echo 'Tsh ' . $row['total_sales'];
} else {
    // If there are no sales recorded for the specified period, display a message
    echo 'No sales recorded from July to September.';
}
?>
                </h3> 
                


                <p>All sales</p>
              </div>
              <a href="all_sales.php?invoice_number=<?php echo $_GET['invoice_number']?>" class="small-box-footer">Tazama mauzo <i class="fas fa-arrow-circle-right"></i></a>
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


// Construct the SQL query to calculate the total sales for the period from July to September
$select_sql = "SELECT SUM(total_profit) AS total_profit FROM sales";

// Execute the SQL query
$select_query = mysqli_query($con, $select_sql);

// Check if there are results
if ($row = mysqli_fetch_array($select_query)) {
    // Display the total sales
    echo 'Tsh ' . $row['total_profit'];
} else {
    // If there are no sales recorded for the specified period, display a message
    echo 'No sales recorded from July to September.';
}
?>
        
              </h3>   
                 
                <p>All profits</p>
              </div>
              <a href="all_sales.php?invoice_number=<?php echo $_GET['invoice_number']?>" class="small-box-footer">Tazama faida <i class="fas fa-arrow-circle-right"></i></a>
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


// Construct the SQL query to calculate the total all sales 
$select_sql = "SELECT COUNT(total_profit) AS total_profit FROM sales";

// Execute the SQL query
$select_query = mysqli_query($con, $select_sql);

// Check if there are results
if ($row = mysqli_fetch_array($select_query)) {
    // Display the total sales
    echo 'Tsh ' . $row['total_profit'];
} else {
    // If there are no sales recorded for the specified period, display a message
    echo 'No sales recorded from July to September.';
}
?>
                </h3>

                <p>All quantity sold</p>
              </div>
              <a href="all_sales.php?invoice_number=<?php echo $_GET['invoice_number']?>" class="small-box-footer">Tazama mauzo <i class="fas fa-arrow-circle-right"></i></a>
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

// Construct the SQL query to calculate the total expenditure for all periods
$select_sql = "SELECT SUM(expenditure_amount) AS expenditure_amount FROM expenditure";

// Execute the SQL query
$select_query = mysqli_query($con, $select_sql);

// Check if there are results
if ($row = mysqli_fetch_array($select_query)) {
    // Display the total expenditure
    echo 'Tsh ' . $row['expenditure_amount'];
} else {
    // If there are no expenditures recorded, display a message
    echo 'No expenditure recorded.';
}
?>

                    </h3>

                <p>All expenditures</p>
              </div>
              <a href="expenditure_10-12.php?invoice_number=<?php echo $_GET['invoice_number']?>" class="small-box-footer">Tazama matumizi<i class="fas fa-arrow-circle-right"></i></a>
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






      </div>
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
<script src="./plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="./plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables -->
<script src="./plugins/datatables/jquery.dataTables.min.js"></script>
<script src="./plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="./plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="./plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<!-- AdminLTE App -->
<script src="./dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="./dist/js/demo.js"></script>


<!-- loading circular progrss javascript on footer before clossing body -->
<script>
  $(window).on('load', function() {
    $('#spinner').hide();
    $('#content').show();
  });
</script>

</body>
</html>