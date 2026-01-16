<?php
session_start();
include '../DB/db.php';

if (!isset($_SESSION['username'])) {
    header("Location: ../HTML/login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Manage Product</title>
    <link rel="stylesheet" href="../CSS/feature.css">
</head>
<body>

<div class="content">
    <h2>Manage Product Details</h2>

    <p id="result" style="color:green;"></p>

    <label>Product Type</label><br>
    <input type="text" id="type"><br><br>

    <label>Quantity</label><br>
    <input type="number" id="quantity"><br><br>

    <label>Unit</label><br>
    <input type="text" id="unit"><br><br>

    <label>Price Per Unit</label><br>
    <input type="number" id="price"><br><br>

    <button onclick="saveProduct()">Save Product</button>
</div>

<script>
function saveProduct()
{
    var type = document.getElementById("type").value;
    var quantity = document.getElementById("quantity").value;
    var unit = document.getElementById("unit").value;
    var price = document.getElementById("price").value;

    var xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function ()
    {
        if (this.readyState == 4 && this.status == 200)
        {
            // শুধু success বা error message দেখাবে
            document.getElementById("result").innerHTML = this.responseText;

            // form reset
            document.getElementById("type").value = "";
            document.getElementById("quantity").value = "";
            document.getElementById("unit").value = "";
            document.getElementById("price").value = "";
        }
    };

    xhttp.open("POST", "productinsert.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send(
        "type=" + encodeURIComponent(type) +
        "&quantity=" + encodeURIComponent(quantity) +
        "&unit=" + encodeURIComponent(unit) +
        "&price=" + encodeURIComponent(price)
    );
}
</script>

</body>
</html>
