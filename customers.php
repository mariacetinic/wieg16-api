<?php
/**
 * Created by PhpStorm.
 * User: maria
 * Date: 2017-11-15
 * Time: 13:58
 */

/**
 * Created by PhpStorm.
 * User: maria
 * Date: 2017-11-15
 * Time: 13:16
 */

function status_header($code = 200) {
    $messages = [
        200 => "OK",
        404 => "Not found"
    ];
    header("HTTP/1.1 ".$code." ".$messages[$code]); //"HTTP/1.1 " skrivs bara i status headern
}

$host = 'localhost';
$db = 'my_curl';
$user = 'root';
$password = 'root';
$charset = 'utf8';
$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false];


$pdo = new PDO($dsn, $user, $password, $options);

/*
$customerId = $_GET['customer_id'];
$address = isset($_GET['address']) ? $_GET['address'] : null; //if $address är satt så är $address = $_GET['address'] annars är $address null


    $sql = "SELECT * FROM `customer` JOIN `address` ON `customer`.`id` = `address`.`customer_id` WHERE `customer_id` = $customerId";
    $stm = $pdo->prepare($sql);
    $stm->execute([]);
    $customer = $stm->fetch();

    $sql = "SELECT * FROM `address` WHERE `customer_id` = $customerId";
    $stm = $pdo->prepare($sql);
    $stm->execute([]);
    $theAddress = $stm->fetch();

    header('Content-Type: application/json');
    if ($customer != null && $address != null) {
        echo json_encode($theAddress);
    }
    else if ($customer != null) { //den här är för generell och kan därför inte vara i if-satsen eftersom den alltid kommer vara true och kommer gå vidare.
        echo json_encode($customer);
    }
    else {
        status_header(404);
        $message = "Customer not found";
        if ($address != null)
            $message = "Address not found";
        echo json_encode(["message" => $message]);
    }
    */

//uppgift 5.1 - 5.7

/*$sql = "SELECT * FROM `customer`";
$stm = $pdo->prepare($sql);
$stm->execute([]);
$customers = $stm->fetchAll();

//var_dump($customers);

$companies = [];

foreach ($customers as $customer) {
    $companies[] = $customer['customer_company'];
}
var_dump($companies);
die();
//var_dump($companies);

$unique = array_unique($companies);

foreach ($unique as $companies) {
    $sql = "INSERT INTO `companies` (`company_name`) VALUES (:company_name)";
    $stm_insert = $pdo->prepare($sql);
    $stm_insert->execute([
        ':company_name' => $companies
    ]);

}*/

//UPDATE customer SET `company_id` = 6 WHERE `company_name` = "Intensio"
//$sql = "SELECT * FROM `companies`";
$sql = "UPDATE `customer` SET `company_id` = 10 WHERE `customer_company` = \"Intensio\"";
$stm = $pdo->prepare($sql);
$stm->execute([]);
$companies = $stm->fetchAll();

//var_dump($companies);

foreach($customers as $customer) {
    //var_dump($id);
    //var_dump($company);
    echo "Id: " . $customer['company_id'] . " " . "Företag: " . $customer['customer_company'] . "<br>";
}