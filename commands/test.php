<?php

if($input['command'] == '/테스트')
{

	if($input['text'] != '')
	{
		list($subcommand, $argument) = explode(' ', $input['text'], 2);
	}

	print_r($input);

	$payload = json_encode(array(
		'text' => 		'test command', 
		'username' => 	'test', 
		'channel' => 	'#testprivategroup' 
		), JSON_UNESCAPED_UNICODE);
	sendPostToURL($config['url'], $payload);

	die();

}


?>