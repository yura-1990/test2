<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once '../../core/Database.php';
include_once '../../models/Catalog.php';

$db = new Database();
$pdo = $db->connect();

$region = new Catalog($pdo);
$result=$region->getALL();
echo json_encode($result);