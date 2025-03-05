<?php
session_start();
include("dbcon.php");

if (!isset($_SESSION['user_session'])) {
    $mtumiaji = $_SESSION['user_session'];
    header("location:../index.php");
}

//****SELECTING FROM stock******
$id = $_GET['id'];
$invoice_number = $_GET['invoice_number'];

$select_sql = "SELECT * FROM stock WHERE id = '$id'";
$select_query = mysqli_query($con, $select_sql);

while ($row = mysqli_fetch_array($select_query)):
    $sell_type = $row['sell_type'];
?>
<body>  
    <form method="POST" action="update.php?invoice_number=<?php echo $invoice_number ?>">
        <table id="table" style="width: 400px; margin: auto;">
            <td><input type="hidden" name="id" value="<?php echo $row['id'] ?>"></td>

            <tr id="row">
                <td>Jina la Dawa:</td>
                <td><input type="text" name="med_name" id="med_name" size="10" value="<?php echo $row['medicine_name'] ?>" required></td>
            

                <td>Aina ya Dawa:</td>
                <td><input type="text" name="category" id="category" size="10" value="<?php echo $row['category'] ?>" required></td>
            
                <td>Idadi:</td>
                <td>
                    <input type="number" style="width: 95px;" name="quantity" value="<?php echo $row['quantity'] ?>">
                    <select style="width: 95px; height: 28px; border-color: #000080" name="sell_type">
                        <?php
                        $options = ["pc", "roll", "box", "kg", "bags", "mm", "Kopo","tabs", "Lita", "Sewa", "pkt", "trip", "1/4kg", "ndoo", "m", "nr", "kopo", "gln", "m3", "nr"];
                        foreach ($options as $option) {
                            $selected = ($option == $sell_type) ? 'selected' : '';
                            echo "<option value='$option' $selected>$option</option>";
                        }
                        ?>
                    </select>
                </td>
            </tr> 
            <tr>
                <td>Idadi Iliyouzwa:</td>
                <td><input type="number" name="used_quantity" readonly id="used_quantity" value="<?php echo $row['used_quantity'] ?>"></td>
            
                <td>Idadi iliyobaki:</td>
                <td><input type="number" name="act_remain_quantity" id="act_remain_quantity" value="<?php echo $row['act_remain_quantity'] ?>"></td>
           
                <td>Tarehe ya kuingiza Dawa:</td>
                <td><input type="date" name="reg_date" id="reg_date" size="5" value="<?php echo $row['register_date'] ?>" required></td>
            </tr>
                <td>Tarehe ya ku expire:</td>
                <td><input type="date" name="exp_date" id="exp_date" size="5" value="<?php echo $row['expire_date'] ?>" required></td>
            
                <td>Msambazaji:</td>
                <td><input type="text" name="company" id="company" size="10" value="<?php echo $row['company'] ?>"></td>
            
                <td>Bei halisi:</td>
                <td><input type="number" name="actual_price" id="actual_price" value="<?php echo $row['actual_price'] ?>"></td>
            </tr>
            <tr>
                <td>Bai ya kuuzia:</td>
                <td><input type="number" name="selling_price" id="selling_price" value="<?php echo $row['selling_price'] ?>"></td>
           
                <td>Faida yake</td>
                <td><input type="text" name="profit_price" id="profit_price" value="<?php echo $row['profit_price'] ?>" readonly></td>
           
                <td>Hali:</td>
                <td>
                    <select style="width: 230px; height: 35px; border-color: #000080" name="status">
                        <option disabled><?php echo $row['status'] ?></option>
                        <option value="Available">Available</option>
                        <option value="Not Available">Not Available</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Reason for editing:   </td>
                <td><input type="text" name="edit_reason" id="edit_reason" required></td>
            </tr>
        <?php endwhile; ?>
            <tr>
                <td></td>
                <td><input type="submit" name="update" class="btn btn-success btn-md" style="width: 225px" value="Hifadhi Mabadiliko"></td>
            </tr>
        </table>
        <br>
    </form><br>
</body>

<script type="text/javascript">
    $(document).ready(function () {
        //***AUTO CALCULATION****
        $(document).on('keyup', '#med_name', function () {
            var med_name_cap = $("#med_name").val();
            $("#med_name").val(med_name_cap.charAt(0).toUpperCase() + med_name_cap.slice(1));
        });

        $(document).on('keyup', '#category', function () {
            var category_cap = $("#category").val();
            $("#category").val(category_cap.charAt(0).toUpperCase() + category_cap.slice(1));
        });

        $(document).on('keyup', '#actual_price', function () {
            var act_price = $("#actual_price").val();
            var sell_price = $("#selling_price").val();
            var pro_price = parseInt(sell_price) - parseInt(act_price);
            var percentage = Math.round((parseInt(pro_price) / parseInt(act_price) * 100);
            var output = pro_price.toString().concat("(") + percentage.toString().concat("%)");
            $("#profit_price").val(output);
        });

        $(document).on('keyup', '#selling_price', function () {
            var act_price = $("#actual_price").val();
            var sell_price = $("#selling_price").val();
            var pro_price = parseInt(sell_price) - parseInt(act_price);
            var percentage = Math.round((parseInt(pro_price) / parseInt(act_price) * 100);
            var output = pro_price.toString().concat("(") + percentage.toString().concat("%)");
            $("#profit_price").val(output);
        });
    });
</script>
</html>