<?php

header('Access-Control-Allow-Origin: *');

header('Cache-Control: no-cache, no-store, must-revalidate'); // HTTP 1.1
header('Pragma: no-cache'); // HTTP 1.0
header('Expires: 0'); // Proxies

include '../config.php';
include '../lib/mysql/mysql_insert.php';
include '../lib/mysql/mysql_get_one.php';

if ($_POST['key'] == sha1($plasma_config['secure_key'].$_POST['name'])) {
	
	if ($_POST['who'] == null) {
		$id = mysql_insert('INSERT INTO data VALUES (NULL, NULL, "'.$_POST['name'].'", "'.$_POST['data'].'", NOW())');
	} else {
		$id = mysql_insert('INSERT INTO data VALUES (NULL, "'.$_POST['who'].'", "'.$_POST['name'].'", "'.$_POST['data'].'", NOW())');
	}
	
	echo $id;
}

else {
	echo '-1';
}
