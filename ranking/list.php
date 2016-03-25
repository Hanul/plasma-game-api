<?php

include '../config.php';
include '../lib/mysql/mysql_get_list.php';

$count = $_GET['count'];

if ($count > 1000) {
	$count = 1000;
}

header('Access-Control-Allow-Origin: *');

header('Cache-Control: no-cache, no-store, must-revalidate'); // HTTP 1.1
header('Pragma: no-cache'); // HTTP 1.0
header('Expires: 0'); // Proxies

echo json_encode(array(
	"list" => mysql_get_list('SELECT * FROM ranking ORDER BY point DESC limit '.$count)
));
