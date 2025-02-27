<?php
session_start();

if (!isset($_SESSION['user_session'])) {
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
                <strong>  &nbsp;log out</strong>
                </a>
      </li>
    </ul>
    </nav>
  
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
                        <!-- Content Header -->
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <!-- <li class="breadcrumb-item"><a href="#">Admin</a></li>
                            <li class="breadcrumb-item active">Matumizi</li> -->
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title"><b>Total sales</b></h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="card-body table-responsive">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                            <thead>
                                                <tr class="table-success">
                                                    <th>S/N</th>
                                                    <th>Date</th>
                                                    <th>Medicine</th>
                                                    <th>quantity</th>
                                                    <th>Amount</th>
                                                    <th>Total profit</th>  
                                                    <th>invoice number</th>    
                                                    <th>Seller</th>                                     
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                // Include database connection
                                                include("dbcon.php");

                                                // Get the current year
                                                $currentYear = date("Y");            
                                                
                                                // Construct the SQL query to retrieve all sales
                                                $select_sql = "SELECT * FROM sales";
                                                
                                                // Execute the SQL query
                                                $select_query = mysqli_query($con, $select_sql);

                                                // Initialize variables for total amount and profit
                                                $total_amount = 0;
                                                $total_profit = 0;
                                                $serialNumber = 1; // Initialize serial number counter

                                                // Check if there are results
                                                if (mysqli_num_rows($select_query) > 0) {
                                                    // Output the sales data
                                                    while ($row = mysqli_fetch_assoc($select_query)) {
                                                        // Calculate total amount
                                                        $total_amount += $row['total_amount'];
                                                        // Calculate total profit
                                                        $total_profit += $row['total_profit'];

                                                        // Output each row of sales data
                                                        echo "<tr>";
                                                        echo "<td>" . $serialNumber++ . "</td>"; // Serial number column
                                                        echo "<td>" . $row['Date'] . "</td>";
                                                        echo "<td>" . $row['medicines'] . "</td>";
                                                        echo "<td>" . $row['quantity'] . "</td>";
                                                        echo "<td>" . $row['total_amount'] . "</td>";
                                                        echo "<td>" . $row['total_profit'] . "</td>";
                                                        echo "<td>" . $row['invoice_number'] . "</td>";
                                                        echo "<td>" . $row['created_by'] . "</td>";
                                                        echo "</tr>";
                                                    }
                                                } else {
                                                    // If there are no sales recorded for the specified period, display a message
                                                    echo '<tr><td colspan="8">No sales done.</td></tr>';
                                                }
                                                ?>
                                            </tbody>
                                            <tfoot>
                                                <tr class="table-success">
                                                    <th colspan="4">Total</th>
                                                    <th><?php echo $total_amount; ?></th>
                                                    <th><?php echo $total_profit; ?></th>
                                                    <th colspan="2"></th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                                <!-- /.card-body -->
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
            <div class="float-right d-none d-sm-inline-block">
                <strong>Designed and Developed by <a href="https://wa.me/message/JYOOWVES6MT7M1"> D_TECH</a>.</strong>
            </div>
            <strong>Copyright &copy; 2023-2024 D_TECH.</strong>
            All rights reserved.
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->
    
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
            $("#dataTables-example").DataTable({
                "responsive": true,
                "autoWidth": false,
                "ordering": false // Disable initial ordering if not needed
            });
        });
    </script>
</body>
</html>
