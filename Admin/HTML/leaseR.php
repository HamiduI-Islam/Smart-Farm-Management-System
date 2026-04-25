<?php
include '../DB/db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manage Land Lease</title>
     <link rel="stylesheet" href="../CSS/leasestyle.css">
    <style>
       
    </style>
</head>
<body style="background-color: #bbf6bf;">

<div class="container">
    <h2>Pending Land Lease Requests</h2>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Farmer ID</th>
                <th>Season</th>
                <th>Property Type</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php 
          
            $sql = "SELECT * FROM Lease_Requests WHERE Status='Pending'";
            $result = mysqli_query($conn, $sql);

            if ($result && mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) { 
            ?>
                <tr>
                    <td><?php echo $row['Id']; ?></td>
                    <td><?php echo $row['Farmer_Id']; ?></td>
                    <td><?php echo $row['Season']; ?></td>
                    <td><?php echo $row['Property_Type']; ?></td>
                    <td><strong><?php echo $row['Status']; ?></strong></td>
                    <td>
                        <a href="../PHP/leaserequest.php?action=accept&id=<?php echo $row['Id']; ?>" class="btn btn-accept" onclick="return confirm('Accept this lease?')">Accept</a>
   
                        <a href="../PHP/leaserequest.php?action=reject&id=<?php echo $row['Id']; ?>" class="btn btn-reject" onclick="return confirm('Are you sure you want to delete this?')">Reject</a>
                    </td>
                </tr>
            <?php 
                }
            } else {
                echo "<tr><td colspan='6' class='no-data'>No pending lease requests found.</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>

</body>
</html>