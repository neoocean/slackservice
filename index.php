<?php

include($config['absolute_path'] . 'config.php');
include($config['absolute_path'] . 'includes/mysql.php');
include($config['absolute_path'] . 'includes/functions.php');
include($config['absolute_path'] . 'includes/initialize.php');
include($config['absolute_path'] . 'includes/auth.php');
include($config['absolute_path'] . 'includes/log.php');

include($config['absolute_path'] . 'commands/dice.php');
include($config['absolute_path'] . 'commands/whattoeat.php');
include($config['absolute_path'] . 'commands/onenotelink.php');
include($config['absolute_path'] . 'commands/users.php');

die('아무것도 실행되지 않았습니다.');

?>