<?php
include('../DB/db.php'); 
if (isset($_POST['action']) && isset($_POST['id'])) {
    $id = $_POST['id'];
    $action = $_POST['action'];

    if ($action == 'accept') {
        $update_sql = "UPDATE Farmer SET status = 'accepted' WHERE id = '$id'";
        if (mysqli_query($conn, $update_sql)) {
            echo "<script>alert('User Accepted!'); window.location.href='user_status.php';</script>";
        }
    } 
    elseif ($action == 'reject') {
        $delete_sql = "DELETE FROM Farmer WHERE id = '$id'";
        if (mysqli_query($conn, $delete_sql)) {
            echo "<script>alert('User Rejected and Deleted!'); window.location.href='user_status.php';</script>";
        }
    }
}
$query = mysqli_query($conn, "SELECT * FROM Farmer WHERE status = 'pending'");
?>

<!DOCTYPE html>
<html>
<head>
    <title>User Status Management</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #bbf6bf; padding: 20px; }
       
        h2 { text-align: center; color: #333; }
        
        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
            background-color: white;
            box-shadow: 0 4px 8px rgba(189, 239, 173, 0.1);
        }
        
        th, td {
            padding: 12px;
            text-align: center;
            border-bottom: 1px solid #5dff75;
        }
        .header-container {
            width: 80%;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .btn-back {
            background-color: #555;
            color: white;
            padding: 10px 15px;
            text-decoration: none;
            border-radius: 5px;
            font-size: 14px;
            transition: background 0.3s;
        }
        .btn-back:hover { background-color: #333; }
        th {
            background-color: #333;
            color: white;
        }

        tr:hover { background-color: #f1f1f1; }

        .btn { padding: 6px 12px; text-decoration: none; color: white; border-radius: 4px; display: inline-block; font-size: 14px; }
        .btn-accept { background-color: green; }
        .btn-reject { background-color: red; }
    </style>
</head>
<body>

    <div class="header-container">
        <h2>Pending Farmer Requests</h2>
        <a href="dashboard.php" class="btn-back">Back to Dashboard</a>
    </div>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Address</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            if (mysqli_num_rows($query) > 0) {
                while($row = mysqli_fetch_assoc($query)) { 
            ?>
               <tr>
    <td><?php echo $row['Id']; ?></td>
    
    <td><?php echo $row['Name']; ?></td>
    <td><?php echo $row['Address']; ?></td>
    
    <td>
    <form method="POST" action="user_status.php">
        <input type="hidden" name="id" value="<?php echo $row['Id']; ?>">
        
        <button type="submit" name="action" value="accept" class="btn btn-accept">Accept</button>
        <button type="submit" name="action" value="reject" class="btn btn-reject" onclick="return confirm('Delete this farmer?')">Reject</button>
    </form>
</td>
</tr>
            <?php 
                } 
            } else {
                echo "<tr><td colspan='4'>No pending requests found.</td></tr>";
            }
            ?>
        </tbody>
    </table>

</body>
</html>