<?php

/**
 * MySQL에 접속후 데이터를 입력합니다.
 * 쿼리 실행이 성공했을 때는 id를, 실패했을 때는 null을 반환합니다.
 */
function mysql_insert($query) {
	
	global $plasma_config;
	
	// localhost로 연결
	$conn = mysqli_connect($plasma_config['mysql']['host'], $plasma_config['mysql']['username'], $plasma_config['mysql']['password'], $plasma_config['mysql']['database']);

	if (mysqli_query($conn, $query) !== true) {
		
		mysqli_close($conn);
		
		return null;
	}
	
	$id = mysqli_insert_id($conn);
	
	mysqli_close($conn);
	
	return $id;
}
