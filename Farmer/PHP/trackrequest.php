<?php
include "../DB/db.php";
session_start();

$farmer_username = $_COOKIE['username'] ?? '';

$farmer_id = 0;
if($farmer_username != ''){
    $sql_farmer = "SELECT Id FROM Farmer WHERE User_Name='$farmer_username'";
    $res_farmer = $conn->query($sql_farmer);
    if($res_farmer->num_rows > 0){
        $row_farmer = $res_farmer->fetch_assoc();
        $farmer_id = $row_farmer['Id'];
    }
}

$pending_products = [];
if($farmer_id > 0){
    $sql_pending = "
        SELECT p.Product_Type, p.Unit, s.Quantity, s.Price, s.Status
        FROM Products p
        INNER JOIN Sale_Requests s
        ON p.Farmer_Id = s.Farmer_Id AND p.Product_Type = s.Product_Type
        WHERE p.Farmer_Id='$farmer_id' AND s.Status='Pending'
    ";
    $res_pending = $conn->query($sql_pending);
    if($res_pending->num_rows > 0){
        while($row = $res_pending->fetch_assoc()){
            $pending_products[] = $row;
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Track Pending Requests</title>
    <link rel="stylesheet" href="../CSS/track.css">
</head>
<body>
<div class="box">
    <h2>Pending Sale Requests</h2>

    <?php if(count($pending_products) > 0): ?>
    <table>
        <tr>
            <th>Product Type</th>
            <th>Quantity</th>
            <th>Unit</th>
            <th>Price</th>
            <th>Status</th>
        </tr>
        <?php foreach($pending_products as $req): ?>
        <tr>
            <td><?php echo $req['Product_Type']; ?></td>
            <td><?php echo $req['Quantity']; ?></td>
            <td><?php echo $req['Unit']; ?></td>
            <td><?php echo $req['Price']; ?></td>
            <td class="<?php echo strtolower($req['Status']); ?>"><?php echo $req['Status']; ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
    <?php else: ?>
        <p>No pending requests available.</p>
    <?php endif; ?>
</div>
</body>
</html>
