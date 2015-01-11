<?php

$hour = intval(date('G')) +9;
if($hour > 23) // gmt + 900
{
	$hour = $hour - 24;
}

echo '현재시각: ' . $hour;

$log['command'] = encodeText('scheduled');
$log['text'] = encodeText('dotapgogi');

$sql = 'INSERT INTO logs (timestamp, token, team_id, channel_id, channel_name, user_id, user_name, command, text)
		VALUES(\'' . time() . '\', \'' . $input['token'] . '\', \'' . $input['team_id'] . '\', \'' . $input['channel_id'] . '\', \'' . $input['channel_name'] . '\', \'' . $input['user_id'] . '\', \'' . $input['user_name'] . '\', \'' . $log['command'] . '\', \'' . $log['text'] . '\')';
if(!($result = $db->sql_query($sql)))
{
	die('쿼리에 실패했습니다: ' . $sql);
}

if($hour == 12)
{
	$payload = json_encode(array(
		'text' => '도탑전기 플레이어 여러분. 점심 고기 드실 시간입니다.', 
		'username' => '도탑고기', 
		'channel' => '#random'
		));
	sendPostToURL($config['url'], $payload);
}

if($hour == 18)
{
	$payload = json_encode(array(
		'text' => '도탑전기 플레이어 여러분. 저녁 고기 드실 시간입니다.', 
		'username' => '도탑고기', 
		'channel' => '#random'
		));
	sendPostToURL($config['url'], $payload);
}

?>