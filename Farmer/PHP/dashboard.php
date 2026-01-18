<?php
session_start();
if (!isset($_SESSION["username"])) {
     header("Location: ../HTML/login.php"); 
     exit(); 
     }

include "../../Farmer/DB/db.php";
?>
<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="../../Admin/CSS/dashboard.css">
    <title>Smart Farmer Dashboard</title>
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
<body style=" background-color: #dcd8e0;">

    
    <div class="sidebar">
        <img src="../../Admin/IMAGES/logo.JPG" class="logo">
        <h2>Smart Farm</h2>
<div class="welcome-container">
    </div>
        <ul class="admin-menu">
    <li><a href="product.php">Manage Product</a></li>
    <li><a href="salerequest.php">Submit Sale Request</a></li>
    <li><a href="../HTML/view_tutorial.php">See Farming Tutorial</a></li>
    <li><a href="weather.php">Get Weather Tips</a></li>
    <li><a href="landlease.php">Submit Lease Request</a></li>
    <li><a href="loan.php">Submit Loan Request</a></li>
    <li><a href="trackRequest.php">Track Request</a></li>
    
</ul>
    </div>
        

    <div class="content">
        <div class="header">
           
            <h1>Welcome, <?php echo $_SESSION["username"] ?></h1>
            <a href="logout.php" class="logout">Logout</a>
        </div>

        <div class="container">
            <div class="card">
                <h3>This Is Your Dashboard</h3>
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