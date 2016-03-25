<?php

/**
 * MySQL에 접속하여 결과를 배열로 가져옵니다.
 */
function mysql_get_list($query) {
	
	global $plasma_config;
	
	// localhost로 연결
	$conn = mysqli_connect($plasma_config['mysql']['host'], $plasma_config['mysql']['username'], $plasma_config['mysql']['password'], $plasma_config['mysql']['database']);

	$result = mysqli_query($conn, $query);

	$i = 0;
	$data_set = array();
	while ($row = mysqli_fetch_assoc($result)) {
		$data_set[$i] = new stdClass();
		foreach ($row as $key => $value) {
			$data_set[$i]->$key = $value;
		}
		$i += 1;
	}

	mysqli_close($conn);
	
	return $data_set;
}
