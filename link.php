<?php

include($config['absolute_path'] . 'config.php');
include($config['absolute_path'] . 'includes/mysql.php');
include($config['absolute_path'] . 'includes/functions.php');
include($config['absolute_path'] . 'includes/initialize.php');
include($config['absolute_path'] . 'includes/log.php');

if($t = '')
{
	die();
}

$sql = 'SELECT link 
		FROM links 
		WHERE id = \'' . $input['link'] . '\';';
if(!($result = $db->sql_query($sql)))
{
	die('쿼리에 실패했습니다: ' . $sql);
}
$link = $db->sql_fetchfield('link');
$db->sql_freeresult($result);

header('Location: onenote:///' . $link);
?>

<script language="javascript" type="text/javascript"> 
<!--
function windowClose()
{
	window.top.close();
} 
window.onload = windowClose 
-->
</script>

<?php
die();
?>
