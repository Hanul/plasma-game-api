
<?php

/**
 * MySQL에 접속후 쿼리를 실행하여 결과를 가져옵니다.
 */
function mysql_get_one($query) {
	
	global $plasma_config;
	
	// localhost로 연결
	$conn = mysqli_connect($plasma_config['mysql']['host'], $plasma_config['mysql']['username'], $plasma_config['mysql']['password'], $plasma_config['mysql']['database']);

	$result = mysqli_query($conn, $query);
	$row = mysqli_fetch_assoc($result);
	
	// 값이 없는 경우 null 반환
	if ($row === false) {
		return null;
	}
	
	$data = new stdClass();
	foreach ($row as $key => $value) {
		$data->$key = $value;
	}

	mysqli_close($conn);
	
	return $data;
}
