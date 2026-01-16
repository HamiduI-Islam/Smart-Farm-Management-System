<?php
session_start();
include '../DB/db.php';

if (!isset($_SESSION['username'])) {
    header("Location: ../HTML/login.html");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $product_type = $_POST['product_type'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];

    $username = $_SESSION['username'];

    $res = $conn->query("SELECT Id FROM Farmer WHERE User_Name='$username'");
    if ($res->num_rows == 1) {
        $farmer = $res->fetch_assoc();
        $farmer_id = $farmer['Id'];

        $sql = "INSERT INTO Sale_Requests (Farmer_Id, Product_Type, Quantity, Price)
                VALUES ('$farmer_id', '$product_type', '$quantity', '$price')";

        if ($conn->query($sql)) {
            header("Location: salerequest.php?success=1");
            exit();
        } else {
            echo "Error: " . $conn->error;
        }
    } else {
        echo "Farmer not found.";
    }
}
?>
