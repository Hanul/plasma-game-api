<?php

/**
 * MySQL에 접속후 쿼리를 실행합니다.
 * 쿼리 실행이 성공했을 때는 null을, 실패했을 때는 오류 메시지를 반환합니다.
 */
function mysql_run_query($query) {
	
	global $plasma_config;
	
	// localhost로 연결
	$conn = mysqli_connect($plasma_config['mysql']['host'], $plasma_config['mysql']['username'], $plasma_config['mysql']['password'], $plasma_config['mysql']['database']);

	if (mysqli_query($conn, $query) !== true) {
		$error = mysqli_error($conn);
	}
	
	mysqli_close($conn);
	
	return $error;
}
