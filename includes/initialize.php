<?php

$token = $_POST['token'];
$team_id = $_POST['team_id'];
$channel_id = $_POST['channel_id'];
$channel_name = '#' . $_POST['channel_name'];
$user_id = $_POST['user_id'];
$user_name = $_POST['user_name'];
$command = $_POST['command'];
$text = $_POST['text'];

if($team_id != $config['team_id'])
{
	die();
}

?>