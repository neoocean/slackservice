<?php

if($input['command'] == '/테스트')
{

	if($input['text'] != '')
	{
		list($subcommand, $argument) = explode(' ', $input['text'], 2);
	}

	print_r($input);

	die();

}


?>