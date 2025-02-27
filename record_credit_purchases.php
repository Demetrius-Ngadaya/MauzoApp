
<?php
 
    session_start();

    if(!isset($_SESSION['user_session'])){

        header("location:../index.php");
    }
    
//  a session variable named 'username' that stores the username of the logged-in user
$mtumiaji = $_SESSION['user_session'];
?>
<!DOCTYPE html>  
<html>
<head>
  <meta charset="utf-8">
  <title>MauzApp</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- THE BELOW LINKS FOR MODAL TO FUNCTION -->
  <link rel="stylesheet" type="text/css" href="src/facebox.css">
       <!-- THE LINK BELOW FOR UPDATE QUANTITY CYSING -->
       <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
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



  


  <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="../css/bootstrap-responsive.css">
  <link rel="stylesheet" type="text/css" href="../css/style.css">
    <script type="text/javascript" src="../js/jquery-1.7.2.min.js"></script>
    <script type="text/javascript" src="../js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../src/facebox.js"></script>

    <script src="js/jquery-1.7.2.min.js"></script>
    <script src="js/jquery_ui.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <script type="text/javascript" src="src/facebox.js"></script>

    <script type="text/javascript">
       jQuery(document).ready(function($) {//*****POP_UP FORMS*********
    $("a[id*=popup").facebox({
      loadingImage : './src/loading.gif',
      closeImage   : './src/closelabel.png'
    })
  })//*****POP_UP FORMS*********

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
      <a href="logout.php" class="nav-link">
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


  <!-- Edit Product Modal -->
<div class="modal fade" id="editProductModal" tabindex="-1" role="dialog" aria-labelledby="editProductModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editProductModalLabel">Edit Product</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- Form for editing product will be loaded here -->
        <div id="editProductFormContainer"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="saveChanges">Save changes</button>
      </div>
    </div>
  </div>
</div>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid"> 
        <div class="row mb-2">
          <div class="col-sm-6">	
            <p>List of available medicines,add,delete and update medicines</p>
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
<script type="text/javascript">
    // Hide the message after 5 seconds (5000 milliseconds)
    setTimeout(function() {
        var messageDiv = document.getElementById('message');
        if (messageDiv) {
            messageDiv.style.display = 'none';
        }
    }, 5000);
</script>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <!-- <li class="breadcrumb-item"><a href="#">Mtumiaji</a></li> -->
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
              <!-- /.card-header -->             
              <div class="card-body">
    <div class="card-header">
                <h3 class="card-title"><div class="row">    
     <a href="create_product.php?invoice_number=<?php echo $_GET['invoice_number']?>" id="popup"><button class="btn btn-success btn-md" name="submit"><span class="icon-plus-sign icon-large"></span> Create new product</button></a>
    
<!-- Add the import button -->
<!-- <button class="btn btn-primary" id="importButton">Import Products from Excel</button> -->

<!-- Add a hidden file input for selecting the Excel file -->
<input type="file" id="excelFileInput" style="display: none;">
</div>
              </div>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">

     <div class="container"><!---****SEARCHES_CONTENT*****--->
      <div class="row">  
            
            <input type="text" size="20" id="med_quantity" onkeyup="quanti()" placeholder="By product name" title="andika jina la Dawa"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="text" size="20" id="med_status" onkeyup="stat_search()" placeholder="By profit" title="Andika kiasi cha faida">
          
      </div>
    </div><!---****SEARCHES_CONTENT*****--->
    <!-- <div class="container" style="overflow-x:auto; overflow-y: auto;"> -->
      <div class="container">
      <!---***CONTENT****----->
    <div class="row">
      <div class="col-12">
        <form method="POST">
          <!-- <div style="overflow-x:auto; overflow-y: auto; height: auto;"> -->
            <div style="height: auto;">
          <table id="table0" class="table table-bordered table-striped table-hover table-responsive">
          <thead>
             <tr style="background-color: #383838; color: #FFFFFF;" >
             <th width="3%">S/N</th>
             <th width="3%">Medicine</th>
             <th width="1%">Medicine category</th>
             <th width="1%">Supplier</th>
             <th width="5%">Registered quantity</th>
             <th width="1%">Sold quantity</th>
             <th  width="1%">Remain quantity</th>
             <th width="1%">Registered date</th>
             <th style="background-color: #383838;" width="1%">Expired date</th>
             <th width="2%">Buying price</th>
             <th width="2%">Selling price</th>
             <th width="2%">Profit</th>
             <th width = "3%">Status</th>
             <th width = "5">update</th>
             <th width = "5">Delete</th>
             </tr>
           </thead>
           <tbody>
    <?php include("dbcon.php"); ?>
   <?php  
    // Modify your SQL query to retrieve records with LIMIT and OFFSET
$sql = "SELECT id, bar_code, medicine_name, category, quantity, used_quantity, remain_quantity, act_remain_quantity, register_date, expire_date, company, sell_type, actual_price, selling_price, profit_price, status FROM stock ORDER BY id ";
  $result = mysqli_query($con, $sql); ?>
    <!-- Use a while loop to make a table row for every DB row -->
    <?php
// Initialize a counter variable
$serialNumber = 1;

// Use a while loop to fetch and display data from the database
while ($row = mysqli_fetch_array($result)) :
?>
    <tr style="">
        <!-- Display the serial number in a table cell -->
        <td><?php echo $serialNumber; ?></td>
        <!-- Each table column is echoed into a td cell -->
        <td><?php echo $row['medicine_name']; ?></td>
        <td><?php echo $row['category']; ?></td>
        <td><?php echo $row['company']; ?></td>
        <td><?php echo $row['quantity']."&nbsp;&nbsp;(<strong><i>".$row['sell_type']."</i></strong>)"; ?></td>
        <td><?php echo $row['used_quantity']; ?></td>
        <td><?php echo $row['act_remain_quantity']; ?></td>
        <td><?php echo date("d-m-Y", strtotime($row['register_date'])); ?></td>
        <td><?php echo date("d-m-Y", strtotime($row['expire_date'])); ?></td>
        <td><?php echo $row['actual_price']; ?></td>
        <td><?php echo $row['selling_price']; ?></td>
        <td><?php echo $row['profit_price']; ?></td>
        <td>
            <?php
            $status = $row['status'];
            if ($status == 'Available') {
                echo '<span class="label label-success">'.$status.'</span>';
            } else {
                echo '<span class="label label-danger">'.$status.'</span>';
            }
            ?>
        </td>
        <td>

                
                <td>
    <button class="btn btn-info edit-product" data-id="<?php echo $row['id']; ?>&invoice_number=<?php echo $_GET['invoice_number']?>" data-toggle="modal" data-target="#editProductModal">
        <span class="icon-edit"></span>
    </button>
</td>
            </a>
            
        </td>
        <td>
            <button class="btn btn-danger delete" id="<?php echo $row['id']?>"><span class="icon-trash"></span></button>
        </td>
    </tr>
<?php
// Increment the serial number counter
$serialNumber++;
endwhile;
?>

</tbody>

           </table>  
         </div>
      </form> 
      </div>
    </div>
    </div>
    <script>
<script>
$(document).ready(function() {
    // Handle modal close event
    $('#editProductModal').on('hidden.bs.modal', function () {
        // Remove the modal backdrop
        $('.modal-backdrop').remove();
    });

    // Handle click event of the edit button
    $('.edit-product').on('click', function() {
        var productId = $(this).data('id');
        var invoiceNumber = "<?php echo $_GET['invoice_number']; ?>";

        // Load the edit form into the modal
        $('#editProductFormContainer').load('credit_purchases_view.php?id=' + productId + '&invoice_number=' + invoiceNumber, function() {
            // Optionally, you can add additional initialization code here
        });
    });

    // Save changes button click event
    $('#saveChanges').on('click', function() {
        // Submit the form inside the modal
        $('#editProductFormContainer form').submit();
    });
});
</script>
</script>
<script type="text/javascript">
function med_name1() {//***Search For Medicine *****
  var input, filter, table, tr, td, i;
  input = document.getElementById("name_med1");
  filter = input.value.toUpperCase();
  table = document.getElementById("table0");
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


function quanti() {//***Search For quantity *****
  var input, filter, table, tr, td, i;
  input = document.getElementById("med_quantity");
  filter = input.value.toUpperCase();
  table = document.getElementById("table0");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}

function exp_date() {//***Search For expireDate *****
  var input, filter, table, tr, td, i;
  input = document.getElementById("med_exp_date");
  filter = input.value.toUpperCase();
  table = document.getElementById("table0");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[6];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}


function stat_search() {//***Search For Status*****
  var input, filter, table, tr, td, i;
  input = document.getElementById("med_status");
  filter = input.value.toUpperCase();
  table = document.getElementById("table0");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[11];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}

$(".delete").click(function(){//***Showing Alert When Deleting*****

  var element = $(this);

  var del_id = element.attr("id");

  var info = 'id='+del_id;

  if(confirm("Je una uhakika unataka kuifuta Dawa hii?? Haitoweza kurudi tena")){

    $.ajax({

      type :"GET",
      url  :'delete.php',
      data :info,
      success:function(){
        location.reload(true);
      },
      error:function(){
        alert("error");
      }

    });
    
  }
  return false;

});//***Showing Alert When Deleting********



</script>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      </div>
      <!-- /.container-fluid -->
    </section>
</div>
<script src="./plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->

<!-- THE SCRIPT BELOW MAKES Sidebar MENU TO BE NAVIGETABLE -->
<script src="./dist/js/adminlte.min.js"></script>
<script>
    // Handle click event of the import button
    $('#importButton').click(function() {
        // Trigger click event of the hidden file input
        $('#excelFileInput').click();
    });

    // Handle change event of the file input
    $('#excelFileInput').change(function() {
        var file = this.files[0];
        
        // Perform file upload and import logic here
        // You can use AJAX to upload the file to the server
        // and then process it on the server-side
        uploadExcelFile(file);
    });

    // Function to upload the Excel file to the server
    function uploadExcelFile(file) {
        var formData = new FormData();
        formData.append('excelFile', file);
        
        $.ajax({
            url: 'import_xls.php', // Replace 'import.php' with the server-side script URL
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                // Handle success response
                alert('Faili limeingia kikamilifu!');
            },
            error: function(xhr, status, error) {
                // Handle error response
                console.error(xhr.responseText);
                alert('Tafadhari rudia tena faili lako halijaingia!!.');
            }
        });
    }
</script>
 
</div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>

    
    <!-- kuanzia hapa ni for navigation -->
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2023-2024 D_TECH.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
    <strong>Designed and Developed by <a href="#"> D_TECH</a>.</strong>
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
