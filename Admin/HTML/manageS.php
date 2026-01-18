<?php
include '../DB/db.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Manage Sale Requests</title>
    <link rel="stylesheet" href="../CSS/salestyle.css">
    
</head>
<body style="background-color: #bbf6bf;">
<div class="content">
    <h2>Pending Sale Requests</h2>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Farmer ID</th>
                <th>Product Type</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $sql = "SELECT * FROM Sale_Requests WHERE Status='Pending'";
                $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) { 
            ?>
                <tr>
                    <td><?php echo $row['Id']; ?></td>
                    <td><?php echo $row['Farmer_Id']; ?></td>
                    <td><?php echo $row['Product_Type']; ?></td>
                    <td><?php echo $row['Quantity']; ?></td>
                    <td><?php echo $row['Price']; ?></td>
                    <td><?php echo $row['Status']; ?></td>
                    <td>
                        <a href="../PHP/managesale.php?action=accept&id=<?php echo $row['Id']; ?>" 
                           class="btn-accept" onclick="return confirm('Accept this request?')">Accept</a>
                        
                        <a href="../PHP/managesale.php?action=reject&id=<?php echo $row['Id']; ?>" 
                           class="btn-reject" onclick="return confirm('Are you sure you want to delete this request?')">Reject</a>
                    </td>
                </tr>
            <?php 
                }
            } else {
                echo "<tr><td colspan='7' style='text-align:center;'>No pending requests.</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>
</body>
</html>