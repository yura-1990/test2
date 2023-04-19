<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once '../../core/Database.php';
include_once '../../models/Category.php';

$db = new Database();
$pdo = $db->connect();

$category = new Category($pdo);

$title = isset($_POST['title']) ? $_POST['title'] : die('Something went wrong');
$catalog_id = isset($_POST['catalog_id']) ? $_POST['catalog_id'] : die('Something went wrong');
$result=$category->create($title,$catalog_id);
echo json_encode($result);
