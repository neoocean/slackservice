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

if( is_array($_GET) )
{
	while( list($k, $v) = each($_GET) )
	{
		if( is_array($_GET[$k]) )
		{
			while( list($k2, $v2) = each($_GET[$k]) )
			{
				$_GET[$k][$k2] = addslashes($v2);
			}
			@reset($_GET[$k]);
		}
		else
		{
			$_GET[$k] = addslashes($v);
		}
	}
	@reset($_GET);
}

$input['token'] = $_POST['token'];
$input['team_id'] = $_POST['team_id'];
$input['channel_id'] = $_POST['channel_id'];
$input['channel_name'] = '#' . $_POST['channel_name'];
$input['user_id'] = $_POST['user_id'];
$input['user_name'] = $_POST['user_name'];
$input['command'] = $_POST['command'];
$input['text'] = $_POST['text'];

$input['link'] = $_GET['l'];

$db = new sql_db(
	$config['db_host'], 
	$config['db_user'], 
	$config['db_password'], 
	$config['db_name'], 
	false);
if(!$db->db_connect_id)
{
	die('데이터베이스에 접속할 수 없습니다.');
}

?>