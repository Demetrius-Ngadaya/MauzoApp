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

		function med_name() {//***Search For Medicine *****
  var input, filter, table, tr, td, i;
  input = document.getElementById("name_med");
  filter = input.value.toUpperCase();
  table = document.getElementById("table1");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
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

    <!-- SEARCH FORM -->
  


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
  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">						
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <!-- <li class="breadcrumb-item"><a href="#">Admin</a></li>
              <li class="breadcrumb-item active">Dawa zinazo karibia ku expire</li> -->
            </ol>
          </div>
        </div>
      </div>
      
      <!-- /.container-fluid -->
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
             
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                 <b>  Dawa zinazokaribia kuisha mda wa matumizi </b> </h3>
              </div>
              <!-- /.card-header -->
             
              <div class="card-body">
              <?php include ('modal_expenditure.php');?>
						
						<div class="card-body table-responsive">
            <div class="hero-unit-table">   
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
			  <tr style="background-color: #383838; color: #FFFFFF;" >
            <th>S/N</th> <!-- Add the S/N column -->
    	  		<th>Jina Dawa</th>
    	     	<th>Tarehe ya kuexpire</th>
    	     	<th>Idadi iliyobakia</th>
    	  		<th>Bei ya kununulia</th>
				<th>Jumla kiasi </th>
    	  	</tr>
			  </thead>
      <?php
           include("dbcon.php");
           $date = date('Y-m-d'); // Get current date in 'Y-m-d' format
           $inc_date = date("Y-m-d", strtotime("+6 month", strtotime($date))); // Get date 6 months from now 
           $total_remain_quantity = 0;
           $total_actual_price = 0;
           
           // Construct SQL query to select medicines that will expire within the next 6 months and are not yet expired
          $select_sql = "SELECT * FROM stock WHERE expire_date BETWEEN '$date' AND '$inc_date' AND status='Available' AND expire_date > '$date' ORDER BY expire_date ASC";
          $result = mysqli_query($con, $select_sql);
          $serial_number = 1; // Initialize the serial number
           while ($row = mysqli_fetch_array($result)):  
            $total_remain_quantity += $row['remain_quantity'];
            $total_actual_price += $row['actual_price'] * $row['remain_quantity'];
    	  ?> 
    	  <tr>
        <td><?php echo $serial_number++; ?></td> <!-- Display the serial number -->
    	  	<td><?php echo $row['medicine_name']?></td>
    	    <td><font color="red"><?php echo $row['expire_date']?></font></td>
    	  	<td><?php echo $row['remain_quantity']."(".$row['sell_type'].")"?></td>
		      <td><?php echo $row['actual_price']?> Tsh</td>
    	  	<td><?php echo $row['actual_price']*$row['remain_quantity']?> Tsh</td>

    	  </tr>
    	<?php endwhile;?>
      </table>
      <div style="margin-top: 20px;">
    <table class="table table-bordered">
        <tr style="background-color: #f2f2f2;">
            <td><b>Jumla ya Dawa zinazokaribia ku expire ni : <?php echo $total_remain_quantity; ?></b></td>
            <td><b>Zenye thamani ya: Tsh <?php echo $total_actual_price; ?></b></td>
        </tr>
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
    <strong>Copyright &copy; 2024-2025 D_TECH.</strong>
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
