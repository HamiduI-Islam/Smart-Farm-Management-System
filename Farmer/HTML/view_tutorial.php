<?php
include('../DB/db.php'); 
$query = mysqli_query($conn, "SELECT * FROM tutorial");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Farmer Tutorials</title>
    <style>
        body { font-family: Arial; background: #bbf6bf; padding: 20px; }
        .container { display: flex; flex-wrap: wrap; gap: 20px; justify-content: center; }
        .video-card { background: white; padding: 15px; border: 1px solid #ddd; border-radius: 10px; text-align: center; width: 450px; }
        iframe { border-radius: 5px; width: 100%; height: 250px; }
    </style>
</head>
<body>

<h1 style="text-align:center;">Agricultural Tutorials</h1>

<div class="container">
    <?php 
    while($row = mysqli_fetch_assoc($query)) { 
    ?>
        <div class="video-card">
            <h3>Season: <?php echo $row['Season']; ?></h3>
            <iframe src="<?php echo $row['Video_Link']; ?>" frameborder="0" allowfullscreen></iframe>
        </div>
    <?php } ?>
</div>

</body>
</html>