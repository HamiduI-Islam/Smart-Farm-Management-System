<?php
session_start();
include "../DB/db.php";

if (!isset($_SESSION['username'])) {
    header("Location: ../HTML/login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Apply for Land Lease</title>
    <link rel="stylesheet" href="../CSS/land.css">
</head>
<body>

<div class="content">
    <h2>Apply for Land Lease</h2>

    <?php
    if (isset($_SESSION['success'])) {
        echo "<p class='success'>" . $_SESSION['success'] . "</p>";
        unset($_SESSION['success']);
    }

    if (isset($_SESSION['error'])) {
        echo "<p class='error'>" . $_SESSION['error'] . "</p>";
        unset($_SESSION['error']);
    }
    ?>

    <form method="post" action="landleaseinsert.php">
        <label>Season</label>
        <input type="text" name="season" required>

        <label>Property Type</label>
        <input type="text" name="property_type" required>

        <button type="submit">Submit Request</button>
    </form>
</div>

</body>
</html>
