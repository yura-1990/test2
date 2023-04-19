<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once '../../core/Database.php';
include_once '../../models/Product.php';

$db = new Database();
$pdo = $db->connect();

$product = new Product($pdo);
$result=$product->getALL();
echo json_encode($result);
