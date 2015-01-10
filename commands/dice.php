<?php

if($command == '/주사위')
{
	$result = rand(0, 100);
	$username = '\'' . $user_name . '\' 님이 굴린 주사위';

	$payload = json_encode(array(
		'text' => $result, 
		'username' => $username, 
		'channel' => $channel_name
		));
	sendPostToURL($config['url'], $payload);
	die();
}

?>