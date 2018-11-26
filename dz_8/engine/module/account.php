<?php

//require_once LIB_DIR . 'account.php';

$vars = [
    'title_main' => 'Личный кабинет',
    'title_h2' => 'Личный кабинет',
	'greeting' => $_SESSION['user']
   ];

require_once TPL_DIR . 'account.php';