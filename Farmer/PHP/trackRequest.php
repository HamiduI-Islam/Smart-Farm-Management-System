<?php
session_start();
include "../DB/db.php";
if (!isset($_SESSION['username'])) {
    header("Location: Login.php");
    exit();
}

$username = $_SESSION['username'];
$f_sql = "SELECT Id FROM Farmer WHERE User_Name='$username'";
$f_result = mysqli_query($conn, $f_sql);
$f_row = mysqli_fetch_assoc($f_result);
$farmer_id = $f_row['Id'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My Submitted Requests</title>
    <link rel="stylesheet" href="../CSS/leasestyle.css">
    <style>
        .section-title { background: #82d880; color: white; padding: 10px; margin-top: 30px; border-radius: 4px; }
        .status-pending { color: #f39c12; font-weight: bold; }
        .status-accepted { color: #27ae60; font-weight: bold; }
        table { width: 100%; border-collapse: collapse; margin-bottom: 20px; background: #fff; }
        th, td { border: 1px solid #ddd; padding: 12px; text-align: left; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>

<div class="container">
    <h2>Request Dashboard for <?php echo $username; ?></h2>

    <h3 class="section-title">Land Lease Requests</h3>
    <table>
        <thead>
            <tr>
                <th>Season</th>
                <th>Property Type</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $lease_sql = "SELECT * FROM lease_requests WHERE Farmer_Id='$farmer_id'";
            $lease_res = mysqli_query($conn, $lease_sql);
            if (mysqli_num_rows($lease_res) > 0) {
                while($row = mysqli_fetch_assoc($lease_res)) {
                  $status = $row['Status'];
                    echo "<tr>
                            <td>{$row['Season']}</td>
                            <td>{$row['Property_Type']}</td>
                            
                            <td><span style='color: black; font-weight: bold;'>$status</span></td>
                          </tr>";
                }
            } else { echo "<tr><td colspan='3'>No lease requests found.</td></tr>"; }
            ?>
        </tbody>
    </table>

    <h3 class="section-title">Loan Requests</h3>
    <table>
        <thead>
            <tr>
                <th>Land Info</th>
                <th>Bank Account</th>
                <th>Requested Amount</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $loan_sql = "SELECT * FROM loan_requests WHERE Farmer_Id='$farmer_id'";
            $loan_res = mysqli_query($conn, $loan_sql);
            if (mysqli_num_rows($loan_res) > 0) {
                while($row = mysqli_fetch_assoc($loan_res)) {
                  $status = $row['Status'];
                    echo "<tr>
                            <td>{$row['Land_Info']}</td>
                            <td>{$row['Bank_Account']}</td>
                            <td>{$row['Requested_Amount']}</td>
                            <td><span style='color: black; font-weight: bold;'>$status</span></td>
                          </tr>";
                }
            } else { echo "<tr><td colspan='4'>No loan requests found.</td></tr>"; }
            ?>
        </tbody>
    </table>

    <h3 class="section-title">Product Sale Requests</h3>
    <table>
        <thead>
            <tr>
                <th>Product Type</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $sale_sql = "SELECT * FROM sale_requests WHERE Farmer_Id='$farmer_id'";
            $sale_res = mysqli_query($conn, $sale_sql);
            if (mysqli_num_rows($sale_res) > 0) {
                while($row = mysqli_fetch_assoc($sale_res)) {
                  $status = $row['Status'];
                    echo "<tr>
                            <td>{$row['Product_Type']}</td>
                            <td>{$row['Quantity']}</td>
                            <td>{$row['Price']}</td>
                            <td><span style='color: black; font-weight: bold;'>$status</span></td>
                          </tr>";
                }
            } else { echo "<tr><td colspan='4'>No sale requests found.</td></tr>"; }
            ?>
        </tbody>
    </table>
</div>

</body>
</html>