<?php

$log['command'] = encodeText($input['command']);
$log['text'] = encodeText($input['text']);

$sql = 'INSERT INTO logs (timestamp, token, team_id, channel_id, channel_name, user_id, user_name, command, text)
		VALUES(\'' . time() . '\', \'' . $input['token'] . '\', \'' . $input['team_id'] . '\', \'' . $input['channel_id'] . '\', \'' . $input['channel_name'] . '\', \'' . $input['user_id'] . '\', \'' . $input['user_name'] . '\', \'' . $log['command'] . '\', \'' . $log['text'] . '\')';
if(!($result = $db->sql_query($sql)))
{
	die('쿼리에 실패했습니다: ' . $sql);
}

?>