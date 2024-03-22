<?php
$apiKey = 'e2c5719fbf533c6e425418fe3e40c819';
$city = isset($_GET['city']) ? $_GET['city'] : 'Nairobi'; // Get city from query parameter or default to Nairobi
$apiUrl = "http://api.openweathermap.org/data/2.5/weather?q=$city&appid=$apiKey";

$weatherData = file_get_contents($apiUrl);
echo $weatherData;
?>
