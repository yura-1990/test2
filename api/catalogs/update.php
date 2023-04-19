<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once '../../core/Database.php';
include_once '../../models/Catalog.php';

$db = new Database();
$pdo = $db->connect();

$catalog = new Catalog($pdo);

$title = isset($_POST['title']) ? $_POST['title'] : die('Something went wrong');
$id = isset($_POST['id']) ? $_POST['id'] : die('Something went wrong');
$result=$catalog->update($title, $id);

echo json_encode($result);
