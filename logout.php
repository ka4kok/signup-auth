<?php

session_start();
session_unset();
session_destroy();
header('Location: /index.php');

$toReturn = [
    'status' => 1,
    'errors' => [],
    'data' => '',
];

echo json_encode($toReturn);