# plasma-game-api
게임 개발시 사용하는 서버 API

## config.php
설정 파일입니다.
```php
$plasma_config['mysql'] = array(
	database => '데이터베이스 명',
	username => '데이터베이스 아이디',
	password => '데이터베이스 비밀번호'
);
```

## init-database.php
데이터베이스를 초기화 하는 코드입니다. 최초 1회 혹은 `plasma-game-api`를 업데이트 할 때 실행해 줍니다.
```
http://example.com/plasma-game-api/init-database.php
```

## save-ranking.php
랭킹을 저장합니다.
```
http://example.com/plasma-game-api/save-ranking.php?json=인코딩된 JSON 문자열
```

## get-ranking.php
랭킹을 가져옵니다.

## save-data.php
데이터를 저장합니다.

## get-data.php
데이터를 가져옵니다.

## 라이센스
[MIT 라이센스](LICENSE)

