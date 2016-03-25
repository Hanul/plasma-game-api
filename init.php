<?php

include 'config.php';
include 'lib/mysql/mysql_run_query.php';

mysql_run_query('CREATE TABLE ranking(
	id INT NOT NULL AUTO_INCREMENT PRIMARY KEY
)');

mysql_run_query('ALTER TABLE ranking ADD COLUMN name VARCHAR(20) NOT NULL');
mysql_run_query('ALTER TABLE ranking ADD COLUMN point INT NOT NULL');
mysql_run_query('ALTER TABLE ranking ADD COLUMN time DATETIME NOT NULL');

?>
<!doctype html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no">
		<title>Plasma Game API</title>
	</head>
	<body>
		초기화 되었습니다.
	</body>
</html>
