<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once '../../core/Database.php';
include_once '../../models/Product.php';

$db = new Database();
$pdo = $db->connect();

$product = new Product($pdo);

$id = isset($_GET['id']) ? $_GET['id'] : die('Something went wrong');
$result=$product->delete($id);

echo json_encode($result);
