<?php

header('Access-Control-Allow-Origin: *');

header('Cache-Control: no-cache, no-store, must-revalidate'); // HTTP 1.1
header('Pragma: no-cache'); // HTTP 1.0
header('Expires: 0'); // Proxies

include '../config.php';
include '../lib/mysql/mysql_get_one.php';

$id = $_GET['id'];

echo json_encode(mysql_get_one('SELECT * FROM data WHERE id = '.$id));
