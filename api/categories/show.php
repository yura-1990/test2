<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once '../../core/Database.php';
include_once '../../models/Category.php';

$db = new Database();
$pdo = $db->connect();

$category = new Category($pdo);
$id = isset($_GET['id']) ? $_GET['id'] : die('Something went wrong');
$result=$category->show($id);
echo json_encode($result);
