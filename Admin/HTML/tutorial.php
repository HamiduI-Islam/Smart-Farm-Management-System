<?php
$month = date('n');
if ($month >= 2 && $month <= 4) {
    $season = "spring";
} else if ($month >= 5 && $month <= 7) {
    $season = "summer";
} else if ($month >= 8 && $month <= 9) {
    $season = "rainy";
} else if ($month >= 10 && $month <= 11) {
    $season = "autumn";
} else {
    $season = "winter";
}

$seasonData = [
    "spring" => [
        "title" => "🌼 Spring Season",
        "time" => "February - April",
        "weather" => ["Mild heat", "Blooming flowers", "Gentle breeze"],
        "info" => "Ideal for planting summer vegetables and harvesting late winter crops.",
        "image" => "spring.jpg"
    ],
    "summer" => [
        "title" => "☀️ Summer Season",
        "time" => "May - July",
        "weather" => ["High temperature", "Occasional thunderstorms", "Humidity"],
        "info" => "Perfect for tropical fruits like Mangoes, Jackfruit, and Aus rice.",
        "image" => "summer.jpg"
    ],
    "rainy" => [
        "title" => "🌧️ Rainy Season",
        "time" => "August - September",
        "weather" => ["Heavy rainfall", "High humidity", "Flood risks"],
        "info" => "Best time for Aman rice cultivation and jute soaking.",
        "image" => "rainy.jpg"
    ],
    "autumn" => [
        "title" => "🌾 Fall (Autumn) Season",
        "time" => "October - November",
        "weather" => ["Moderate temperature", "Clear blue skies", "Good soil moisture"],
        "info" => "Ideal for short-duration crops, vegetables, pulses, and oilseeds.",
        "image" => "autumn.jpg"
    ],
    "winter" => [
        "title" => "❄️ Winter Season",
        "time" => "December - January",
        "weather" => ["Cool and dry", "Morning fog", "Low rainfall"],
        "info" => "The peak season for Boro rice and a wide variety of winter vegetables.",
        "image" => "winter.jpg"
    ]
];

$current = $seasonData[$season];
?>
<!DOCTYPE html>
<html>
<head>
    <title>TUTORIAL MANAGEMENT</title>
    <link rel="stylesheet" href="../CSS/tutorial.css">
    <style>
    .main-container {
        display: flex;
        justify-content: space-between;
        padding: 20px;
        gap: 20px;
        margin-top: 50px; 
    }

    .content-left {
        flex: 2;
    }

    .form-right {
        flex: 2;
        background: #f9f9f9;
        padding: 15px;
        border-left: 5px solid #4CAF50;
        border-radius: 8px;
        margin-top: 100px; 
        height: 250px;
        box-shadow: 0 4px 8px rgba(0,0,0,0.1); 
    }

    .form-right input, .form-right button {
        display: block;
        width: 100%;
        margin-bottom: 15px;
        padding: 12px;
        border: 1px solid #ddd;
        border-radius: 8px; 
        box-sizing: border-box; 
    }

    .form-right button {
        background-color: #4CAF50;
        color: white;
        border: none;
        cursor: pointer;
        font-weight: bold;
        transition: 0.3s;
    }

    .form-right button:hover {
        background-color: #45a049;
    }
    body{
  background-color: rgb(231, 243, 231);
  align-items: center;
  overflow: scroll;
}
</style>
</head>
<body>

<div class="main-container">
    <div class="content-left">
        <h1>Current Season: <?php echo ucfirst($season); ?> </h1>
        <p id="month">Month: <?php echo date('F'); ?></p>
        
        <img id="img" src="../IMAGES/<?php echo $current['image']; ?>" alt="<?php echo $season; ?>" style="width:100%; max-width:400px;">

        <div class="section">
            <h2><?php echo $current['title']; ?></h2>
            <p><strong>Time:</strong> <?php echo $current['time']; ?></p>
            <p><strong>Weather:</strong></p>
            <ul>
                <?php foreach ($current['weather'] as $condition) { echo "<li>$condition</li>"; } ?>
            </ul>
            <p><?php echo $current['info']; ?></p>
            <a href="https://www.youtube.com/results?search_query=krishi+kaj+bangladesh" target="_blank">Give Farming Tutorial Based On Season</a>
            <br>
        </div>
    </div>

    <div class="form-right">
        <h3>Add New Tutorial</h3>
        <form action="save_tutorial.php" method="POST">
            <label>YouTube Video Link:</label>
            <input type="url" name="video_link" placeholder="https://youtube.com/..." required>

            <label>Season Name:</label>
            <input type="text" name="season_name" value="<?php echo ucfirst($season); ?>" required>

            <button type="submit" name="send">Send</button>
        </form>
    </div>
</div>

</body>
</html>

