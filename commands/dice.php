<?php

if($input['command'] == '/주사위')
{
	if($input['text'] != '')
	{
		$argument = intval($input['text']);
	}
	else
	{
		$argument = 100;
	}

	$realname = '\'' . decodeText(getRealnameByUsername($input['user_name'])) . '\'님의 주사위';

	$payload = json_encode(array(
		'text' => 		rand(1, $argument) . ' / ' . $argument, 
		'username' => 	$realname, 
		'channel' => 	$input['channel_name'] 
		), JSON_UNESCAPED_UNICODE);
	sendPostToURL($config['url'], $payload);
	die();
}

?>