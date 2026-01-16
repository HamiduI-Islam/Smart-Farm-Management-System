<?php
session_start();
include '../DB/db.php';

!--if (!isset($_SESSION['username'])) {
    header("Location: ../HTML/login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $product_type = $_POST['type'];
    $quantity = $_POST['quantity'];
    $unit = $_POST['unit'];
    $price = $_POST['price'];

    $username = $_SESSION['username'];

   
    $res = $conn->query("SELECT Id FROM Farmer WHERE User_Name='$username'");
    if ($res->num_rows == 1) {
        $farmer = $res->fetch_assoc();
        $farmer_id = $farmer['Id'];

        $sql = "INSERT INTO Products (Farmer_Id, Product_Type, Quantity, Unit, Price_Per_Unit)
                VALUES ('$farmer_id', '$product_type', '$quantity', '$unit', '$price')";

        if ($conn->query($sql)) {
            header("Location: product.php?success=1");
            exit();
        } else {
            echo "Error: " . $conn->error;
        }
    } else {
        echo "Farmer not found.";
    }
}
?>
