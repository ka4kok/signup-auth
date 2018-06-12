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
$age = trim($data['age']);
$pass = trim($data['password']);

if (empty($name)) {
    $toReturn['status'] = 0;
    $toReturn['errors'][] = 'Введите имя';
} elseif (empty($age)) {
    $toReturn['status'] = 0;
    $toReturn['errors'][] = 'Введите возраст';
} elseif (empty($pass)) {
    $toReturn['status'] = 0;
    $toReturn['errors'][] = 'Введите пароль';
} else {

    $check_sql  = "SELECT * FROM `users`
                   WHERE `name` = :name";

    $check_params =  [
        'name' => $name,
    ];

    $check_stmt = $db->query($check_sql, $check_params);

    if (!empty($check_stmt)) {
        $toReturn['status'] = 0;
        $toReturn['errors'][] = 'Пользаватель с таким именем уже есть';
    } else {
        $pass = md5($pass);

        $sql  = "INSERT INTO `users`
                  SET `name` = :name,`age` = :age,`password` = :password";
        $params =  [
            'name' => $name,
            'age' => $age,
            'password' => $pass,
        ];
        $stmt = $db->exec($sql, $params);
        $_SESSION['name'] = $name;
    }
}

echo json_encode($toReturn);







