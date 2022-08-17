<?php 

require __DIR__ . '../../vendor/autoload.php';

// configure the Google Client
$client = new \Google_Client();
$client->setApplicationName('Google Sheets API');
$client->setScopes([\Google_Service_Sheets::SPREADSHEETS]);
$client->setAccessType('offline');
// credentials.json is the key file we downloaded while setting up our Google Sheets API
$path = 'credentials.json';
$client->setAuthConfig($path);

// configure the Sheets Service
$service = new \Google_Service_Sheets($client);

$spreadsheetId = '1ZuRMKsmUbuDVibQzBQpMzRjWgePE9bPuMRElx2ePJL8';
$spreadsheet = $service->spreadsheets->get($spreadsheetId);

$range_QT = 'ตอบคำถามวิทย์!A3:G50'; // here we use the name of the Sheet to get all the rows
$response_QT = $service->spreadsheets_values->get($spreadsheetId, $range_QT);
$values_QT = $response_QT->getValues();
//echo '<pre>'; print_r($values);

$range_QP = 'ตอบคำถามวิทย์!I3:O50'; // here we use the name of the Sheet to get all the rows
$response_QP = $service->spreadsheets_values->get($spreadsheetId, $range_QP);
$values_QP = $response_QP->getValues();

?>