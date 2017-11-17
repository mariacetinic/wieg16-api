<?php
$host = 'localhost';
$db = 'my_curl';
$user = 'root';
$password = 'root';
$charset = 'utf8';
$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [ PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false  ];
$pdo = new PDO($dsn, $user, $password, $options);

$customerId = $_GET['customer_id'];

$sql = "SELECT * FROM `customers` JOIN `address` ON `customers`.`id` = `address`.`customer_id` WHERE `customer_id` = $customerId";
$stm = $pdo->prepare($sql);
$stm->execute([]);
$customers = $stm-> fetchAll();

header('Content-Type: application/json');
echo json_encode($customers);