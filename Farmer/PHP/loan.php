<?php
session_start();
include "../DB/db.php";

if (!isset($_SESSION["username"])) {
    header("Location: ../HTML/login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Loan Request</title>
    <link rel="stylesheet" href="../CSS/loan.css">
</head>
<body>

<div class="box">
<h2>Submit Loan Request</h2>

<form method="post" action="loaninsert.php">

Land Information:<br>
<input type="text" name="land_info"><br><br>

Bank Account:<br>
<input type="text" name="bank_account"><br><br>

Requested Amount:<br>
<input type="number" name="amount"><br><br>

<input type="submit" value="Submit Request">

</form>

<p style="color:green;"><?php echo $_SESSION["success"] ?? ""; ?></p>
<p style="color:red;"><?php echo $_SESSION["error"] ?? ""; ?></p>

<?php
unset($_SESSION["success"]);
unset($_SESSION["error"]);
?>

</div>

</body>
</html>
