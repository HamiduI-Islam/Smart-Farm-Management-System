<?php
include "../../Farmer/DB/db.php";

if (isset($_POST['video_link'])) {
    
    $video_link = $_POST['video_link'];
    $season_name = $_POST['season_name'];

    if (empty($video_link) || empty($season_name)) {
       echo "Empty fields";
        exit();
    }
       $final_link = str_replace("watch?v=", "embed/", $video_link);
    $sql = "INSERT INTO Tutorial (Video_Link, Season) VALUES ('$final_link', '$season_name')";

    if (mysqli_query($conn, $sql)) {
        echo "success";
        exit();
    } else {
        echo "Database Error: " . mysqli_error($conn);
    }
} else {

    echo "Unauthorized access";
}
?>