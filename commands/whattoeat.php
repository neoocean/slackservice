<?php

if($command == '/뭐먹지')
{
	$case = rand(0, 3);
	switch($case)
	{
		case 0: 
			$result = 'DTC';
			break;
		case 1: 
			$result = '햄버거';
			break;
		case 2: 
			$result = '육계장';
			break;
		case 3: 
			$result = '보쌈';
			break;
		default:
			$result = '엠텍 지하';
	}
	
	$username = '뭐먹지?';

	$payload = json_encode(array(
		'text' => $result, 
		'username' => $username, 
		'channel' => $channel_name
		));
	sendPostToURL($config['url'], $payload);
	die();
}

?>