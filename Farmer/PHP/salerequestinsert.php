<?php
session_start();
include '../DB/db.php';

if (!isset($_SESSION['username'])) {
    header("Location: ../HTML/login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $product_type = mysqli_real_escape_string($conn, $_POST['product_type']);
    $quantity_requested = intval($_POST['quantity']);
    $price = $_POST['price'];
    $username = $_SESSION['username'];

    // 1. Get Farmer ID
    $res = $conn->query("SELECT Id FROM Farmer WHERE User_Name='$username'");
    $farmer = $res->fetch_assoc();
    $farmer_id = $farmer['Id'];

    // 2. VALIDATION: Check if product exists and if quantity is enough
    $check_sql = "SELECT Quantity FROM Products WHERE Farmer_Id = '$farmer_id' AND Product_Type = '$product_type'";
    $check_res = $conn->query($check_sql);

    if ($check_res->num_rows == 1) {
        $product = $check_res->fetch_assoc();
        $available_quantity = intval($product['Quantity']);

        if ($quantity_requested <= $available_quantity) {
            
            // Start a transaction to ensure both queries succeed or fail together
            $conn->begin_transaction();

            try {
                // 3. Insert into Sale_Requests
                $sql_insert = "INSERT INTO Sale_Requests (Farmer_Id, Product_Type, Quantity, Price)
                               VALUES ('$farmer_id', '$product_type', '$quantity_requested', '$price')";
                $conn->query($sql_insert);

                // 4. DEDUCT: Subtract the requested quantity from the Products table
                $sql_update = "UPDATE Products 
                               SET Quantity = Quantity - $quantity_requested 
                               WHERE Farmer_Id = '$farmer_id' AND Product_Type = '$product_type'";
                $conn->query($sql_update);

                // If both queries worked, save the changes
                $conn->commit();

                header("Location: salerequest.php?success=1");
                exit();

            } catch (Exception $e) {
                // If anything fails, undo the changes
                $conn->rollback();
                echo "Error processing request: " . $e->getMessage();
            }

        } else {
            header("Location: salerequest.php?error=insufficient");
            exit();
        }
    } else {
        header("Location: salerequest.php?error=notfound");
        exit();
    }
}
?>