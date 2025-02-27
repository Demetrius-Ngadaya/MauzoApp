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
      <a href="#" class="nav-link">
                &nbsp;&nbsp;&nbsp;<i class="fa fa-user"></i>
                <strong><?php echo $mtumiaji ?> </strong>
                </a>
      </li>
      <li class="nav-item">
      <a href="#" class="nav-link">
                &nbsp;&nbsp;&nbsp;<i class="fa fa-power-off"></i>
                <strong>  &nbsp;&nbsp;Ondoka</strong>
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
             
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                 <b>  Dawa ambazo Hazijawahi kuuzwa   </b> </h3>
              </div>
              <!-- /.card-header -->
             
              <div class="card-body">
						
						<div class="card-body table-responsive">
            <div class="hero-unit-table">   
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                    <tr class="table-success">
                                    <th>Dawa</th>
                                    <th>Aina ya Dawa</th>
                                    <th>Msambazaji</th>
                                    <th>Idadi iliyosajiliwa</th>
                                    <th>Idadi iliyouzwa</th>  
                                    <th>Idadi iliyobaki</th>  
                                    <th>Tarehe iliyosajiliwa</th>
                                    <th>Tarehe mwisho wa matumizi</th>
                                    <th>Bei ya kununuliwa</th>
                                    <th>Bei ya kuuzia</th>
                                    <th>Faida</th>  
                                    <th>Hali</th>                                      
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
include("dbcon.php");

$select_sql = "SELECT * FROM stock WHERE quantity = act_remain_quantity";

// Execute the SQL query
$select_query = mysqli_query($con, $select_sql);

// Check if there are results
if (mysqli_num_rows($select_query) > 0) {
    // Output the sales data
    while ($row = mysqli_fetch_assoc($select_query)) {
$quantity_sold = $row['quantity'] - $row['act_remain_quantity'];

        // Output each row of sales data
        echo "<tr>";
        echo "<td>" . $row['medicine_name'] . "</td>";
        echo "<td>" . $row['category'] . "</td>";
        echo "<td>" . $row['company'] . "</td>";
        echo "<td>" . $row['quantity']."&nbsp;&nbsp;(<strong><i>".$row['sell_type']."</i></strong>)" . "</td>";
        echo "<td>" . $quantity_sold . "</td>";
        echo "<td>" . $row['act_remain_quantity'] . "</td>";
        echo "<td>" . date("d-m-Y", strtotime($row['register_date'])) . "</td>";
        echo "<td>" . date("d-m-Y", strtotime($row['expire_date'])) . "</td>";
        echo "<td>" . $row['actual_price'] . "</td>";
        echo "<td>" . $row['selling_price']. "</td>";
        echo "<td>" . $row['profit_price']. "</td>";
        echo "<td>" . $row['status'] . "</td>";
        echo "</tr>";
    }
} else {
    // If there are no sales recorded for today, display a message
    echo '<tr><td colspan="6">Hakuna Dawa ambayo haijawahi kuuzwa.</td></tr>';
}
?>

                                </tbody>
                            </table>
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
