<?php 

$make = $_GET['make'] ?? 'Toyota';
$model = $_GET['model'] ?? 'Camry';

$apiUrl = "https://www.carqueryapi.com/api/0.3/?cmd=getTrims&make=" . urlencode($make) . "&model=" . urlencode($model);
$response = file_get_contents($apiUrl);
$carData = json_decode($response, true);

if (isset($carData['Trims'][0])) {
    $carInfo = $carData['Trims'][0];
    $carName = $carInfo['model_name'];
    $carYear = $carInfo['model_year'];
    $carEngine = $carInfo['model_engine_cc'];
    $carPower = $carInfo['model_engine_power_ps'];

    echo "<h2>Informações sobre o $carName</h2>";
    echo "<p>Ano: $carYear</p>";
    echo "<p>Motor: $carEngine cc</p>";
    echo "<p>Potência: $carPower PS</p>";
} else {
    echo "Informações do carro não encontradas.";
}


?>