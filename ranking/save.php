<?php

include '../config.php';
include '../lib/mysql/mysql_insert.php';
include '../lib/mysql/mysql_get_one.php';

mysql_insert('INSERT INTO ranking VALUES (NULL, "'.$_POST['name'].'", '.$_POST['point'].', NOW())');

header('Access-Control-Allow-Origin: *');

echo mysql_get_one('SELECT COUNT(*) AS count FROM ranking WHERE point > '.$_POST['point'])->count + 1;
