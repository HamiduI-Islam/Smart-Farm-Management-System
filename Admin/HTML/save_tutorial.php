<?php
include "../../Farmer/DB/db.php";

if (isset($_POST['send'])) {
    
    $video_link = $_POST['video_link'];
    $season_name = $_POST['season_name'];

    if (empty($video_link) || empty($season_name)) {
        header("Location: dashboard.php?error=empty");
        exit();
    }
       $final_link = str_replace("watch?v=", "embed/", $video_link);
    $sql = "INSERT INTO Tutorial (Video_Link, Season) VALUES ('$final_link', '$season_name')";

    if (mysqli_query($conn, $sql)) {
        header("Location: tutorial.php?status=success");
        exit();
    } else {
        echo "Database Error: " . mysqli_error($conn);
    }
} else {

    header("Location: dashboard.php");
    exit();
}
?>