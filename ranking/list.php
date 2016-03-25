<?php

include '../config.php';
include '../lib/mysql/mysql_get_list.php';

$count = $_GET['count'];

if ($count > 1000) {
	$count = 1000;
}

header('Access-Control-Allow-Origin: *');

echo json_encode(array(
	"list" => mysql_get_list('SELECT * FROM ranking ORDER BY point DESC limit '.$count)
));
