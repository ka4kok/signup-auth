<?php

session_start();
require_once 'DB.php';
$db = new DB();
$db->connect();
$data = $_POST;

$toReturn = [
    'status' => 1,
    'errors' => [],
    'data' => '',
];

$name = trim($data['name']);
$pass = trim($data['password']);

if (empty($name)) {
    $toReturn['status'] = 0;
    $toReturn['errors'][] = 'Введите имя';
} elseif (empty($pass)) {
    $toReturn['status'] = 0;
    $toReturn['errors'][] = 'Введите пароль';
} else {
    $pass = md5($pass);

    $sql  = "SELECT * FROM `users`
                 WHERE `name` = :name AND `password` = :password";
    $params =  [
        'name' => $name,
        'password' => $pass
    ];

    $stmt = $db->query($sql, $params);

    if ( empty($stmt) ) {
        $toReturn['status'] = 0;
        $toReturn['errors'][] = 'Пользаватель с таким именем нет';
    } else {
        $_SESSION['name'] = $name;
    }
}

echo json_encode($toReturn);
