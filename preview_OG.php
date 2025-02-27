<?php
 
    session_start();

    if(!isset($_SESSION['user_session'])){

        header("location:../index.php");
    }
    
//  a session variable named 'username' that stores the username of the logged-in user
$created_by = $_SESSION['user_session'];
?>
<?php include('indexHeader.php') ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>MauzApp</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
   <!-- Font Awesome -->
     <!-- THE LINK BELOW FOR UPDATE QUANTITY CYSING -->
     <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">

  <!-- THE BELOW LINKS FOR MODAL TO FUNCTION -->
  <link rel="stylesheet" type="text/css" href="src/facebox.css">
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
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">


      
    <script src="js/jquery-1.7.2.min.js"></script>
    <script src="js/jquery_ui.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <script type="text/javascript" src="src/facebox.js"></script>
    <script type="text/javascript">

      function Clickheretoprint()
{ 
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
   
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
      </div><!-- /.container-fluid -->
    </div>
  

    </aside>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">

                       
              <div class="alert alert-danger">
        <h4><center>Hakikisha taharifa za mauzo,ukishahifadhi hautoweza kubadilisha tena  !!</center> </h4>
        <?php
if(isset($_SESSION['message']) && isset($_SESSION['message_type'])){
    $message = $_SESSION['message'];
    $message_type = $_SESSION['message_type'];
    echo "<script>
            Swal.fire({
              title: '$message_type',
              text: '$message',
              icon: '$message_type',
              showConfirmButton: false,
              timer: 1500
            });
          </script>";
    unset($_SESSION['message']);
    unset($_SESSION['message_type']);
}
?>

    </div>
	<?php 
  
  $invoice_number = $_GET['invoice_number'];
  $date           = $_POST['date'];
  $paid_amount   = $_POST['paid_amount'];
	?>

  <form method="POST" action="save_invoice.php">
  	<table class="table table-bordered table-hover" border="1" cellpadding="4" cellspacing="0" style="font-family: arial; font-size: 12px;text-align:left;" width="100%">
     
		<thead>
			<tr>
				<th> Jina la Dawa </th>
				<th> Aina ya Dawa</th>
				<th> Idadi ya Dawa</th>
				<th> Bei ya Dawa</th>
				<th> Kiasi cha pesa </th>
			</tr>
		</thead>
    <tbody>
      <?php

         include("dbcon.php");

         $select_sql = "SELECT * FROM on_hold where invoice_number = '$invoice_number'";

         $select_query =mysqli_query($con,$select_sql);

          while($row =mysqli_fetch_array($select_query)):
      ?>
        <tr class="record">
        <td><h4><?php echo $row['medicine_name'];?></h4>
          <input type="hidden" name="medicine_name[]" value="<?php echo $row['medicine_name']?>"></td>
          <input type="hidden" name="ex_date" value="<?php echo $row['expire_date']?>">
          <input type="hidden" name="ex_date" value="<?php echo $row['category']?>">
          <input type="hidden" name="created_by" value="<?php echo $created_by; ?>">
        <td><h5><?php echo $row['category']; ?></h5></td>
        <td><h5><?php echo $row['qty']." (".$row['type'].")"; ?></h5>
          <input type="hidden" name="qty[]" value="<?php echo $row['qty']."(".$row['type'].")"; ?>">
        </td>
        <td>
        <?php
        echo "<h5>".$row['cost']."<h5>";
        ?>
        </td>
        <td>
        <?php
         echo "<h5>".$row['amount']."<h5>";
        ?>
        </td>
        </tr>
      <?php endwhile;?>
  
        <tr>
          <td colspan="4" style=" text-align:right;"><strong style="font-size: 12px;">Jumla kiasi cha Pesa: &nbsp;</strong></td>
          <td colspan="2"><strong style="font-size: 12px;">
          <?php

          $select_sql = "SELECT sum(amount) from on_hold where invoice_number = '$invoice_number'";

          $select_sql = mysqli_query($con,$select_sql);

          while($row = mysqli_fetch_array($select_sql)){

            $amount =  $row['sum(amount)'];

            echo '<h5>'.$amount.'</h5>';

          }
          
          ?>
          </strong></td>
        </tr>

         <tr>
          <td colspan="4" style=" text-align:right;"><strong style="font-size: 12px;">Kiasi kilicholipwa: &nbsp;</strong></td>
          <td colspan="2"><strong style="font-size: 12px;">
          <?php

          echo '<h3>'.'Tsh '.$paid_amount.'</h3>';


          ?>
          </strong></td>
        </tr>
       
         <tr>
          <td colspan="4" style=" text-align:right;"><strong style="font-size: 18px;">&nbsp;&nbsp;Kiasi cha pesa cha kurudishiwa: &nbsp;</strong></td>
          <td colspan="2"><strong style="font-size: 12px;">
          <?php

          echo '<h3>'.'Tsh '.($paid_amount - $amount).'</h3>';
          
          ?>
          </strong></td>
        </tr>
        <tr>
          <td colspan="5" style=" text-align:center;">Muuzaji ni:        
          <?php

          echo ($created_by);
          
          ?>
          </td>
        </tr>
    </tbody>
  </table><br/>
  
  </div>

  <input type="hidden" name="paid_amount" value="<?php echo $paid_amount?>">
  <input type="hidden" name="invoice_number" value="<?php echo $invoice_number?>">
  <input type="hidden" name="date" value="<?php echo $date?>">
  <input type="submit" name="submit" class="btn btn-success" value="Hifadhi mauzo" >
 <a href="javascript:Clickheretoprint()" class="btn btn-danger btn-md" style="float: right;"><i class="icon icon-print"></i> Print risit</a>
  
  </form>
  <a href="home.php?invoice_number=<?php echo $_GET['invoice_number']?>"><button class="btn btn-danger"><i class="icon-arrow-left"></i> Rudi nyuma</button></a>
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
</div>
<!-- ./wrapper -->
<script src="./plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->

<!-- THE SCRIPT BELOW MAKES Sidebar MENU TO BE NAVIGETABLE -->
<script src="./dist/js/adminlte.min.js"></script>
</body>
</html>






  </body>
  </html>