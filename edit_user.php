<?php
session_start();

// Check if the user is logged in
if(!isset($_SESSION['user_session'])){
    header("location:index.php");
    exit();
}
// Get the user ID and invoice_number from the URL
$get_id = $_GET['id'];
$invoice_number = isset($_GET['invoice_number']) ? $_GET['invoice_number'] : null;

// Get the user ID from the URL
$get_id = $_GET['id'];
include('dbcon.php');
if (isset($_POST['update'])) {
  $invoice_number = $_POST['invoice_number']; // Get the invoice_number from the form
  // Update user information...
  header("Location: user_management.php?invoice_number=$invoice_number");
  exit();
}
if(isset($_POST['update'])){
    $role = $_POST['role'];
    $password = $_POST['password'];
    $invoice_number = $_POST['invoice_number']; // Get the invoice_number from the form

    // If the password field is not empty, hash and update it
    if(!empty($password)){
        $password = password_hash($password, PASSWORD_DEFAULT);
        $query = "UPDATE users SET role = '$role', password = '$password' WHERE id = '$get_id'";
    } else {
        $query = "UPDATE users SET role = '$role' WHERE id = '$get_id'";
    }

    if (mysqli_query($con, $query)) {
      // Redirect with the invoice_number
      header("Location: user_management.php?invoice_number=$invoice_number");
      exit();
  } else {
      echo "<script>alert('Error updating user information.');</script>";
  }
}

// Fetch the user information
$query = mysqli_query($con, "SELECT * FROM users WHERE id = '$get_id'") or die(mysqli_error($con));
$row = mysqli_fetch_array($query);
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>MauzoApp - Badilisha taharifa za mtumiaji</title>
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
        <a href="adminDashboard.php" class="nav-link">Nyumbani</a>
      </li>     
    </ul>
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
      <a href="logout.php" class="nav-link">
        <i class="fa fa-power-off"></i>&nbsp;Ondoka
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
            <h1>Taharifa za mtumiaji</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Admin</a></li>
              <li class="breadcrumb-item active">watumiaji</li>
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
              <div class="card-body">
                <form method="post" enctype="multipart/form-data">
                  <div class="alert alert-info"><strong>Badilisha taharifa za mtumiaji</strong></div>
                  <hr>
                  <div class="control-group">
                    <label class="control-label" for="user_name">Jina la mtumiaji</label>
                    <div class="controls">
                      <input type="text" name="user_name" class="form-control" value="<?php echo $row['user_name']; ?>" required disabled>
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label" for="role">Wajibu</label>
                    <div class="controls">
                      <input type="text" name="role" class="form-control" value="<?php echo $row['role']; ?>" required>
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label" for="password">Neno la siri</label>
                    <div class="controls">
                      <input type="password" name="password" class="form-control">
                      <small>Kama hautaki kubadilisha neno la siri usiandike chochote sehemu ya neno la siri.</small>
                    </div>
                  </div>
                  <hr>
                  <div class="control-group">
                    <div class="controls">
                        <!-- Hidden input to carry invoice_number -->
                        <input type="hidden" name="invoice_number" value="<?php echo $invoice_number; ?>">
                         <button type="submit" name="update" class="btn btn-success"><i class="icon-save icon-large"></i>&nbsp;Hifadhi</button>
                      <a href="user_management.php?invoice_number=<?php echo $_GET['invoice_number']?>" class="btn btn-danger">Rudi nyuma</a>
                    </div>
                  </div>
                </form>
              </div>
            </div>
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
