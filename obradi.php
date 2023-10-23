<?php

if (empty($_POST['rijec'])) {
    die('Polje ne smije biti prazno!');
}

if (file_exists(__DIR__ . '/words.json')) {
    $json_data = file_get_contents('words.json');
    $rijeci = json_decode($json_data, true);
    $rijeci[] = $_POST['rijec'];
}
else {
    $rijeci = [$_POST['rijec']];
}

$json_rijeci = json_encode($rijeci);

file_put_contents(__DIR__ . '/words.json', $json_rijeci);

require_once 'app.php';

