<?php
class Db
{
    public static function getConnection()
    {
        $paramsPath = ROOT . '/app/config/db_params.php';
        $params = include($paramsPath);

        try {
            $dsn = 'mysql:host=' . $params['host'] . ';dbname=' . $params['dbname'] . ';';
            $options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
            $db = new PDO($dsn, $params['user'], $params['password'], $options);
            $db->exec('set names utf8');
            return $db;
        } catch (PDOException $e) {
            echo "<br>";
            die($e->getMessage());
        }
    }
}
