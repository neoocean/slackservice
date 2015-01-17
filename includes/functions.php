<?php

function sendPostToURL($url, $string)
{
	$ch = curl_init($url);
	
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $string);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 0);
	curl_setopt($ch, CURLOPT_HEADER, 0);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

	return(curl_exec($ch));
}

function getRealnameByUsername($username)
{
	global $db;

	$sql = 'SELECT realname 
			FROM users 
			WHERE name = \'' . $username . '\' 
			LIMIT 1;';
	if(!($result = $db->sql_query($sql)))
	{
		die('쿼리에 실패했습니다: ' . $sql);
	}
	$realname = $db->sql_fetchfield('realname');
	$db->sql_freeresult($result);

	return($realname);
}

function decodeText($text)
{
	return(urldecode(base64_decode($text)));
}
function encodeText($text)
{
	return(base64_encode(urlencode($text)));
}

function getOnenoteNoteName($address)
{

	if(strpos($address, '.one') === false)
	{
		// address targets to a note
		$address = str_replace('\\\\', '\\', $address);
		$title = $address;
	}
	else
	{
		// address targets to a section.
		$end = strpos($address, '.one');
		$begin = strrpos($address, '\\') + 1;

		$section = substr($address, $begin, ($end - $begin));
		$section = str_replace('%20', ' ', $section);

		$end = strpos($address, '&section-id=');
		$begin = strpos($address, '.one#') + 5;

		$note = substr($address, $begin, ($end - $begin));
		$note = str_replace('%20', ' ', $note);

		if($note == '')
		{
			$title = $section;
		}
		else
		{
			$title = $section . ' / ' . $note;
		}		
	}

	return($title);
}

?>