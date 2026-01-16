<?php
$season = $_GET['season'] ?? ''; 

$seasonData = [
    "spring" => [
        "title" => "🌼 Spring (Basant)",
        "time" => "February - April",
        "weather" => ["Mild temperatures (20°C-30°C)", "Lower humidity", "Increasing sunlight"],
        "crops" => [
            "Vegetables" => "Okra, Eggplant, Pumpkin, Bitter Gourd",
            "Fruits" => "Watermelon, Musk melon, Green Mangoes",
            "Grains/Others" => "Sunflowers, Moong Dal, Summer Maize"
        ],
        "guide" => "Focus on soil preparation for summer. Ensure consistent watering. Prune fruit trees.",
        "image" => "../../Admin/IMAGES/spring.jpg"
    ],
    "summer" => [
        "title" => "☀️ Summer (Grishma)",
        "time" => "May - July",
        "weather" => ["High heat (35°C+)", "Sudden storms (Kalbaishakhi)", "Longer days"],
        "crops" => [
            "Vegetables" => "Bottle Gourd, Ridge Gourd, Chillies, Cucumber",
            "Fruits" => "Mango, Jackfruit, Litchi, Pineapple",
            "Grains/Others" => "Aus Rice, Jute, Ginger, Turmeric"
        ],
        "guide" => "Use mulching to retain soil moisture. Water early morning or late evening.",
        "image" => "../../Admin/IMAGES/summer.jpg"
    ],
    "rainy" => [
        "title" => "🌧️ Rainy (Barsha)",
        "time" => "August - September",
        "weather" => ["Heavy Monsoon rain", "High humidity (80%+)", "Cloudy skies"],
        "crops" => [
            "Vegetables" => "Pointed Gourd, Sweet Potato, Arum (Kachu)",
            "Fruits" => "Guava, Pomelo, Star Fruit",
            "Grains/Others" => "Aman Rice (Main Transplanting), Jute harvesting"
        ],
        "guide" => "Ensure proper drainage to prevent root rot. Monitor for fungal infections.",
        "image" => "../../Admin/IMAGES/rainy.jpg"
    ],
    "winter" => [
        "title" => "❄️ Winter (Sheet)",
        "time" => "December - January",
        "weather" => ["Cold temperatures (10°C-20°C)", "Morning fog", "Dry air"],
        "crops" => [
            "Vegetables" => "Potato, Tomato, Broccoli, Carrots, Peas",
            "Fruits" => "Jujube, Oranges, Grapes",
            "Grains/Others" => "Boro Rice, Wheat, Chickpeas, Garlic, Onion"
        ],
        "guide" => "Apply organic compost. Protect sensitive crops from frost. Ideal time for bee-keeping.",
        "image" => "../../Admin/IMAGES/winter.jpg"
    ]
];

$current = $seasonData[$season] ?? null;
?>

<!DOCTYPE html>
<html>
<head>
    <title>Farming Guide</title>
    <link rel="stylesheet" href="../CSS/weather.css">
</head>
<body>
<div class="container">
    <div class="sidebar">
        <h3>Select Season</h3>
        <ul>
            <li><a href="weather.php?season=spring">Spring</a></li>
            <li><a href="weather.php?season=summer">Summer</a></li>
            <li><a href="weather.php?season=rainy">Rainy</a></li>
            <li><a href="weather.php?season=winter">Winter</a></li>
        </ul>
    </div>

    <div class="content">
        <?php if($current): ?>
        <h1><?php echo $current['title']; ?></h1>
        <p>Time: <?php echo $current['time']; ?></p>
        <img src="<?php echo $current['image']; ?>" class="season-img">
        <h3>Weather Overview</h3>
        <ul>
            <?php foreach ($current['weather'] as $w) echo "<li>$w</li>"; ?>
        </ul>

        <h3>Recommended Crops</h3>
        <div class="crops">
            <?php foreach ($current['crops'] as $cat => $list): ?>
            <div class="crop-card">
                <h4><?php echo $cat; ?></h4>
                <p><?php echo $list; ?></p>
            </div>
            <?php endforeach; ?>
        </div>

        <div class="guideline">
            <strong>Farming Guideline:</strong>
            <p><?php echo $current['guide']; ?></p>
        </div>
        <?php else: ?>
        <h2>🌾 Welcome!</h2>
        <p>Select a season from the sidebar to see farming guide.</p>
        <?php endif; ?>
    </div>
</div>
</body>
</html>
