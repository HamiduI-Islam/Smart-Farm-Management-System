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
        "title" => "🌼 Spring (Basant)",
        "time" => "February - April",
        "weather" => ["Mild temperatures (20°C-30°C)", "Lower humidity", "Increasing sunlight"],
        "crops" => [
            "Vegetables" => "Okra (Bhindi), Eggplant, Pumpkin, Bitter Gourd",
            "Fruits" => "Watermelon, Musk melon, Green Mangoes",
            "Grains/Others" => "Sunflowers, Moong Dal, Summer Maize"
        ],
        "guide" => "Focus on soil preparation for summer. Ensure consistent watering as the heat rises. Prune fruit trees now.",
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
        "guide" => "Use mulching to retain soil moisture. Water during early morning or late evening to prevent evaporation.",
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
        "guide" => "Ensure proper drainage to prevent root rot. Monitor for fungal infections due to high humidity.",
        "image" => "../../Admin/IMAGES/rainy.jpg"
    ],
    "autumn" => [
        "title" => "🌾 Autumn (Sharot/Hemanta)",
        "time" => "October - November",
        "weather" => ["Cooler nights", "Clear skies", "Decline in rainfall"],
        "crops" => [
            "Vegetables" => "Early Cabbage, Cauliflower, Radish, Spinach",
            "Fruits" => "Papaya, Bananas (year-round)",
            "Grains/Others" => "Mustard, Lentils, Black Gram, Wheat (Late Autumn)"
        ],
        "guide" => "Prepare seedbeds for winter vegetables. This is the 'Golden Harvest' season for Aman rice.",
        "image" => "../../Admin/IMAGES/autumn.jpg"
    ],
    "winter" => [
        "title" => "❄️ Winter (Sheet)",
        "time" => "December - January",
        "weather" => ["Cold temperatures (10°C-20°C)", "Morning fog", "Dry air"],
        "crops" => [
            "Vegetables" => "Potato, Tomato, Broccoli, Carrots, Peas",
            "Fruits" => "Jujube (Boroi), Oranges, Grapes",
            "Grains/Others" => "Boro Rice, Wheat, Chickpeas, Garlic, Onion"
        ],
        "guide" => "Apply organic compost. Protect sensitive crops from frost. Ideal time for bee-keeping (Mustard fields).",
        "image" => "../../Admin/IMAGES/winter.jpg"
    ]
];

$current = $seasonData[$season];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Farming Guide | <?php echo strtoupper($season); ?></title>
    <link rel="stylesheet" href="weather.css">
</head>
<body>

<div class="main-container">
    <div class="content-left">
        <div class="season-header">
            <p style="color: #666; margin: 0;">Current Month: <strong><?php echo date('F'); ?></strong></p>
            <h1 style="margin: 5px 0;"><?php echo $current['title']; ?></h1>
        </div>

        <img src="<?php echo $current['image']; ?>" alt="<?php echo $season; ?>" class="season-image">

        <div class="section">
            <h3>🌤️ Weather Overview</h3>
            <ul>
                <?php foreach ($current['weather'] as $condition) { echo "<li>$condition</li>"; } ?>
            </ul>

            <h3>🌱 Recommended Crops to Farm</h3>
            <div class="crop-grid">
                <?php foreach ($current['crops'] as $category => $list): ?>
                <div class="crop-card">
                    <h4><?php echo $category; ?></h4>
                    <p><?php echo $list; ?></p>
                </div>
                <?php endforeach; ?>
            </div>

            <div class="guideline-box">
                <strong>💡 Farming Guideline:</strong><br>
                <?php echo $current['guide']; ?>
            </div>
        </div>
    </div>

    
</div>

</body>
</html>