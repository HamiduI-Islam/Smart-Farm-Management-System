<?php
include '../DB/db.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manage Loan Requests</title>
    <link rel="stylesheet" href="../CSS/leasestyle.css">
</head>
<body>

<div class="container">
    <h2>Pending Loan Requests</h2>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Farmer ID</th>
                <th>Land Info</th>
                <th>Bank Account</th>
                <th>Amount</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $sql = "SELECT * FROM Loan_Requests WHERE Status='Pending'";
            $result = mysqli_query($conn, $sql);

            if ($result && mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) { 
            ?>
                <tr>
                    <td><?php echo $row['Id']; ?></td>
                    <td><?php echo $row['Farmer_Id']; ?></td>
                    <td><?php echo $row['Land_Info']; ?></td>
                    <td><?php echo $row['Bank_Account']; ?></td>
                    <td><?php echo $row['Requested_Amount']; ?></td>
                    <td><strong><?php echo $row['Status']; ?></strong></td>
                    <td>
                        <a href="../PHP/updateLoan.php?action=accept&id=<?php echo $row['Id']; ?>" 
                           class="btn btn-accept" 
                           onclick="return confirm('Accept this loan request?')">Accept</a>
                        
                        <a href="../PHP/updateLoan.php?action=reject&id=<?php echo $row['Id']; ?>" 
                           class="btn btn-reject" 
                           onclick="return confirm('Are you sure you want to delete this?')">Reject</a>
                    </td>
                </tr>
            <?php 
                }
            } else {
                echo "<tr><td colspan='7' class='no-data'>No pending loan requests found.</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>

</body>
</html>