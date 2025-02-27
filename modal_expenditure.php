<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
           <div class="modal-header">                                          
                <div class=""><strong><center>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                     &nbsp;&nbsp;Andika tumizi ulilofanya Dukani &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                     &nbsp;&nbsp;&nbsp;</center></strong></div>
                 </div>
                 <div class="modal-body">
                    <form  method="post" enctype="multipart/form-data">                                
                         <hr> 								
					   <div class="control-group">
                            <label class="control-label" for="inputEmail"> Jina la Tumizi:</label>
                            <input type="text" name="expenditure_name"  placeholder="mfn: umeme" class = "form-control" required>                                          
                       </div>                                 
				       <div class="control-group">
                            <label class="control-label" for="inputEmail"> Kiasi cha pesa :</label>
                            <input type="number" name="expenditure_amount"  placeholder="mfn: 5000" class = "form-control" required>                                          
                        </div>                                 
						<div class="control-group">
                            <label class="control-label" for="inputEmail"> Maelezo kuhusu tumizi:</label>
                            <input type="text" name="expenditure_description"  placeholder="mfn: malipo ya umeme" class = "form-control" required>                                          
                        </div>                               
					    <div class = "modal-footer">
							 <button name = "go" class="btn btn-primary">Hifadhi</button>
							 <button type="button" class="btn btn-default" data-dismiss="modal">Kata</button>                                        
                         </div>	
                     </form>  						
				  </div>                               
                </div>						
                <?php 
include ('dbcon.php');

if (isset($_POST['go'])) {
    $expenditure_name = $_POST['expenditure_name'];
    $expenditure_amount = $_POST['expenditure_amount'];
    $expenditure_description = $_POST['expenditure_description'];
    $created_at = date('Y-m-d H:i:s'); // Correct format: YYYY-MM-DD HH:MM:SS

    $query = "INSERT INTO expenditure (expenditure_name, expenditure_amount, expenditure_description, created_at) 
              VALUES ('$expenditure_name', '$expenditure_amount', '$expenditure_description', '$created_at')";

    if (mysqli_query($con, $query)) {
        echo "Expenditure added successfully!";
    } else {
        echo "Error: " . mysqli_error($con);
    }
}
?>

         </div>
    </div>
</div>

