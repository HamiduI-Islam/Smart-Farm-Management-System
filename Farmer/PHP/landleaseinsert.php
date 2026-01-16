<?php
session_start();
include "../DB/db.php";

if (!isset($_SESSION['username'])) {
    header("Location: ../HTML/login.php");
    exit();
}

$season = trim($_POST['season']);
$property_type = trim($_POST['property_type']);
$username = $_SESSION['username'];

if ($season == "" || $property_type == "") {
    $_SESSION['error'] = "All fields are required";
    header("Location: landlease.php");
    exit();
}

$f_sql = "SELECT Id FROM Farmer WHERE User_Name='$username'";
$f_result = mysqli_query($conn, $f_sql);
$f_row = mysqli_fetch_assoc($f_result);
$farmer_id = $f_row['Id'];

$sql = "INSERT INTO Lease_Requests (Farmer_Id, Season, Property_Type)
        VALUES ('$farmer_id', '$season', '$property_type')";

if (mysqli_query($conn, $sql)) {
    $_SESSION['success'] = "Land lease request submitted successfully";
} else {
    $_SESSION['error'] = "Something went wrong";
}

header("Location: landlease.php");
exit();
