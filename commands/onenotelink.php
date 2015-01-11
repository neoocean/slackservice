<?php

if($input['command'] == '/원노트')
{

	if($input['text'] != '')
	{
		list($argument) = explode(' ', $input['text']);
	}
	if($argument == '')
	{
		die('/원노트 [링크]');
	}
	if(substr($argument, 0,7) != 'onenote')
	{
		die('원노트 링크가 아닌 것 같습니다. ㅜ_ㅜ');
	}

	$sql = 'SELECT max(id) AS id 
			FROM links 
			WHERE 1';
	if(!($result = $db->sql_query($sql)))
	{
		die('쿼리에 실패했습니다: ' . $sql);
	}
	$next_id = $db->sql_fetchfield('id') + 1;
	$db->sql_freeresult($result);

	$address = substr($argument, 11);

	$sql = 'INSERT INTO links(id, link) 
			VALUES(\'' . $next_id . '\', \'' . $address . '\');';
	if(!($result = $db->sql_query($sql)))
	{
		die('쿼리에 실패했습니다: ' . $sql);
	}

	$title = getOnenoteNoteName($address);

	$payload = json_encode(array(
		'text' 			=> '<http://slackservice.neoocean.net/link.php?l=' . $next_id . '|' . $title . '>', 
		'username' 		=> 'OneNote', 
		'channel' 		=> $input['channel_name'], 
		'icon_url' 		=> 'http://slackservice.neoocean.net/files/onenote.png', 
		'parse'			=> 'none'
		));
	sendPostToURL($config['url'], $payload);

	die();
}

?>