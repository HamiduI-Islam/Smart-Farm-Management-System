<?php
include '../DB/db.php';

if (isset($_GET['action']) && isset($_GET['id'])) {
    $id = mysqli_real_escape_string($conn, $_GET['id']);
    $action = $_GET['action'];

    if ($action == 'accept') {
        $update_sql = "UPDATE Sale_Requests SET Status='Accepted' WHERE Id='$id'";
        mysqli_query($conn, $update_sql);
    } elseif ($action == 'reject') {
        $delete_sql = "DELETE FROM Sale_Requests WHERE Id='$id'";
        mysqli_query($conn, $delete_sql);
    }
    
    header("Location: ../HTML/manageS.php");
    exit();
}

?>

