<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once '../../core/Database.php';
include_once '../../models/Category.php';

$db = new Database();
$pdo = $db->connect();

$category = new Category($pdo);

$title = isset($_POST['title']) ? $_POST['title'] : die('Something went wrong');
$id = isset($_POST['id']) ? $_POST['id'] : die('Something went wrong');
$catalog_id = isset($_POST['catalog_id']) ? $_POST['catalog_id'] : die('Something went wrong');

if ($title && $id && $catalog_id){
    $result=$category->update($id, $title, $catalog_id);
} else {
    $result = ['msg' => 'something went wrong'];
}

echo json_encode($result);
