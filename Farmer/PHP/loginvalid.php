<?php
include "../DB/db.php";
session_start();

$error = "";
$success = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST["username"]);
    $password = trim($_POST["password"]);

    if (empty($username) || empty($password)) {
        $error = "Please fill in all fields";
    } else {
        $sql = "SELECT * FROM Farmer WHERE User_Name='$username'";
        $result = $conn->query($sql);

        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();

            if (password_verify($password, $row["Password"])) {
                $_SESSION["username"] = $username;
                $_SESSION["name"] = $row["Name"];

                if (isset($_POST["remember_me"])) {
                    $cookie_time = time() + (86400 * 30);
                } else {
                    $cookie_time = time() + (60 * 60);
                }

                setcookie("username", $username, $cookie_time, "/");
                setcookie("name", $row["Name"], $cookie_time, "/");

                header("Location: dashboard.php");
                exit();
            } else {
                $error = "Incorrect password";
            }
        } else {
            $error = "User not registered";
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
    <p style="color:green;"><?php echo $success; ?></p>
    <p style="color:red;"><?php echo $error; ?></p>

    <a href="../HTML/login.php">Back to Login</a>
</div>
</body>
</html>
