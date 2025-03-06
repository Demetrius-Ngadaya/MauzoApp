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
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Admin</a></li>
              <li class="breadcrumb-item active">Bidhaa zilizo haririwa</li>
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
                <h3 class="card-title"><b>Ripoti ya bidhaa zilizo haririwa</b></h3>
              </div>
              <!-- /.card-header -->
              <section class="content">
                <div class="container-fluid">
                  <div class="row">
                    <div class="col-12">
                      <div class="card">
                        <div class="card-header">
                          <center>
                          <form action="edited_products_report.php?invoice_number=<?php echo $_GET['invoice_number']?>" method="POST" class="form-inline">

      <div class="form-group">
        <label for="d1" class="sr-only">Kuanzia Tarehe:</label>
        <input type="date" id="d1" name="d1" class="form-control" placeholder="Kuanzia Tarehe" autocomplete="off">
      </div>
      <div class="form-group">
        <label for="d2" class="sr-only">Mbaka Tarehe:</label>
        <input type="date" id="d2" name="d2" class="form-control" placeholder="Mbaka Tarehe" autocomplete="off">
      </div>
      <div class="form-group">
        <label for="edited_by" class="sr-only">Aliyehariri:</label>
        <input type="text" id="edited_by" name="edited_by" class="form-control" placeholder="Aliye hariri" autocomplete="off">
      </div>
      <div class="form-group">
        <label for="medicine_name" class="sr-only">Jina la bidhaa:</label>
        <input type="text" id="medicine_name" name="medicine_name" class="form-control" placeholder="Jina la bidhaa" autocomplete="off">
      </div>
      <div class="form-group">
        <label for="category" class="sr-only">Aina ya bidhaa:</label>
        <input type="text" id="category" name="category" class="form-control" placeholder="Aina ya bidhaa" autocomplete="off">
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
                                  <th>Tarehe</th>
                                  <th>Bidhaa</th>
                                  <th>Aina ya bidhaa</th>
                                  <th>Idadi kabla kuhariri</th>
                                  <th>Idadi baada kuhariri</th>
                                  <th>Aliye hariri</th>
                                  <th>Sababu ya kuhariri</th>
                                </tr>
                              </thead>
                              <?php
                              include("dbcon.php");
                              error_reporting(1);

                              if(isset($_POST['submit'])){
                                $d1 = $_POST['d1'];
                                $d2 = $_POST['d2'];
                                $created_by = $_POST['edited_by'];
                                $medicine_name = $_POST['medicine_name'];
                                $category = $_POST['category'];
                                

                                $select_sql = "SELECT * FROM edited_products WHERE (edited_date BETWEEN '$d1' AND '$d2') OR (edited_date BETWEEN '$d1' AND '$d2')";
                                if (!empty($edited_by)) {
                                  $select_sql .= " AND edited_by LIKE '%$edited_by%'";
                                }
                                if (!empty($medicine_name)) {
                                  $select_sql .= " AND medicine_name LIKE '%$medicine_name%'";
                                }
                                if (!empty($category)) {
                                  $select_sql .= " AND category LIKE '%$category%'";
                                }
                                $select_sql .= " ORDER BY edited_date DESC";
                                
                                $select_query = mysqli_query($con, $select_sql);
                                
                                while($row = mysqli_fetch_array($select_query)) :
                              ?>
                              <tbody>
                                <tr>
                                  <td><?php echo $row['edited_date']?></td>
                                  <td><?php echo $row['medicine_name']?></td>
                                  <td><?php echo $row['category']?></td>
                                  <td><?php echo $row['old_quantity']?></td>
                                  <td><?php echo $row['act_remain_quantity']?></td>
                                  <td><?php echo $row['edited_by']?></td>
                                  <td><?php echo $row['edit_reason']?></td>
                                </tr>
                              </tbody>
                              <?php endwhile;?>
                              <?php } else {
                                $date = date('Y-m-d');
                                $select_sql = "SELECT * FROM edited_products WHERE edited_date = '$edited_date'";
                                $select_query = mysqli_query($con, $select_sql);
                                
                                while($row = mysqli_fetch_array($select_query)) :
                              ?>
                              <tbody>
                                <tr> 
                                  <td><?php echo $row['edited_date']?>&nbsp;&nbsp;(<font size='2' color='#009688;'>Leo</font>)</td>
                                  <td><?php echo $row['medicine_name']?></td>
                                  <td><?php echo $row['category']?></td>
                                  <td><?php echo $row['old_quantity']?></td>
                                  <td><?php echo $row['act_remain_quantity']?></td>
                                  <td><?php echo $row['edited_by']?></td>
                                  <td><?php echo $row['edit_reason']?></td>
                                </tr>
                              </tbody>
                              <?php endwhile;?>
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
