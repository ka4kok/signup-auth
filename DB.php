<?php

class DB {
    public $link;

    public function connect() {
        try {
            $config = require_once 'conf.php';

            $dsn = 'mysql:host='.$config['host'].';dbname='.$config['db'].';';

            $this->link = new PDO($dsn,$config['name'],$config['password']);

        } catch (PDOException $e) {
             print_r($e->getMessage());
            die('Соединение не установлено');
        }
    }

    public function exec($sql, $par) {

        $sth = $this->link->prepare($sql);

        return $sth->execute($par);
    }

    public function query($sql, $par) {

        $stmt = $this->link->prepare($sql);

        $stmt->execute($par);

        $result = $stmt->fetchALL(PDO::FETCH_ASSOC);

        if ($result === false) {
            return false;
        }

        return $result;
    }
}





