<?php

include '../config.php';
include '../lib/mysql/mysql_insert.php';
include '../lib/mysql/mysql_get_one.php';

header('Access-Control-Allow-Origin: *');

header('Cache-Control: no-cache, no-store, must-revalidate'); // HTTP 1.1
header('Pragma: no-cache'); // HTTP 1.0
header('Expires: 0'); // Proxies

if ($_POST['key'] == sha1($plasma_config['secure_key'].$_POST['name'].$_POST['point'])) {
	
	mysql_insert('INSERT INTO ranking VALUES (NULL, "'.$_POST['name'].'", '.$_POST['point'].', NOW())');
	
	echo mysql_get_one('SELECT COUNT(*) AS count FROM ranking WHERE point > '.$_POST['point'])->count + 1;
}

else {
	echo '-1';
}
