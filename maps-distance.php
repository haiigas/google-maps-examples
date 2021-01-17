<!DOCTYPE html>
<html>
<head>
    <title>Teknowebapp - Maps Get Distance</title>
</head>
<body>
    <?php
        $lat_origin = -7.2574719;
        $lng_origin = 112.7520883;

        $lat_destination = -7.943795;
        $lng_destination = 112.659256;

        $dataJson = file_get_contents("https://maps.googleapis.com/maps/api/distancematrix/json?units=metric&origins=".$lat_origin.",".$lng_origin."&destinations=".$lat_destination.",".$lng_destination."&key=AIzaSyA1UhV7s_4c-E3p33HyK_P-N7uEs8qqfpg");

        $data = json_decode($dataJson,true);
        $distance = $data['rows'][0]['elements'][0]['distance']['text'];

        echo "Jarak : ".$distance;
    ?>
</body>
</html>