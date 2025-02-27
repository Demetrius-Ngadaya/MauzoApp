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
  <title>MauzoApp - User Management</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="./plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="./plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="./plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="./dist/css/adminlte.min.css">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="adminDashboard.php" class="nav-link">Home</a>
      </li>     
    </ul>
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

  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="index.php" class="brand-link">   
      <H1><span class="brand-text font-weight-light"> MauzoApp</span></H1>
    </a>
    <div class="sidebar">
      <?php include('indexSideBar.php') ?>
    </div>
  </aside>

  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#createUserModal">Add new user</button>							
           <?php
            if (isset($_SESSION['error_message'])) {
    echo '<div id="message" style="color: red; text-align: center;">'.$_SESSION['error_message'].'</div>';
    unset($_SESSION['error_message']);
}

if (isset($_SESSION['success_message'])) {
    echo '<div id="message" style="color: green; text-align: center;">'.$_SESSION['success_message'].'</div>';
    unset($_SESSION['success_message']);
}
?>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <!-- <li class="breadcrumb-item"><a href="#">Admin</a></li>
              <li class="breadcrumb-item active">watumiaji</li> -->
            </ol>
          </div>
        </div>
      </div>
    </section>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title"><b>List of users of the system</b></h3>
              </div>
              <div class="card-body">
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                  <thead>
                    <tr class="table-success">
                      <th>User name</th>
                      <th>Role</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php include ('dbcon.php');
                    $query = mysqli_query($con, "SELECT * FROM users") or die(mysqli_error($con));
                    while ($row = mysqli_fetch_array($query)) {
                      $id = $row['id'];
                    ?>
                    <tr class="warning">
                      <td><?php echo $row['user_name']; ?></td> 
                      <td><?php echo $row['role']; ?></td> 
                      <td width="160">
                        <a href="edit_user.php?id=<?php echo $id; ?>&invoice_number=<?php echo $_GET['invoice_number']; ?>" class="btn btn-success"><i class="icon-pencil icon-large"></i>&nbsp;Edit</a>
                        <a href="#delete_user<?php echo $id; ?>" role="button" data-toggle="modal" class="btn btn-danger"><i class="icon-trash icon-large"></i>&nbsp;Delete</a>
                      </td>
                      <?php include ('modal_delete_user.php'); ?>
                    </tr>
                    <?php } ?> 
                  </tbody>
                </table>
              </div>
            </div>
            <?php include('modal_create_user.php'); ?>
          </div>
        </div>
      </div>
    </section>
  </div>
  <footer class="main-footer">
    <strong>Copyright &copy; 2023-2024 D_TECH.</strong> All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <strong>Designed and Developed by <a href="https://wa.me/message/JYOOWVES6MT7M1">D_TECH</a>.</strong>
    </div>
  </footer>
  <aside class="control-sidebar control-sidebar-dark"></aside>
</div>
<?php include ('script.php'); ?>
<script src="./plugins/jquery/jquery.min.js"></script>
<script src="./plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="./plugins/datatables/jquery.dataTables.min.js"></script>
<script src="./plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="./plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="./plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="./dist/js/adminlte.min.js"></script>
<script src="./dist/js/demo.js"></script>
<script>
  $(function () {
    $("#example1").DataTable({ "responsive": true, "autoWidth": false });
    $('#example2').DataTable({ "paging": true, "lengthChange": false, "searching": false, "ordering": true, "info": true, "autoWidth": false, "responsive": true });
  });
</script>
</body>
</html>
