<?php
session_start();

// Check if the user is already logged in
if(!isset($_SESSION['user_session'])) {
    header("Location: index.php"); // Redirect to the login page if not logged in
    exit();
}

// Initialize the last_activity session variable if not already set
if(!isset($_SESSION['last_activity'])) {
    $_SESSION['last_activity'] = time();
}

// Check if the user's last activity time is older than one minute
if(time() - $_SESSION['last_activity'] > 360000) {
    // Destroy the session
    session_unset();
    session_destroy();
    header("Location: index.php"); // Redirect to the login page
    exit();
}

// Update the user's last activity time
$_SESSION['last_activity'] = time();

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
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  
  <style>
    .form-group {
      margin-bottom: 1rem;
    }
    .form-control {
      width: 100%;
      padding: .375rem .75rem;
      border-radius: .25rem;
    }
    .form-container {
      margin: 20px;
    }
    .form-inline {
      display: flex;
      flex-wrap: wrap;
      justify-content: space-between;
    }
    .form-inline .form-group {
      flex: 1 1 45%;
      margin: 5px;
    }
    .form-inline .form-group input {
      width: 100%;
    }
    .btn {
      margin-top: 25px;
    }
  </style>
  <script src="js/jquery-1.7.2.min.js"></script>
  <script src="js/jquery_ui.js"></script>
  <script type="text/javascript" src="js/bootstrap.js"></script>
  <script type="text/javascript" src="src/facebox.js"></script>

  <script type="text/javascript">
    jQuery(document).ready(function($) {
      $("a[id*=popup]").facebox({
        loadingImage : 'src/img/loading.gif',
        closeImage   : 'src/img/closelabel.png'
      })
    }) 
  </script>
  <script type="text/javascript" src="js/tcal.js"></script>
  <script type="text/javascript">
    function Clickheretoprint() { 
      var disp_setting="toolbar=yes,location=no,directories=yes,menubar=yes,"; 
      disp_setting+="scrollbars=yes,width=700, height=400, left=100, top=25"; 
      var content_vlue = document.getElementById("content").innerHTML; 
      
      var docprint=window.open("","",disp_setting); 
      docprint.document.open(); 
      docprint.document.write('</head><body onLoad="self.print()" style="width: 700px; font-size:11px; font-family:arial; font-weight:normal;">');          
      docprint.document.write(content_vlue); 
      docprint.document.close(); 
      docprint.focus(); 
    }
  </script>
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
        <a href="#" class="nav-link">Nyumbani</a>
      </li>     
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
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
            <b>Credit sales report by paid credit</b>						
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="nav-item">
      <a href="#" class="nav-link">
                &nbsp;&nbsp;&nbsp;<i class="fa fa-user"></i>
                <strong><?php echo $mtumiaji ?> </strong>
                </a>
      </li>
      <!-- <li class="nav-item">
      <a href="logout.php" class="nav-link">
                &nbsp;&nbsp;&nbsp;<i class="fa fa-power-off"></i>
                <strong>  &nbsp;&nbsp;Ondoka</strong>
                </a>
      </li> -->
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
              <div class="card-header">
                <center>
                <div> 
                <a href="ripoti _mauzo_ya_mkopo.php?invoice_number=<?php echo $_GET['invoice_number']?>">By date of purchase</a> &nbsp;&nbsp;&nbsp;&nbsp;
                <a href="ripoti_mauzo_mkopo_siku_ya_kulipa.php?invoice_number=<?php echo $_GET['invoice_number']?>">By date to pay</a>&nbsp;&nbsp;&nbsp;&nbsp;
                <a href="ripoti_mauzo_mkopo_madeni_yaliyolipwa.php?invoice_number=<?php echo $_GET['invoice_number']?>">By paid credits</a>&nbsp;&nbsp;&nbsp;&nbsp;
                <a href="general_ripoti_mauzo_mkopo.php?invoice_number=<?php echo $_GET['invoice_number']?>">General report</a>&nbsp;&nbsp;&nbsp;&nbsp;

                </div>
                </center>
              </div>
              <!-- /.card-header -->
              <section class="content">
                <div class="container-fluid">
                  <div class="row">
                    <div class="col-12">
                      <div class="card">
                        <div class="card-header">
                          <center>
                          <form action="ripoti_mauzo_mkopo_madeni_yaliyolipwa.php?invoice_number=<?php echo $_GET['invoice_number']?>" method="POST" class="form-inline">

      <div class="form-group">
        <label for="d1" class="sr-only">Date from:</label>
        <input type="date" id="d1" name="d1" class="form-control" placeholder="Kuanzia Tarehe" autocomplete="off">
      </div>
      <div class="form-group">
        <label for="d2" class="sr-only">Date to:</label>
        <input type="date" id="d2" name="d2" class="form-control" placeholder="Mbaka Tarehe" autocomplete="off">
      </div>
      <div class="form-group">
        <label for="created_by" class="sr-only">Medicine seller:</label>
        <input type="text" id="created_by" name="created_by" class="form-control" placeholder="Medicine seller" autocomplete="off">
      </div>
      <div class="form-group">
        <label for="customer_name" class="sr-only">Customer name:</label>
        <input type="text" id="customer_name" name="customer_name" class="form-control" placeholder="Customer name" autocomplete="off">
      </div>
      <div class="form-group">
        <label for="medicine" class="sr-only">Medicine name:</label>
        <input type="text" id="medicine" name="medicine" class="form-control" placeholder="Medicine name" autocomplete="off">
      </div>
      <div class="form-group">
        <label for="category" class="sr-only">Medicine category:</label>
        <input type="text" id="category" name="category" class="form-control" placeholder="Medicine category" autocomplete="off">
      </div>
      <div class="form-group">
        <label for="hali_ya_malipo" class="sr-only">Payment status:</label>
        <input type="text" id="hali_ya_malipo" name="hali_ya_malipo" class="form-control" placeholder="Payment status" autocomplete="off">
      </div>
      <div class="form-group">
        <label for="payment_method" class="sr-only">Payment method:</label>
        <input type="text" id="payment_method" name="payment_method" class="form-control" placeholder="Payment method" autocomplete="off">
      </div>
      <div class="form-group">
        <button class="btn btn-info" type="submit" name="submit"><i class="icon icon-search icon-large"></i> Tafuta</button>
      </div>
    </form>
                          </center>
                          <div style="overflow-x:auto; overflow-y: auto;">
                            <table class="table table-bordered table-striped table-hover">
                              <thead>
                                <tr style="background-color: #383838; color: #FFFFFF;">
                                  <th>Purchase Date</th>
                                  <th>Medicine</th>
                                  <th>Quantity</th>
                                  <th>amount</th>
                                  <th>Profit</th>
                                  <th>Sold by</th>
                                  <th>Customer</th>
                                  <th>Order number</th>
                                  <th>Payment method</th>
                                  <th>Payment status</th>
                                  <th>Customer phone</th>
                                  <th>Date to pay</th>
                                  <th>Paid date</th>
                                  <th>Credit payment recorder</th>
                                </tr>
                              </thead>
                              <?php
                              include("dbcon.php");
                              error_reporting(1);

                              // Initialize totals
                              $total_quantity = 0;
                              $total_amount = 0;
                              $total_profit = 0;

                              if(isset($_POST['submit'])){
                                $d1 = $_POST['d1'];
                                $d2 = $_POST['d2'];
                                $created_by = $_POST['created_by'];
                                $customer_name = $_POST['customer_name'];
                                $medicine = $_POST['medicine'];
                                $category = $_POST['category'];
                                $hali_ya_malipo = $_POST['hali_ya_malipo'];
                                $payment_method = $_POST['payment_method'];
                                

                                $select_sql = "SELECT * FROM sales WHERE (paid_date BETWEEN '$d1' AND '$d2') AND (payment_method='credit') AND (hali_ya_malipo='paid') ";
                                if (!empty($created_by)) {
                                  $select_sql .= " AND created_by LIKE '%$created_by%'";
                                }
                                if (!empty($customer_name)) {
                                  $select_sql .= " AND customer_name LIKE '%$customer_name%'";
                                }
                                if (!empty($medicine)) {
                                  $select_sql .= " AND medicines LIKE '%$medicine%'";
                                }
                                if (!empty($hali_ya_malipo)) {
                                  $select_sql .= " AND hali_ya_malipo LIKE '%$hali_ya_malipo%'";
                                }
                                if (!empty($payment_method)) {
                                  $select_sql .= " AND payment_method LIKE '%$payment_method%'";
                                }
                                if (!empty($category)) {
                                  $select_sql .= " AND category LIKE '%$category%'";
                                }
                                $select_sql .= " ORDER BY paid_date DESC";
                                
                                $select_query = mysqli_query($con, $select_sql);
                                
                                while($row = mysqli_fetch_array($select_query)) :
                                  $total_quantity += $row['quantity'];
                                  $total_amount += $row['total_amount'];
                                  $total_profit += $row['total_profit'];
                              ?>
                              <tbody>
                                <tr>
                                  <td><?php echo $row['Date']?></td>
                                  <td><?php echo $row['medicines']?></td>
                                  <td><?php echo $row['quantity']?></td>
                                  <td><?php echo $row['total_amount']?></td>
                                  <td><?php echo $row['total_profit']?></td>
                                  <td><?php echo $row['created_by']?></td>
                                  <td><?php echo $row['customer_name']?></td> <!-- New column -->
                                  <td><?php echo $row['invoice_number']?></td>
                                  <td><?php echo $row['payment_method']?></td>
                                  <td><?php echo $row['hali_ya_malipo']?></td>
                                  <td><?php echo $row['phone_number']?></td>
                                  <td><?php echo $row['date_to_pay']?></td>
                                  <td><?php echo $row['paid_date']?></td>
                                  <td><?php echo $row['credit_payment_recorder']?></td>
                                </tr>
                              </tbody>
                              <?php endwhile;?>
                              <tfoot>
                                <tr>
                                  <th colspan="2">Jumla Mkuu:</th>
                                  <th><?php echo $total_quantity; ?></th>
                                  <th><?php echo $total_amount . ' Tsh'; ?></th>
                                  <th><?php echo $total_profit . ' Tsh'; ?></th>
                                  <th colspan="2"></th>
                                </tr>
                              </tfoot>
                              <?php } else {
                                $date = date('Y-m-d');
                                $select_sql = "SELECT * FROM sales WHERE paid_date = '$date' AND payment_method ='credit' AND hali_ya_malipo='paid' ";
                                $select_query = mysqli_query($con, $select_sql);
                                
                                while($row = mysqli_fetch_array($select_query)) :
                                  $total_quantity += $row['quantity'];
                                  $total_amount += $row['total_amount'];
                                  $total_profit += $row['total_profit'];
                              ?>
                              <tbody>
                                <tr> 
                                  <td><?php echo $row['Date']?>&nbsp;&nbsp;(<font size='2' color='#009688;'>Leo</font>)</td>
                                  <td><?php echo $row['medicines']?></td>
                                  <td><?php echo $row['quantity']?></td>
                                  <td><?php echo $row['total_amount']?></td>
                                  <td><?php echo $row['total_profit']?></td>
                                  <td><?php echo $row['created_by']?></td>
                                  <td><?php echo $row['customer_name']?></td>
                                  <td><?php echo $row['invoice_number']?></td>
                                  <td><?php echo $row['payment_method']?></td>
                                  <td><?php echo $row['hali_ya_malipo']?></td>
                                  <td><?php echo $row['paid_date']?>&nbsp;&nbsp;(<font size='2' color='#009688;'>Leo</font>)</td>

                                </tr>
                              </tbody>
                              <?php endwhile;?>
                              <tfoot>
                                <tr>
                                  <th colspan="2">Jumla Kuu:</th>
                                  <th><?php echo $total_quantity; ?></th>
                                  <th><?php echo $total_amount . ' Tsh'; ?></th>
                                  <th><?php echo $total_profit . ' Tsh'; ?></th>
                                  <th colspan="2"></th>
                                </tr>
                              </tfoot>
                              <?php } ?>
                            </table>
                            <center>
                              <div class="export-buttons">
                                <a href="export_excel.php?d1=<?php echo $d1; ?>&d2=<?php echo $d2; ?>&created_by=<?php echo $created_by; ?>&medicine=<?php echo $medicine; ?>&category=<?php echo $category; ?>" class="btn btn-success">Pakua katika Excel</a>
                                <a href="export_pdf.php?d1=<?php echo $d1; ?>&d2=<?php echo $d2; ?>&created_by=<?php echo $created_by; ?>&medicine=<?php echo $medicine; ?>&category=<?php echo $category; ?>" class="btn btn-danger">Pakua katika PDF</a>
                              </div>
                            </center>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </section>
              <!-- /.content -->
            </div>
          </div>
        </div>
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
</div>
<!-- ./wrapper -->
<script src="./plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="./dist/js/adminlte.min.js"></script>
</body>
</html>
