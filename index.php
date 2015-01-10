<?php

include('./config.php');
include('./includes/mysql.php');
include('./includes/functions.php');
include('./includes/initialize.php');
include('./includes/auth.php');
include('./includes/log.php');

include('./commands/dice.php');
include('./commands/whattoeat.php');
include('./commands/onenotelink.php');
include('./commands/users.php');

die('아무것도 실행되지 않았습니다.');

?>