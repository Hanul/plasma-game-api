<?php

header('Access-Control-Allow-Origin: *');

header('Cache-Control: no-cache, no-store, must-revalidate'); // HTTP 1.1
header('Pragma: no-cache'); // HTTP 1.0
header('Expires: 0'); // Proxies

include '../config.php';
include '../lib/mysql/mysql_get_list.php';

$who = $_GET['who'];

$count = $_GET['count'];

if ($count > 1000) {
	$count = 1000;
}

echo json_encode(array(
	"list" => mysql_get_list('SELECT * FROM data WHERE who = "'.$who.'" ORDER BY time DESC limit '.$count)
));
