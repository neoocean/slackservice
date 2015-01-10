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

	$result = rand(0, $argument) . ' / ' . $argument;
	$username = '\'' . $user_name . '\' 님의 주사위';

	$payload = json_encode(array(
		'text' => $result, 
		'username' => $username, 
		'channel' => $input['channel_name']
		));
	sendPostToURL($config['url'], $payload);
	die();
}

?>