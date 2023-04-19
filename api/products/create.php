<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once '../../core/Database.php';
include_once '../../models/Product.php';

$db = new Database();
$pdo = $db->connect();

$product = new Product($pdo);

$title = isset($_POST['title']) ? $_POST['title'] : die('Something went wrong');
$category_id = isset($_POST['category_id']) ? $_POST['category_id'] : die('Something went wrong');

$result=$product->create($title,$category_id);
echo json_encode($result);
