<?php

include '../config.php';
include '../lib/mysql/mysql_insert.php';
include '../lib/mysql/mysql_get_one.php';

mysql_insert('INSERT INTO ranking VALUES (NULL, "'.$_POST['name'].'", '.$_POST['point'].', NOW())');

header('Access-Control-Allow-Origin: *');

header('Cache-Control: no-cache, no-store, must-revalidate'); // HTTP 1.1
header('Pragma: no-cache'); // HTTP 1.0
header('Expires: 0'); // Proxies

echo mysql_get_one('SELECT COUNT(*) AS count FROM ranking WHERE point > '.$_POST['point'])->count + 1;
