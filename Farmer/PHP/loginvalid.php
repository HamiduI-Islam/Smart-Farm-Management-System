<?php
session_start();
include "../DB/db.php";
if (isset($_SESSION["username"])) {
    header("Location: dashboard.php");
    exit();
} elseif (isset($_SESSION['admin_name'])) {
    header("Location: ../../Admin/PHP/dashboard.php");
    exit();
}

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST["username"]);
    $password = trim($_POST["password"]);

    if (empty($username) || empty($password)) {
        $error = "Please fill in all fields";
    } else {
        $sql_farmer = "SELECT * FROM Farmer WHERE User_Name='$username'";
        $result_farmer = mysqli_query($conn, $sql_farmer);

        if (mysqli_num_rows($result_farmer) == 1) {
            $row = mysqli_fetch_assoc($result_farmer);
            if (password_verify($password, $row["Password"])) {
                if ($row['Status'] == 'Pending') {
                    echo "<script>alert('Your account is waiting for approval from the Admin.'); window.location.href='../HTML/login.php';</script>";
                    exit();
                } elseif ($row['Status'] == 'accepted') {
                    $_SESSION["username"] = $username;
                    $_SESSION["name"] = $row["Name"];
                    $_SESSION["role"] = "farmer";

                    header("Location: dashboard.php");
                    exit();
                }
            } else {
                $error = "Incorrect password for farmer";
            }
        } else {
            $sql_admin = "SELECT * FROM Admin WHERE User_name = '$username'";
            $result_admin = mysqli_query($conn, $sql_admin);

            if (mysqli_num_rows($result_admin) == 1) {
                $row = mysqli_fetch_assoc($result_admin);
                
                if ($password == $row['Password']) {
                    $_SESSION['admin_name'] = $row['User_name'];
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