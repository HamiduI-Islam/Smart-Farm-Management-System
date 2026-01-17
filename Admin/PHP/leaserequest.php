<?php
include '../DB/db.php';
if (isset($_GET['action']) && isset($_GET['id'])) {
    $id = (int)$_GET['id'];
    $action = $_GET['action'];

    if ($action == 'accept') {
        $update_sql = "UPDATE Lease_Requests SET Status='Accepted' WHERE Id='$id'";
        mysqli_query($conn, $update_sql);
    } elseif ($action == 'reject') {
        $delete_sql = "DELETE FROM Lease_Requests WHERE Id='$id'";
        mysqli_query($conn, $delete_sql);
    }
    
    header("Location: ../HTML/leaseR.php");
    exit();
}
?>

