# plasma-game-api
게임 개발시 사용하는 서버 API

## config.php
설정 파일입니다.
```php
$plasma_config['secure_key'] = '보안 키';

$plasma_config['mysql'] = array(
	host => '데이터베이스 서버 호스트',
	database => '데이터베이스 명',
	username => '데이터베이스 아이디',
	password => '데이터베이스 비밀번호'
);
```

## init.php
데이터베이스를 초기화 하는 코드입니다. 웹 브라우저 등에서 최초 1회 혹은 `plasma-game-api`를 업데이트 할 때 접속해 줍니다.
```
http://example.com/plasma-game-api/init.php
```

## ranking/save.php
랭킹을 저장합니다.

#### GameMaker: Studio 예제
```
var secure_key = '보안 키';

var name = get_string('이름을 입력하세요. (영문)', '');
var point = 100;

if (name != '') {
    save_ranking = http_post_string('http://example.com/plasma-game-api/ranking/save.php', 'name=' + name + '&point=' + string(point) + '&key=' + sha1_string_utf8(secure_key + name + string(point)));
}
```
이후 HTTP 이벤트로 랭킹을 받아옵니다. 랭킹이 -1 이면 오류가 발생한 것입니다. 보안 키를 확인해보시기 바랍니다.
```
if (ds_map_find_value(async_load, 'id') == save_ranking) {
    if (ds_map_find_value(async_load, 'status') == 0) {
    	var ranking = real(ds_map_find_value(async_load, 'result'));
    	if (ranking == -1) {
    		show_message('오류가 발생하였습니다.');
    	} else {
        	show_message('당신의 랭킹은 ' + string(ranking) + '등 입니다.');
       }
    }
}
```

## ranking/list.php
랭킹 목록을 가져옵니다.

#### GameMaker: Studio 예제
뒤의 count=6을 변경하여 몇 개를 가져올지 지정합니다. 최대 1000개를 가져올 수 있습니다.
```
load_ranking = http_get('http://example.com/dung/plasma-game-api/ranking/list.php?count=6');
```
이후 HTTP 이벤트로 랭킹을 받아옵니다.
```
if (ds_map_find_value(async_load, 'id') == load_ranking) {
    if (ds_map_find_value(async_load, 'status') == 0) {
        ranking_list = ds_map_find_value(json_decode(ds_map_find_value(async_load, 'result')), 'list');
    }
}
```

## 라이센스
[MIT](LICENSE)

## 작성자
[Young Jae Sim](https://github.com/Hanul)
