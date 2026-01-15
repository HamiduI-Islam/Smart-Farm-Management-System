<?php
include "../DB/db.php";
session_start();

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = mysqli_real_escape_string($conn, trim($_POST["username"]));
    $password = trim($_POST["password"]);

    if (empty($username) || empty($password)) {
        $error = "Please fill in all fields";
    } else {
        $sql_farmer = "SELECT * FROM Farmer WHERE User_Name='$username'";
        $result_farmer = mysqli_query($conn, $sql_farmer);

        if (mysqli_num_rows($result_farmer) == 1) {
            $row = mysqli_fetch_assoc($result_farmer);

            if (password_verify($password, $row["Password"])) {
                $_SESSION["username"] = $username;
                $_SESSION["name"] = $row["Name"];
                $_SESSION["role"] = "farmer";

                $cookie_time = isset($_POST["remember_me"]) ? time() + (86400 * 30) : time() + 3600;
                setcookie("username", $username, $cookie_time, "/");

                header("Location: dashboard.php");
                exit();
            } else {
                $error = "Incorrect password for farmer";
            }
        } 
        else {

            $sql_admin = "SELECT * FROM Admin WHERE User_Name = '$username'";
            $result_admin = mysqli_query($conn, $sql_admin);

            if (mysqli_num_rows($result_admin) == 1) {
                $row = mysqli_fetch_assoc($result_admin);
                
                if ($password == $row['Password']) {
                    $_SESSION['admin_name'] = $row['User_Name'];
                    header("Location: ../../Admin/PHP/dashboard.php");
                    exit();
                } else {
                    $error = "Incorrect password for admin";
                }
            } else {
                $error = "No user found with that username";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login Status</title>
    <link rel="stylesheet" href="../CSS/style.css">
</head>
<body>
<div class="box">
    <h2>Login Status</h2>
    <p style="color:red;"><?php echo $error; ?></p>
    <a href="../HTML/login.php">Back to Login</a>
</div>
</body>
</html>