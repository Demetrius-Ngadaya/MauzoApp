<?php
session_start();
if (!isset($_SESSION['user_session'])) {
    header("location:index.php");
}
?>
<html>
<head>
    <title>MauzApp</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            // Handle "Hifadhi Mauzo" button click
            $("#saveSales").click(function(e) {
                e.preventDefault(); // Prevent form submission
                $.ajax({
                    type: "POST",
                    url: "save_sales.php",
                    data: $("form").serialize(),
                    success: function(response) {
                        alert("Mauzo yamehifadhiwa kikamilifu!");
                        window.location.reload(); // Reload the page
                    },
                    error: function(xhr, status, error) {
                        alert("Hitilafu: " + error);
                    }
                });
            });

            // Handle "Print Risiti" button click
            $("#printReceipt").click(function(e) {
                e.preventDefault(); // Prevent form submission
                $.ajax({
                    type: "POST",
                    url: "save_sales.php",
                    data: $("form").serialize(),
                    success: function(response) {
                        window.open("preview.php?invoice_number=<?php echo $_GET['invoice_number']?>", "_blank"); // Open receipt in new tab
                    },
                    error: function(xhr, status, error) {
                        alert("Hitilafu: " + error);
                    }
                });
            });

            // Handle "Close" button click
            $("#closeForm").click(function() {
                window.close(); // Close the pop-up form
            });
        });
    </script>
</head>
<body>
<div class="checkout">
    <form method="post" action="preview.php?invoice_number=<?php echo $_GET['invoice_number']?>">
        <center>
            <h3>Majina ya mteja</h3>
            <input type="hidden" name="medicine_name" value="<?php echo $_GET['medicine_name']?>">
            <input type="hidden" name="category" value="<?php echo $_GET['category']?>">
            <input type="hidden" name="quantity" value="<?php echo $_GET['quantity']?>">
            <input type="hidden" name="grand_total" value="<?php echo $_GET['total']?>">
            <input type="hidden" name="grand_profit" value="<?php echo $_GET['profit']?>">
            <input type="hidden" name="date" value="<?php echo date("Y/m/d");?>">
            <input type="text" name="paid_amount" placeholder="Jina la mteja" style="width: 300px; height:30px; margin-bottom: 15px;" required/><br>
            <button id="saveSales" class="btn btn-success">Hifadhi Mauzo</button>
            <button id="printReceipt" class="btn btn-primary">Print Risiti</button>
            <button id="closeForm" class="btn btn-danger">Funga</button>
        </center>
    </form>
</div>
</body>
</html>