<?php
 
    session_start();

    if(!isset($_SESSION['user_session'])){

        header("location:../index.php");
    }
    
//  a session variable named 'username' that stores the username of the logged-in user
$created_by = $_SESSION['user_session'];
?>

<body>
 	 	<form method="POST" action="register.php?invoice_number=<?php echo $_GET['invoice_number']?>">
  	  	  <table id="table" style="width: 400px; margin: auto;overflow-x:auto; overflow-y: auto;">
  	  	 <!-- <tr>
         <td>Bar Code:</td>
         <td><input type="text" name="bar_code" id="bar_code" size="10" placeholder="Set a bar code"></td>
          </tr> -->
          <tr id="row1">
         <td>Medicine name:</td>
         <td><input type="text" name="med_name"  id="med_name" size="10" required ></td>
        </tr>
        <tr>
                   <td>Category:</td>
          <td>
          <select  name="category" required> 
          <option value="">Choose medicine category</option>Antibacterials
                  <option value="Painkiller">Painkiller</option>
                  <option value="Antiviral">Antiviral</option>
                  <option value="Antibiotic">Antibiotic</option>
                  <option value="Analgesics">Analgesics</option>
                  <option value="Vitamins">Vitamins</option>
                  <option value="Sedatives">Sedatives</option>
                  <option value="Tranquilizer">Tranquilizer</option>
                  <option value="Antineoplastics">Antineoplastics</option>
                  <option value="Expectorant">Expectorant</option>

                 </select>
          </td>
        </tr>
        <tr>
                   <td>Supplier:</td>

          <td><input type="text" name="company" id="company" size="10"  required></td>
        </tr>
        <tr>
                   <td>Quantity:</td>  
        <td><input type="number" style="width: 95px;" name="quantity">

             <select style="width: 95px; height: 28px; border-color: #000080" name="sell_type" > 
                 
             <option value="Bot">Bot</option>
    <option value="Tab">Tab</option>
    <option value="Sachet">Sachet</option>
    <option value="Cap">Cap</option> 
    <option value="Amp">Ampoule</option>
    <option value="Inj">Injection</option> 
    <option value="Cream">Cream</option> 
    <option value="Oint">Ointment</option>
    <option value="Susp">Suspension</option>
    <option value="Syr">Syrup</option> 
    <option value="Gels">Gels</option> 
    <option value="Drops">Drops</option> 
                 </select></td>
        
        </tr> 
        <tr>
                   <td>Register date:</td>

          <td><input type="date"  name="reg_date" id="reg_date" size="5"  required>  </td>
        </tr>
        <tr>
                   <td>Expire date</td>

          <td><input type="date" name="exp_date" id="exp_date" size="5"  required></td>
        </tr>
        <tr>
                   <td>Stock alert quantity:</td>

          <td><input type="text" name="stock_alert" id="stock_alert" size="10" required></td>
        </tr>
       
          <tr>
                     <td>Buying price:</td>

          <td><input type="number" name="actual_price" id="actual_price" required></td>
        </tr>
        <tr>
                   <td>Selling quantity:</td>

          <td><input type="number" name="selling_price" id="selling_price" required></td>
        </tr>
        <tr>
                   <td>Profit:</td>

          <td><input type="text" name="profit_price" id="profit_price"></td>
        </tr>
<tr>
                <td>Created by:</td>
                <td><input type="text" name="created_by" value="<?php echo $created_by; ?>" readonly></td>
            </tr>
        <tr>
          <td></td>
          <td> <input type="submit" name="submit" class="btn btn-success btn-large" style="width: 225px" value="Save"> </td>
        </tr>

  	  	 </table> 
        <br>
  	  	 </form><br>
</body>

<script type="text/javascript">
		$(document).ready(function(){

      $(document).on('keyup','#med_name', 

        function(){
             var med_name_cap = $("#med_name").val();
              
              $("#med_name").val(med_name_cap.charAt(0).toUpperCase()+med_name_cap.slice(1));
      
        });


      $(document).on('keyup','#category', 

        function(){
             var category_cap = $("#category").val();
              
              $("#category").val(category_cap.charAt(0).toUpperCase()+category_cap.slice(1));
      
        });


      $(document).on('keyup','#actual_price', 

        function(){
             var act_price = $("#actual_price").val();
      var sell_price = $("#selling_price").val();
      var pro_price = parseInt(sell_price) - parseInt(act_price);
	var percentage = Math.round((parseInt(pro_price)/parseInt(act_price))*100);
	var output = pro_price.toString().concat("(")+percentage.toString().concat("%)");
        $("#profit_price").val(output);
        });

       $(document).on('keyup','#selling_price', 
        function(){
      var act_price = $("#actual_price").val();
      var sell_price = $("#selling_price").val();
      var pro_price = parseInt(sell_price) - parseInt(act_price);
	var percentage = Math.round((parseInt(pro_price)/parseInt(act_price))*100);
	var output = pro_price.toString().concat("(")+percentage.toString().concat("%)");
        $("#profit_price").val(output);
            });
});
  	
  </script>
</html>