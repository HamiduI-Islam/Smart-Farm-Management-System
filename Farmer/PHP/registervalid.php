<?php
session_start();

if(!isset($_SESSION['username'])){
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Farmer Dashboard</title>
    <link rel="stylesheet" href="../CSS/dashboard.css">
</head>
<body>
    <?php include 'sidebar.php'; ?>

    <main class="dashboard-content" id="dashboard-content">
        <h1>Welcome, <?php echo $_SESSION['username']; ?>!</h1>
        <p>Select a feature from the sidebar to see details here.</p>
    </main>

    <script>
        const links = document.querySelectorAll('.sidebar a');
        const content = document.getElementById('dashboard-content');

        links.forEach(link => {
            link.addEventListener('click', function(e){
                e.preventDefault(); 

                let featureName = this.textContent.trim();
                content.innerHTML = `
                    <h1>${featureName}</h1>
                    <p>This is the ${featureName} feature.</p>
                `;
            });
        });
    </script>
</body>
</html>
