<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Penyalaan AC</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Sistem Penyalaan AC</h1>
        <form method="POST" action="">
            <label for="temperature">Suhu (°C):</label>
            <input type="number" id="temperature" name="temperature" required><br><br>
            
            <label for="humidity">Kelembaban (%):</label>
            <input type="number" id="humidity" name="humidity" required><br><br>

            <input type="submit" name="submit" value="Cek Status AC">
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $temperature = $_POST['temperature'];
            $humidity = $_POST['humidity'];

            // Batasan suhu dan kelembaban
            $lowTemp = 20;
            $mediumTemp = 28;
            $highTemp = 35;

            $lowHumidity = 40;
            $mediumHumidity = 60;
            $highHumidity = 80;

            echo "<div class='result-box'>";
            echo "<h2>Input:</h2>";
            echo "Suhu: " . $temperature . "°C<br>";
            echo "Kelembaban: " . $humidity . "%<br><br>";

            echo "<h2>Status AC:</h2>";

            if ($temperature < $lowTemp && $humidity < $lowHumidity) {
                echo "AC Mati";
            } elseif ($temperature >= $lowTemp && $temperature < $mediumTemp && $humidity >= $lowHumidity && $humidity < $mediumHumidity) {
                echo "AC Menyala Rendah";
            } elseif ($temperature >= $mediumTemp && $temperature < $highTemp && $humidity >= $mediumHumidity && $humidity < $highHumidity) {
                echo "AC Menyala Sedang";
            } else {
                echo "AC Menyala Berat";
            }
            echo "</div>";
        }
        ?>
    </div>
</body>
</html>
