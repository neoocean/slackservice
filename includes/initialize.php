<?php

if( is_array($_POST) )
{
	while( list($k, $v) = each($_POST) )
	{
		if( is_array($_POST[$k]) )
		{
			while( list($k2, $v2) = each($_POST[$k]) )
			{
				$_POST[$k][$k2] = addslashes($v2);
			}
			@reset($_POST[$k]);
		}
		else
		{
			$_POST[$k] = addslashes($v);
		}
	}
	@reset($_POST);
}

$token = $_POST['token'];
$team_id = $_POST['team_id'];
$channel_id = $_POST['channel_id'];
$channel_name = '#' . $_POST['channel_name'];
$user_id = $_POST['user_id'];
$user_name = $_POST['user_name'];
$command = $_POST['command'];
$text = $_POST['text'];

$db = new sql_db(
	$config['db_host'], 
	$config['db_user'], 
	$config['db_password'], 
	$config['db_name'], 
	false);
if(!$db->db_connect_id)
{
	die('Could not connect to the database');
}

?>