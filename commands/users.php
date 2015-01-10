<?php

if($input['command'] == '/사용자')
{
	if($input['text'] != '')
	{
		list($subcommand, $user_name, $user_realname) = explode(' ', $input['text']);
	}

	if($subcommand == '추가')
	{
		if(!$user_name)
		{
			die('사용자 아이디를 알려주세요: /사용자 추가 아이디 이름');
		}
		if(!$user_realname)
		{
			die('사용자 이름을 알려주세요: /사용자 추가 아이디 이름');
		}

		// 같은 이름이 있는지 확인
		$sql = 'SELECT id 
				FROM users 
				WHERE name = \'' . $user_name . '\';';
		if(!($result = $db->sql_query($sql)))
		{
			die('쿼리에 실패했습니다: ' . $sql);
		}
		if($db->sql_numrows() > 0)
		{
			$exists = true;
		}
		else
		{
			exists = false;
		}

		// 추가
		if($exists == false)
		{
			$sql = 'SELECT max(id) AS id 
					FROM users 
					WHERE 1';
			if(!($result = $db->sql_query($sql)))
			{
				die('쿼리에 실패했습니다: ' . $sql);
			}
			$next_id = $db->sql_fetchfield('id') + 1;
			$db->sql_freeresult($result);
			$sql = 'INSERT INTO ' . $config['db_name'] . '(id, name, realname) 
					VALUES(\'' . $next_id . '\', \'' . $user_name . '\', \'' . $user_realname . '\');';
			if(!($result = $db->sql_query($sql)))
			{
				die('쿼리에 실패했습니다: ' . $sql);
			}
			die('사용자를 추가했습니다.');
		}

		// 수정
		if($exists == true)
		{
			$sql = 'UPDATE users 
					SET name = ' . $user_name . ', 
						realname = ' . $user_realname . ' 
					WHERE name = ' . $user_name . ' 
					LIMIT 1;';
			if(!($result = $db->sql_query($sql)))
			{
				die('쿼리에 실패했습니다: ' . $sql);
			}
			die('사용자를 수정했습니다.');
		}
	} // ~ $subcommand 추가

	if($subcommand == '삭제')
	{
		if(!$user_name)
		{
			die('사용자 아이디를 알려주세요: /사용자 삭제 아이디');
		}

		$sql = 'DELETE FROM users 
				WHERE name = ' . $user_name . ' 
				LIMIT 1;';
		if(!($result = $db->sql_query($sql)))
		{
			die('쿼리에 실패했습니다: ' . $sql);
		}
		die('사용자를 삭제했습니다.');
	} // ~ $subcommand 삭제

}
?>