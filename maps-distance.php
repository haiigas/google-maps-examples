<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Distance Calculation - Google Maps API</title>
</head>
<body>
    <?php
        $latOrigin = -7.2574719;
        $lngOrigin = 112.7520883;

        $latDestination = -7.943795;
        $lngDestination = 112.659256;

        $apiKey = "YOUR_KEY";
        $url = "https://maps.googleapis.com/maps/api/distancematrix/json?units=metric"
             . "&origins={$latOrigin},{$lngOrigin}"
             . "&destinations={$latDestination},{$lngDestination}"
             . "&key={$apiKey}";

        $response = file_get_contents($url);
        $data = json_decode($response, true);

        if (isset($data['rows'][0]['elements'][0]['distance']['text'])) {
            $distance = $data['rows'][0]['elements'][0]['distance']['text'];
            echo "<h3>Distance: {$distance}</h3>";
        } else {
            echo "<p>Error: Unable to retrieve distance data from Google Maps API.</p>";
        }
    ?>
</body>
</html>
