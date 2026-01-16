<?php
session_start();
include "../DB/db.php";

$land_info = $_POST["land_info"];
$bank_account = $_POST["bank_account"];
$amount = $_POST["amount"];
$username = $_SESSION["username"];

if ($land_info == "" || $bank_account == "" || $amount == "") {
    $_SESSION["error"] = "Invalid do again";
    header("Location: loan.php");
    exit();
}

$f = "SELECT Id FROM Farmer WHERE User_Name='$username'";
$r = mysqli_query($conn, $f);
$d = mysqli_fetch_assoc($r);
$farmer_id = $d["Id"];

$sql = "INSERT INTO Loan_Requests
(Farmer_Id, Land_Info, Bank_Account, Requested_Amount)
VALUES
('$farmer_id','$land_info','$bank_account','$amount')";

if (mysqli_query($conn, $sql)) {
    $_SESSION["success"] = "Request submitted";
} else {
    $_SESSION["error"] = "Error";
}

header("Location: loan.php");
exit();
