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
                            <button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
                              Andika tumizi
                            </button>							
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Admin</a></li>
              <li class="breadcrumb-item active">Matumizi</li>
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
                <h3 class="card-title">
                 <b>  Matumizi yaliyofanyika  mwezi wa saba mbaka wa tisa</b> </h3>
              </div>
              <!-- /.card-header -->
             
              <div class="card-body">
              <?php include ('modal_expenditure.php');?>
						
						<div class="card-body table-responsive">
            <div class="hero-unit-table">   
            <div class="table-responsive">
    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
        <thead>
            <tr class="table-success">
                <th>S/N</th>
                <th>Jina la Tumizi</th>
                <th>Kiasi cha Pesa</th>
                <th>Maelezo</th>
                <th>Tarehe</th>
                <th>Kitendo</th>                                        
            </tr>
        </thead>
        <tbody>
        <?php 
include('dbcon.php');

// Get the current year
$currentYear = date("Y");

// Construct the SQL query to retrieve expenditure data from July to September
$query = mysqli_query($con,"SELECT * FROM expenditure WHERE created_at >= '$currentYear-07-01' AND created_at <= '$currentYear-09-30'") or die(mysqli_error($con));

$serialNumber = 1;
while ($row = mysqli_fetch_array($query)) {
    $id = $row['expenditure_id'];
    ?>
    <tr class="warning">
        <td><?php echo $serialNumber++; ?></td>
        <td><?php echo $row['expenditure_name']; ?></td> 
        <td><?php echo $row['expenditure_amount']; ?></td> 
        <td><?php echo $row['expenditure_description']; ?></td>
        <td><?php echo $row['created_at']; ?></td>
        <td width="160">
            <a href="#delete_expenditure<?php echo $id; ?>" role="button" data-target="#delete_product<?php echo $id; ?>" data-toggle="modal" class="btn btn-danger"><i class="icon-trash icon-large"></i>&nbsp;Futa</a>
            <a href="edit_expenditure.php<?php echo '?id=' . $id; ?>" class="btn btn-success"><i class="icon-pencil icon-large"></i>&nbsp;Badirisha</a>
        </td>
        <!-- expenditure delete modal -->
        <?php include('modal_delete_expenditure.php');?>
        <!-- end delete modal -->
    </tr>
    <?php 
} 
?>
</tbody>
</table>

</div>

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
<!-- page script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
</body>
</html>
