<?php
header('Content-Type: application/json');

$moeda = $_GET['moeda'] ?? 'USD-BRL';
$quantidade = 50;
$start_date = '20230701';
$end_date = '20230731';

$url = "https://economia.awesomeapi.com.br/$moeda/$quantidade?start_date=$start_date&end_date=$end_date";

$response = file_get_contents($url);
$data = json_decode($response, true);

if ($data === null) {
    echo json_encode([]);
    exit;
}

echo json_encode($data);
