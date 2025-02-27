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
        <a href="#" class="nav-link">Home</a>
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
                <strong>  &nbsp;&nbsp;Log out</strong>
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
              <li class="breadcrumb-item active">Matumizi</li> -->
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
                <h3 class="card-title"><b>Purchases report</b></h3>
              </div>
              <!-- /.card-header -->
              <section class="content">
                <div class="container-fluid">
                  <div class="row">
                    <div class="col-12">
                      <div class="card">
                        <div class="card-header">
                          <center>
                            <form action="purchases_report.php?invoice_number=<?php echo $_GET['invoice_number']?>" method="POST" class="form-inline mb-4">
                              <div class="form-group mb-4">
                                <label for="d1"><strong>From:</strong></label>
                                <input type="date" id="d1" name="d1" class="form-control ml-2" autocomplete="off" required>
                              </div>
                              <div class="form-group ml-3 mb-4">
                                <label for="d2"><strong>To:</strong></label>
                                <input type="date" id="d2" name="d2" class="form-control ml-2" autocomplete="off" required>
                              </div>
                              <div class="form-group ml-3 mb-4">
                                 <label for="created_by" class="sr-only">Purchase Recorder:</label>
                                 <input type="text" id="created_by" name="created_by" class="form-control" placeholder="Recorder name" autocomplete="off">
                               </div>
                               <div class="form-group ml-3 mb-4">
                                  <label for="customer_name" class="sr-only">Company:</label>
                                  <input type="text" id="company" name="company" class="form-control" placeholder="company name" autocomplete="off">
                               </div>
                               <div class="form-group ml-3 mb-4">
                                  <label for="medicine" class="sr-only">Medicine name:</label>
                                  <input type="text" id="medicine_name" name="medicine_name" class="form-control" placeholder="Medicine name" autocomplete="off">
                               </div>
                               <div class="form-group ml-3 mb-4">
                                   <label for="category" class="sr-only">Medicine category:</label>
                                   <input type="text" id="category" name="category" class="form-control" placeholder="Category name" autocomplete="off">
                               </div>
                               <div class="form-group ml-3 mb-4">
                                    <label for="status" class="sr-only">Payment status:</label>
                                    <input type="text" id="status" name="status" class="form-control" placeholder="Payment status" autocomplete="off">
                               </div>
                               <div class="form-group ml-3 mb-4">
                                    <button class="btn btn-info" type="submit" name="submit"><i class="icon icon-search icon-large"></i> Tafuta</button>
                               </div>
                            </form>
                          </center>
                          <div style="overflow-x:auto; overflow-y: auto;">
                            <table class="table table-bordered table-striped table-hover">
                              <thead>
                                <tr style="background-color: #383838; color: #FFFFFF;">
                                <th>Date</th>
                                  <th>Medicine</th>
                                  <th>Category</th>
                                  <th>Old Quantity</th>
                                  <th>Received Quantity</th>
                                  <th>Price per product</th>
                                  <th>Total </th>
                                  <th>Receipt number</th>
                                  <th>Batch number</th>
                                  <th>Company</th>
                                  <th>Recorded by</th>
                                  <th>Payment status</th>
                                </tr>
                              </thead>
                              <?php
                              include("dbcon.php");
                              error_reporting(1);
                              if(isset($_POST['submit'])){
                                $d1 = $_POST['d1'];
                                $d2 = $_POST['d2'];
                                $created_by = $_POST['created_by'];
                                $company = $_POST['company'];
                                $medicine_name = $_POST['medicine_name'];
                                $category = $_POST['category'];
                                $status = $_POST['status'];
                                
                                $select_sql = "SELECT * FROM purchases_report WHERE received_date BETWEEN '$d1' AND '$d2'";
                                
                                if (!empty($created_by)) {
                                  $select_sql .= " AND created_by LIKE '%$created_by%'";
                                }
                                if (!empty($company)) {
                                  $select_sql .= " AND company LIKE '%$company%'";
                                }
                                if (!empty($medicine_name)) {
                                  $select_sql .= " AND medicine_name LIKE '%$medicine_name%'";
                                }
                                if (!empty($category)) {
                                  $select_sql .= " AND category LIKE '%$category%'";
                                }
                                if (!empty($status)) {
                                  $select_sql .= " AND status LIKE '%$status%'";
                                }
                                
                                $select_sql .= " ORDER BY received_date DESC";
                                
                                $select_query = mysqli_query($con, $select_sql);
                                
                                while($row = mysqli_fetch_array($select_query)) :
                              ?>
                              <tbody>
                                <tr> 
                                 <td><?php echo $row['received_date']?></td>
                                  <td><?php echo $row['medicine_name']?></td>
                                  <td><?php echo $row['category']?></td>
                                  <td><?php echo $row['old_quantity']?></td>
                                  <td><?php echo $row['received_quantity']?></td>
                                  <td><?php echo $row['actual_price']?></td>
                                  <td><?php echo $row['credit_amount']?></td> <!-- New column -->
                                  <td><?php echo $row['receipt_number']?></td>
                                  <td><?php echo $row['batch_number']?></td>
                                  <td><?php echo $row['company']?></td>
                                  <td><?php echo $row['created_by']?></td>
                                  <td><?php echo $row['status']?></td>
                                </tr>
                              </tbody>
                              <?php endwhile;?>
                              <tfoot>
                                <tr>
                                  <th colspan="6">Total:</th>
                                  <th>
                                    <?php
                                    $select_sql = "SELECT SUM(credit_amount) FROM purchases_report WHERE received_date BETWEEN '$d1' AND '$d2'";
                                    if (!empty($created_by)) {
                                      $select_sql .= " AND created_by LIKE '%$created_by%'";
                                    }
                                    if (!empty($company)) {
                                      $select_sql .= " AND company LIKE '%$company%'";
                                    }
                                    if (!empty($medicine_name)) {
                                      $select_sql .= " AND medicine_name LIKE '%$medicine_name%'";
                                    }
                                    if (!empty($category)) {
                                      $select_sql .= " AND category LIKE '%$category%'";
                                    }
                                    if (!empty($status)) {
                                      $select_sql .= " AND status LIKE '%$status%'";
                                    }
                                    $select_query = mysqli_query($con, $select_sql);
                                    while($row = mysqli_fetch_array($select_query)){
                                      echo $row['SUM(credit_amount)'].' Tsh';
                                    }
                                    ?>
                                  </th>
                                </tr>
                              </tfoot>
                              <?php } else {
                                $date = date('Y-m-d');
                                $select_sql = "SELECT * FROM purchases_report WHERE received_date = '$date'";
                                $select_query = mysqli_query($con, $select_sql);
                                while($row = mysqli_fetch_array($select_query)) :
                              ?>
                              <tbody>
                                <tr> 
                                <td><?php echo $row['received_date']?></td>
                                  <td><?php echo $row['medicine_name']?></td>
                                  <td><?php echo $row['category']?></td>
                                  <td><?php echo $row['old_quantity']?></td>
                                  <td><?php echo $row['received_quantity']?></td>
                                  <td><?php echo $row['actual_price']?></td>
                                  <td><?php echo $row['credit_amount']?></td> <!-- New column -->
                                  <td><?php echo $row['receipt_number']?></td>
                                  <td><?php echo $row['batch_number']?></td>
                                  <td><?php echo $row['company']?></td>
                                  <td><?php echo $row['created_by']?></td>
                                  <td><?php echo $row['status']?></td>
                                </tr>
                              </tbody>
                              <?php endwhile;?>
                              <tfoot>
                                <tr>
                                  <th colspan="6">Total</th>
                                  <th>
                                    <?php
                                    $select_sql = "SELECT SUM(credit_amount) FROM purchases_report WHERE received_date = '$date'";
                                    $select_query = mysqli_query($con, $select_sql);
                                    while($row = mysqli_fetch_array($select_query)){
                                      echo $row['SUM(credit_amount)'].' Tsh';
                                    }
                                    ?>
                                  </th>
                                </tr>
                              </tfoot>
                              <?php } ?>
                            </table>
                            <center>
                              <div class="export-buttons">
                                <a href="export_excel.php?d1=<?php echo $d1; ?>&d2=<?php echo $d2; ?>&created_by=<?php echo $created_by; ?>&company=<?php echo $company; ?>&medicine_name=<?php echo $medicine_name; ?>&category=<?php echo $category; ?>&status=<?php echo $status; ?>" class="btn btn-success">Pakua katika Excel</a>
                                <a href="export_purchases.php?d1=<?php echo $d1; ?>&d2=<?php echo $d2; ?>&created_by=<?php echo $created_by; ?>&company=<?php echo $company; ?>&medicine_name=<?php echo $medicine_name; ?>&category=<?php echo $category; ?>&received_date=<?php echo $received_date; ?>" class="btn btn-danger">Pakua katika PDF</a>
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
