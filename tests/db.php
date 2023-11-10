<?php


$host = '127.0.0.1';
$db   = 'test';
$user = 'root';
$pass = '';
$charset = 'utf8';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
try {
    $db = new PDO($dsn, $user, $password);
} catch (PDOException $e) {
    die('Подключение не удалось: ' . $e->getMessage());
}