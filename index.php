<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>HOME PAGE</title>
</head>
<style>
  body {
    background-color: rgba(205, 235, 205, 1);
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    text-align: center;
}

form {
    width: 350px;
    margin: 100px auto;
    padding: 20px;
    background-color: white;
    border: 2px solid green;
    border-radius: 8px;
    text-align: center;
    margin-top: 10px;
    margin-bottom: 10px;
}

#img {
    width: 180px;
    height: auto;
    margin-bottom: 15px;
}

button {
    margin: 10px auto;
    padding: 6px 30px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

#L1 {
    background-color: rgb(124, 230, 124);
    width: 180px;
    height: 40px;
    margin: 0;
    font-weight: bold;
    transition: width 0.3s ease;
}

#L1:hover {
    width: 170px;
}
</style>
<body>
  <nav style="display: flex; justify-content: space-between; align-items: center; background-color: white; padding: 20px 30px; border-left: 6px solid #7cb374; box-shadow: 0 2px 5px rgba(0,0,0,0.05); font-family: sans-serif;">
    <h1 style="margin: 0; font-size: 24px; color: #000;">Welcome to Smart Farm</h1>
    <a href="Admin/PHP/details.php" style="text-decoration: none; background-color: #7cb374; color: white; padding: 10px 25px; border-radius: 8px; font-weight: bold; font-size: 14px;">About & Contact</a>
  </nav>
  
  <div>
    <form>
      <img src="Admin/IMAGES/logo.jpg" alt="Website Logo" id="img">
      <br><br>
      <?php
      if (isset($_SESSION["username"])) {
          echo '<a href="Farmer/PHP/dashboard.php"><button type="button" id="L1">GO TO DASHBOARD</button></a>';
          echo '<br><br><a href="Farmer/PHP/logout.php" style="color:red; font-size:12px;">Logout</a>';
      } elseif (isset($_SESSION["admin_name"])) {
          echo '<a href="Admin/PHP/dashboard.php"><button type="button" id="L1">ADMIN DASHBOARD</button></a>';
          echo '<br><br><a href="Farmer/PHP/logout.php" style="color:red; font-size:12px;">Logout</a>';
      } else {
          echo '<a href="Farmer/HTML/login.php"><button type="button" id="L1">LOGIN OR REGISTER</button></a>';
      }
      ?>
      <br><br>
    </form>
  </div>
</body>
</html>