<?php
include "../../Farmer/DB/db.php"; 
$sql_count = "SELECT COUNT(*) AS total FROM Farmer";
$result_count = $conn->query($sql_count);
$total_farmers = 0;

if ($result_count && $row = $result_count->fetch_assoc()) {
    $total_farmers = $row['total'];
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="../CSS/dashboard.css">
    <title>Admin Dashboard</title>
    <style>
        a {
            text-decoration: none; 
            color: #2c3e50;
            padding: 10px;
            display: inline-block; 
        }
        a:hover {
            color: #27ae60;
            background-color: #f0f0f0;
        }
    </style>
    
</head>
<body>

    
    <div class="sidebar">
        <img src="../IMAGES/logo.JPG" class="logo">
        <h2>Smart Farm</h2>
<div class="welcome-container">
    </div>
        <ul class="admin-menu">
    <li><a href="../HTML/tutorial.php">Give Farming Tutorial</a></li>
    <li><a href="../HTML/add_user.php">Add User</a></li>
    <li><a href="../HTML/manageS.php">Maintain Order Process</a></li>
    <li><a href="user_status.php">View User Details</a></li>
    <li><a href="../HTML/leaseR.php">Manage Lease Request </a></li>
    <li><a href="">Loan Process</a></li>
    
</ul>
    </div>
        

    <div class="content">
        <div class="header">
           
            <h1>Welcome, Admin</h1>
            <a href="../../index.php" class="logout">Logout</a>
        </div>

        <div class="container">
            <div class="card">
                <h3>Total Farmers</h3>
                <p><b style="font-size: 40px; color: #000000;"><?php echo $total_farmers; ?></b></p>
                <p>--</p>
            </div>
        </div>

        <section style="margin-top: 40px;">
            <h3>Quick Overview</h3>
            <p>Select an option from the sidebar to manage farm operations.</p>
        </section>
    </div>

</body>
</html>