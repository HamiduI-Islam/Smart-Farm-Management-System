<?php
session_start();
include '../DB/db.php';

if (!isset($_SESSION['username'])) {
    header("Location: ../HTML/login.html");
    exit();
}

$success_msg = "";
if (isset($_GET['success'])) {
    $success_msg = "Sale request submitted successfully!";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Submit Sale Request</title>
    <link rel="stylesheet" href="../CSS/salestyle.css">
</head>
<body>
<div class="content">
    <h2>Submit Sale Request</h2>

    <?php if($success_msg != "") { ?>
        <p style="color:green;"><?php echo $success_msg; ?></p>
    <?php } ?>

    <form method="post" action="salerequestinsert.php">
        <label>Product Type</label><br>
        <input type="text" name="product_type" required><br><br>

        <label>Quantity</label><br>
        <input type="number" name="quantity" required><br><br>

        <label>Price</label><br>
        <input type="number" name="price" required><br><br>

        <button type="submit">Submit Request</button>
    </form>
</div>
</body>
</html>
