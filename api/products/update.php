<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once '../../core/Database.php';
include_once '../../models/Product.php';

$db = new Database();
$pdo = $db->connect();

$product = new Product($pdo);

$title = isset($_POST['title']) ? $_POST['title'] : die('Something went wrong');
$id = isset($_POST['id']) ? $_POST['id'] : die('Something went wrong');
$category_id = isset($_POST['category_id']) ? $_POST['category_id'] : die('Something went wrong');

if ($title && $id && $category_id){
    $result=$product->update($id, $title, $category_id);
} else {
    $result = ['msg' => 'something went wrong'];
}

echo json_encode($result);
