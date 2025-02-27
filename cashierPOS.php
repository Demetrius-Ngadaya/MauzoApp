<?php
session_start();

// Check if the user is already logged in
if(!isset($_SESSION['user_session'])) {
    header("Location: index.php"); // Redirect to the login page if not logged in
    exit();
}

// Initialize the last_activity session variable if not already set
if(!isset($_SESSION['last_activity'])) {
    $_SESSION['last_activity'] = time();
}

// Check if the user's last activity time is older than one minute
if(time() - $_SESSION['last_activity'] > 360000) {
    // Destroy the session
    session_unset();
    session_destroy();
    header("Location: index.php"); // Redirect to the login page
    exit();
}

// Update the user's last activity time
$_SESSION['last_activity'] = time();


?>

<!DOCTYPE html>
<html> 
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>MauzoApp</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Ionicons -->
 
  <!-- Font Awesome -->
  <link rel="stylesheet" href="./plugins/fontawesome-free/css/all.min.css">
      <!-- THE LINK BELOW FOR UPDATE QUANTITY CYSING -->
      <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
  <!-- THE BELOW LINKS FOR MODAL TO FUNCTION -->
  <link rel="stylesheet" type="text/css" href="src/facebox.css">
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

<script type="text/javascript">





//GET Medicine Name And Expire Date from auto.php

$(document).ready(function(){
    $("#qty").focus(function(){
        var medicine_name = $("#product_hidden").val();
        var expire_date = $("#date_hidden").val();

        $.ajax({
            type: 'POST',
            url: 'auto.php',
            dataType: "json",
            data: {medicine_name: medicine_name, expire_date: expire_date},
            success: function(data){
                $("#avai_qty").val(data.available_quantity); // Set available quantity
                $("#selling_price").val(data.selling_price); // Assuming you have an input for the actual price
              },

            });
    });
//GET Medicine Name And Expire Date

         //Disabled Button If Quantity Not Available

         $(document).ready(function(){
    $("#qty, #discount").blur(function(){
        var avai_qty = $("#avai_qty").val();
        var in_qty = parseInt($("#qty").val());
        var avai_qty_int = parseInt($("#avai_qty").val());
        var discount = parseFloat($("#discount").val());
        if(avai_qty == "" || in_qty > avai_qty_int || in_qty <= 0){
            $("#btn_submit").attr('disabled','disabled');
            alert("Hujachagua Dawa au umeandika idadi ya kuuza kubwa kuzidi idadi iliyopo!!");
        } else {
            $("#btn_submit").removeAttr('disabled');
        }
    });
});


         //Disabled Button If Quantity Not Available
});
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
      <a href="logout.php" class="nav-link">
                &nbsp;&nbsp;&nbsp;<i class="fa fa-power-off"></i>
                  &nbsp;&nbsp;Logout
                </a>
      </li>
    </ul>
  </nav>
  
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
  <a href="cashierPOS.php?invoice_number=<?php echo $_GET['invoice_number']?>" class="brand-link">  
      <H1><span class="brand-text font-weight-light"> MauzoApp</span></H1>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar Menu -->
      
      <?php include('cashierSideBar.php') ?>

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
          <button class="btn btn-primary btn-lg">
    <a href="cashierPOS.php?invoice_number=<?php echo $_GET['invoice_number']?>" style="color: white; text-decoration: none;">Reflesh</a>
</button>
          				
          </div>
          <div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">User</a></li>
        <li class="breadcrumb-item active">
            <?php
            // Check if the user is logged in and fetch username and role
            if (isset($_SESSION['user_session'])) {
                $username = $_SESSION['user_session'];
                $role = ''; // Fetch role from your session data where it's set
                // You should have $role fetched from your session data
                if ($role === 'admin') {
                    echo 'Msimamizi: ' . $username; // Customize as needed
                } elseif ($role === 'cashier') {
                    echo 'Mnunuzi: ' . $username; // Customize as needed
                } else {
                    echo $username; // Default display if role-specific not needed
                }
            } else {
                echo 'Maelezo';
            }
            ?>
        </li>
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
              <div class="card-header">
                <center>
                <div class="col-md-12">
    <form method="POST" action="insert_invoiceCashier.php?invoice_number=<?php echo $_GET['invoice_number']?> " style="display: flex; flex-wrap: wrap; gap: 10px;">
        <!-- First div for 'Jina la Dawa' -->
        <div class="form-group">
            <input type="text" id="product" required autocomplete="off" placeholder="Medicine name" class="form-control" style="width: 300px; height: 30px;">
            <input type="hidden" name="product" id="product_hidden" required class="form-control" autocomplete="off" placeholder="Jina la Dawa" style="width: 400px; height: 30px;">
            <input type="hidden" name="expire_date" id="date_hidden" required class="form-control" autocomplete="off" placeholder="Medicine" style="width: 400px; height: 30px;">
        </div>
        <!-- Second div for 'Idadi iliyopo' -->
        <div class="form-group">
            <input type="number" name="avai_qty" id="avai_qty" readonly placeholder="Available quantity" class="form-control" style="width: 140px; height: 30px;">
        </div>
        <div class="form-group">
        <input type="text" id="selling_price" name="selling_price" readonly placeholder="Price" class="form-control" style="width: 140px; height: 30px;">

        </div>
        <!-- Third div for 'Idadi unayotaka kuuza' -->
        <div class="form-group">
            <input type="number" name="qty" id="qty" placeholder="Quantity" autocomplete="off" class="form-control" style="width: 160px; height: 30px;" required>
        </div>

        <!-- Fourth div for 'Punguzo' -->
        <div class="form-group">
            <input type="number" name="discount" id="discount" placeholder="Discount" class="form-control" style="width: 180px; height: 30px;" required>
        </div>
        <div class="form-group">
        <select  name="payment_method" required> 
          <option value="Cash">choose payment method</option>
          <option value="Cash">Cash</option>
                  <option value="lipa namba">Lipa namba</option>
                  <option value="Deni alibandika">Deni alipandika</option>
                  <option value="bank">Bank</option>
                  <option value="Deni tahasisi">Deni tahasisi</option>
                  <option value="Mtandao wa sim">Mtandao wa sim</option>

                 </select>   
                 <!-- <input  name="hali_ya_malipo" id="hali_ya_malipo" value="paid"  style="width: 0px; height: 0px;" required> -->

        </div>
        <!-- Fifth div for button 'Hifadhi' -->
        <div class="form-group">
            <input type="hidden" name="date" value="<?php echo date("m/d/Y");?>">
            <button type="submit" name="submit" class="btn btn-success" id="btn_submit" style="width: 130px; height: 40px; margin-top: -8px;">
                <i class="icon icon-plus-sign"></i> add
            </button>
        </div>
    </form>
</div>


      </center>
     </div>  

  </div>

  
  <div class="container table-responsive" >
    <div class="row">
      <table class="table table-bordered table-striped table-hover" id="resultTable" data-responsive="table">
  
      <thead>
          <tr>
           <!-- <tr style="background-color: #383838; color: #FFFFFF;" > -->
            <th> Medicine name </th>
            <th> Medicine type</th>
            <!-- <th style="background: #c53f3f;"> Tarehe ya mwisho wa matumizi</th> -->
           
            <th> Medicine price</th>
            <th>Discount price </th>
            <th> Quantity </th>
            <th> sub total </th>
            <th>Payment method </th>
            <th> Action </th>
          </tr>
        </thead>
      
      
               <tbody>
                <?php
            $invoice_number= $_GET['invoice_number'];
            $medicine_name = "";
            $category= "";
            $quantity= "";
      
                include("dbcon.php");
      
                $select_sql = "SELECT * from on_hold where invoice_number = '$invoice_number' ";
      
                $select_query = mysqli_query($con ,$select_sql);
      
                   $i = 0;
                    
                  while($row = mysqli_fetch_array($select_query)):
      
                    $i++;
                ?>
                  <tr class="record">
                     <td><?php
      
      
                       $med_id = $row['id'];
                       $medicine_name=$row['medicine_name'];
                       echo $medicine_name;
                       echo "<input type='hidden' value=$med_id id='med_id$i' name='med_id'>";
                       echo "<input type='hidden' value=$medicine_name id='med_name$i' name='med_name'>"
                      ?></td>
                     <td><?php $category = $row['category'];
                     echo $category;
                      ?>
                         <input type="hidden" value='<?php echo $category?>' id='med_cat<?php echo $i?>' name='med_cat'>
                        
                      </td>
                     <td><?php echo  $row['cost']; ?></td>
                     <td><?php echo $row['discount']; ?></td>
                     <td>
                     <?php
      
                        $quantity =  $row['qty'];
                        $type     =  $row['type'];
                        echo "<input type='hidden' id='hid_quantity$i' value='$quantity' name='hid_quantity'>";
                        echo "<input type='number' id='quantity$i' name='quantity' value='$quantity' min='1' max='10' style='width:50px'>"."&nbsp;(".$type.")&nbsp;&nbsp;&nbsp;&nbsp;";
                        echo "<a href='#' class='qty_upd$i'><span class='icon-refresh'></span></a>";
                        echo "<div class='ajax-loader$i' style='visibility:hidden'>
      
                             <img src='src/img/loading.gif'>
      
                             </div>
                           ";
                                     ?>
                     </td>
                     
                     <td><?php echo $row['amount']; ?></td>
                     <td><?php echo $row['payment_method']; ?></td>

           <td><a href="delete_invoice.php?invoice_number=<?php echo $_GET['invoice_number']?>&id=<?php echo $row['id'];?>&name=<?php echo $row['medicine_name']?>&expire_date=<?php echo $row['expire_date']?>&quantity=<?php echo $row['qty'];?>" class="btn btn-danger">Remove</a></td>
      
                  <?php endwhile; ?>  
                </tr>
                <tr>
              <th colspan="5" ><font size=5><strong>Total:</strong></font></th>
              <td  colspan="3"><strong>
      
                <?php
      
                $select_sql = "SELECT sum(amount) , sum(profit_amount) from on_hold where invoice_number = '$invoice_number'";
      
                $select_query= mysqli_query($con,$select_sql);
      
                while($row = mysqli_fetch_array($select_query)){
      
                  $grand_total = $row['sum(amount)'];
                  $grand_profit =$row['sum(profit_amount)'];
                  echo $grand_total.' Tsh';
                }
                ?>
              </td>
            </tr>
        </tbody>
      </table><br> 
      <br>
      
          <?php
           if($medicine_name && $category && $quantity !=null){
            ?>
      
            <a id="popup" href="checkoutCashier.php?invoice_number=<?php echo $_GET['invoice_number']?>&medicine_name=<?php echo $medicine_name?>&category=<?php echo $category?>&ex_date=<?php echo $ex_date?>&quantity=<?php echo $quantity?>&total=<?php echo $grand_total?>&profit=<?php echo $grand_profit?>" style="width:300px;" class="btn btn-info btn-large">Enter customer name</i></a>
      
          <?php
           }else{
      
      
            ?>
      
      <!-- <div class="alert alert-danger">
        <h3><center>Bado hakuna mauzo ya kufanya!!</center> </h3>
    </div> -->
      
          <?php
       
                }
      
          ?>
    </div>
      </div>
 
  </body>
 </html>
<script type="text/javascript">


  $(document).ready(function(){

     $("#product").focus(

            function(){

              var product = $("#product").val();

            $.ajax({
              type:'POST',
              url :'bar_code.php',
              dataType:"json",
              data:{product:bar_code},
              success:function(data){

                $("#product").val(data);
              },

            });
    });

      //****AUTO COMPLETE*****
    $("#product").typeahead({

               source: function(drug_result, result){

            $.ajax({

          url : 'autocomplete.php',
          method :'POST',
          data :{drug_result:drug_result},
          dataType:"json",

          success:function(data){

            result($.map(data,function(item){



              return item;

            }));
          },

        });
      },

    });

      //****AUTO COMPLETE*****



     //****Medicine name and Date*****
     $("#product").focusout(function(){
         
               var value = $("#product").val();

               var res= value.split(",");

               var name = res[0];

               var date = res[1];

            $("#product_hidden").val(name);
          $("#date_hidden").val(date);

    });
    //****Medicine name and Date*****

    //*******Qty Update*******
  for(var i=1;i<=100;i++){

  $("a.qty_upd"+i).click(function(){

        for(var i1=1;i1<=100;i1++){

                var med_id=$("#med_id"+i1).val();
                var med_name=$("#med_name"+i1).val();
                var med_cat=$("#med_cat"+i1).val();
                var ex_date=$("#ex_date"+i1).val();
                var hid_qty = $("#hid_quantity"+i1).val();
                var qty=$("#quantity"+i1).val();

                if(qty <= 0){

                  alert("Sorry Error");

                }else{

             $.ajax({
              type:'POST',
               beforeSend:function(){
                 $('.ajax-loader'+i1).css("visibility", "visible");
              },
              url :'quantity_upd.php',
              data:{med_id:med_id,med_name:med_name,med_cat:med_cat,ex_date:ex_date,hid_qty:hid_qty,qty:qty},

              success:function(){

                location.reload();

              },

            });

           }

         }
  });

}
     //*******Qty Update*******

  });
</script>
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


