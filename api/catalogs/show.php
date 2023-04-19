<?php

    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    include_once '../../core/Database.php';
    include_once '../../models/Catalog.php';

    $db = new Database();
    $pdo = $db->connect();

    $catalog = new Catalog($pdo);
    $id = isset($_GET['id']) ? $_GET['id'] : die('Something went wrong');
    $result=$catalog->show($id);
    echo json_encode($result);
