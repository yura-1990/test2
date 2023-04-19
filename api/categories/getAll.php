<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once '../../core/Database.php';
include_once '../../models/Category.php';

$db = new Database();
$pdo = $db->connect();

$category = new Category($pdo);
$result=$category->getALL();
echo json_encode($result);
