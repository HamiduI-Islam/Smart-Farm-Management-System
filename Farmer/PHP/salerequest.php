<?php
session_start();

// THE GUARD: Ensure only logged-in farmers can access this page
if (!isset($_SESSION['username'])) {
    header("Location: ../HTML/login.php"); 
    exit();
}

// THE BACK-SWIPE FIX: Prevent browser caching
header("Cache-Control: no-cache, no-store, must-revalidate");
header("Pragma: no-cache");
header("Expires: 0");

include '../DB/db.php';

$username = $_SESSION['username'];
$error_msg = "";
$success_msg = "";

// 1. Fetch Farmer ID and their existing products for the table and validation
$res = $conn->query("SELECT Id FROM Farmer WHERE User_Name='$username'");
$farmer = $res->fetch_assoc();
$farmer_id = $farmer['Id'];

// Fetch products belonging to this specific farmer
$product_query = "SELECT Product_Type, Quantity FROM Products WHERE Farmer_Id = '$farmer_id'";
$product_result = $conn->query($product_query);

// Handle Success/Error messages from redirect
if (isset($_GET['success'])) { $success_msg = "Sale request submitted successfully!"; }
if (isset($_GET['error'])) { 
    if($_GET['error'] == "notfound") $error_msg = "Error: Product type does not match your inventory.";
    if($_GET['error'] == "insufficient") $error_msg = "Error: Requested quantity exceeds available stock.";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Submit Sale Request</title>
    <link rel="stylesheet" href="../CSS/salestyle.css">
    <style>
        .container { display: flex; gap: 40px; padding: 20px; }
        .form-section { flex: 1; border-right: 1px solid #ddd; padding-right: 20px; }
        .table-section { flex: 1; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
        .error { color: red; font-weight: bold; }
        .success { color: green; font-weight: bold; }
    </style>
</head>
<body>

<div class="container">
    <div class="form-section">
        <h2>Submit Sale Request</h2>
        
        <?php if($success_msg != "") echo "<p class='success'>$success_msg</p>"; ?>
        <?php if($error_msg != "") echo "<p class='error'>$error_msg</p>"; ?>

        <form method="post" action="salerequestinsert.php">
            <label>Product Type (Must match your inventory)</label><br>
            <input type="text" name="product_type" placeholder="e.g., Rice" required><br><br>

            <label>Quantity to Sell</label><br>
            <input type="number" name="quantity" required><br><br>

            <label>Asking Price</label><br>
            <input type="number" name="price" required><br><br>

            <button type="submit">Submit Sale Request</button>
        </form>
    </div>

    <div class="table-section">
        <h2>Your Current Inventory</h2>
        <table>
            <thead>
                <tr>
                    <th>Product Type</th>
                    <th>Available Quantity</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                if ($product_result->num_rows > 0) {
                    while($row = $product_result->fetch_assoc()) {
                        echo "<tr>
                                <td>".$row['Product_Type']."</td>
                                <td>".$row['Quantity']."</td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='2'>No products found in your inventory.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

</body>
</html>