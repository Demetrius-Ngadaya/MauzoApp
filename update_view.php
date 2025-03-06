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
    $old_quantity = $row['act_remain_quantity'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Stock</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .form-container {
            max-width: 1200px; /* Increased width to accommodate three columns */
            margin: 20px auto;
            padding: 20px;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .form-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr); /* Three columns */
            gap: 15px; /* Space between columns */
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        .form-group input,
        .form-group select {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .form-group input[type="submit"] {
            background-color: #28a745;
            color: white;
            border: none;
            cursor: pointer;
            padding: 10px;
            font-size: 16px;
            grid-column: span 3; /* Make the submit button span all three columns */
        }
        .form-group input[type="submit"]:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <form method="POST" action="update.php?invoice_number=<?php echo $invoice_number ?>">
            <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
            <input type="hidden" name="old_quantity" value="<?php echo $old_quantity; ?>">

            <div class="form-grid">
                <!-- Column 1 -->
                <div class="form-group">
                    <label for="med_name">Jina la Dawa:</label>
                    <input type="text" name="med_name" id="med_name" value="<?php echo $row['medicine_name'] ?>" required>
                </div>

                <div class="form-group">
                    <label for="category">Aina ya Dawa:</label>
                    <input type="text" name="category" id="category" value="<?php echo $row['category'] ?>" required>
                </div>

                <div class="form-group">
                    <label for="quantity">Idadi:</label>
                    <input type="number" name="quantity" id="quantity" value="<?php echo $row['quantity'] ?>">
                </div>

                <!-- Column 2 -->
                <div class="form-group">
                    <label for="sell_type">Aina ya Kuuza:</label>
                    <select name="sell_type" id="sell_type">
                        <?php
                        $options = ["pc", "roll", "box", "kg", "bags", "mm", "Kopo","tabs", "Lita", "Sewa", "pkt", "trip", "1/4kg", "ndoo", "m", "nr", "kopo", "gln", "m3", "nr"];
                        foreach ($options as $option) {
                            $selected = ($option == $sell_type) ? 'selected' : '';
                            echo "<option value='$option' $selected>$option</option>";
                        }
                        ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="used_quantity">Idadi Iliyouzwa:</label>
                    <input type="number" name="used_quantity" id="used_quantity" value="<?php echo $row['used_quantity'] ?>" readonly>
                </div>

                <div class="form-group">
                    <label for="act_remain_quantity">Idadi Iliyobaki:</label>
                    <input type="number" name="act_remain_quantity" id="act_remain_quantity" value="<?php echo $row['act_remain_quantity'] ?>">
                </div>

                <!-- Column 3 -->
                <div class="form-group">
                    <label for="reg_date">Tarehe ya Kuingiza Dawa:</label>
                    <input type="date" name="reg_date" id="reg_date" value="<?php echo $row['register_date'] ?>" required>
                </div>

                <div class="form-group">
                    <label for="exp_date">Tarehe ya Ku Expire:</label>
                    <input type="date" name="exp_date" id="exp_date" value="<?php echo $row['expire_date'] ?>" required>
                </div>

                <div class="form-group">
                    <label for="company">Msambazaji:</label>
                    <input type="text" name="company" id="company" value="<?php echo $row['company'] ?>">
                </div>

                <!-- Additional Fields -->
                <div class="form-group">
                    <label for="actual_price">Bei Halisi:</label>
                    <input type="number" name="actual_price" id="actual_price" value="<?php echo $row['actual_price'] ?>">
                </div>

                <div class="form-group">
                    <label for="selling_price">Bei ya Kuuzia:</label>
                    <input type="number" name="selling_price" id="selling_price" value="<?php echo $row['selling_price'] ?>">
                </div>

                <div class="form-group">
                    <label for="profit_price">Faida Yake:</label>
                    <input type="text" name="profit_price" id="profit_price" value="<?php echo $row['profit_price'] ?>" readonly>
                </div>

                <div class="form-group">
                    <label for="status">Hali:</label>
                    <select name="status" id="status">
                        <option disabled><?php echo $row['status'] ?></option>
                        <option value="Available">Available</option>
                        <option value="Not Available">Not Available</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="stock_alert">Stock Alert:</label>
                    <input type="number" name="stock_alert" id="stock_alert" value="<?php echo $row['stock_alert'] ?>">
                </div>

                <div class="form-group">
                    <label for="edit_reason">Sababu ya Kuhariri:</label>
                    <input type="text" name="edit_reason" id="edit_reason" required>
                </div>
            </div>

            <!-- Submit Button -->
            <div class="form-group">
                <input type="submit" name="update" class="btn btn-success btn-md" value="Hifadhi Mabadiliko">
            </div>
        </form>
    </div>
</body>
</html>
<?php endwhile; ?>