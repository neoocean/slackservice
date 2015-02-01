<?php

if($input['command'] == '/뭐먹지')
{

	if($input['text'] != '')
	{
		list($subcommand, $argument) = explode(' ', $input['text'], 2);
	}

	if($subcommand == '추가')
	{
		if($argument == '')
		{
			die('추가할 음식을 알려주셔야 합니다: /뭐먹지 추가 음식이름');
		}
		// 중복 검사
		$sql = 'SELECT id 
				FROM command_whattoeat_list 
				WHERE name = \'' . decodeText($argument) . '\'';
		if(!($result = $db->sql_query($sql)))
		{
			die('쿼리에 실패했습니다: ' . $sql);
		}
		if($db->sql_numrows() > 0)
		{
			die('같은 이름이 이미 추가되어 있습니다.');
		}
		$db->sql_freeresult($result);

		// 아이디 가져오기 (이거 자동으로 돼야 하는 거 아님?;;)
		$sql = 'SELECT max(id) AS id 
				FROM command_whattoeat_list 
				WHERE 1';
		if(!($result = $db->sql_query($sql)))
		{
			die('쿼리에 실패했습니다: ' . $sql);
		}
		$next_id = $db->sql_fetchfield('id') + 1;
		$db->sql_freeresult($result);

		// 추가
		$sql = 'INSERT INTO  ' . $config['db_name'] . '.command_whattoeat_list (id, name) ' . 
				'VALUES (\'' . $next_id . '\', \'' . encodeText($argument) . '\');';
		if(!($result = $db->sql_query($sql)))
		{
			$error = $db->sql_error();
			die($error['message'] . ', ' . $sql);
		}
		else
		{
			die('추가했습니다.');
		}
	} // ~ $subcommand 추가

	if($subcommand == '삭제')
	{
		$sql = 'DELETE FROM ' . $config['db_name'] . '.command_whattoeat_list 
				WHERE name = \'' . encodeText($argument) . '\'
				LIMIT 1';
		if(!($result = $db->sql_query($sql)))
		{
			die('쿼리에 실패했습니다: ' . $sql);
		}
		else
		{
			die('삭제했습니다.');
		}
	} // ~ $subcommand 삭제

	if($subcommand == '목록')
	{
		$sql = 'SELECT name 
				FROM command_whattoeat_list 
				WHERE 1';
		if(!($result = $db->sql_query($sql)))
		{
			die('쿼리에 실패했습니다: ' . $sql);
		}

		while( $row = $db->sql_fetchrow($result) )
		{
			print decodeText($row['name']) . chr(10);
		}
		die();
	} // ~ $subcommand 목록

	if($subcommand == '')
	{
		$sql = 'SELECT name 
				FROM command_whattoeat_list 
				ORDER BY RAND() 
				LIMIT 1';
		if(!($result = $db->sql_query($sql)))
		{
			die('쿼리에 실패했습니다: ' . $sql);
		}
		$result = $db->sql_fetchfield('name');
		$db->sql_freeresult($result);

		$username = '뭐먹지?';
		$payload = json_encode(array(
			'text' => decodeText($result), 
			'username' => $username, 
			'channel' => $input['channel_name']
			));
		sendPostToURL($config['url'], $payload);
		die();
	} // ~ $subcommand none

	die();
}

?>