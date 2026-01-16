<?php
session_start();
include '../DB/db.php'; 

if (!isset($_SESSION['username'])) {
    header("Location: ../HTML/login.php");
    exit();
}

$success_msg = "";
if (isset($_GET['success'])) {
    $success_msg = "Product saved successfully!";
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

    <?php if($success_msg != "") { ?>
        <p style="color:green;"><?php echo $success_msg; ?></p>
    <?php } ?>

    <form method="post" action="productinsert.php">
        <label>Product Type</label><br>
        <input type="text" name="type" required><br><br>

        <label>Quantity</label><br>
        <input type="number" name="quantity" required><br><br>

        <label>Unit</label><br>
        <input type="text" name="unit" required><br><br>

        <label>Price Per Unit</label><br>
        <input type="number" name="price" required><br><br>

        <button type="submit">Save Product</button>
    </form>
</div>
</body>
</html>
