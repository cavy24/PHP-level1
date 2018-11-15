<?php
define('SITE_ROOT', '../');
define('WWW_ROOT', SITE_ROOT . 'public');

/* DB config */
define('HOST', '127.0.0.1:3306');
define('USER', 'root');
define('PASS', 'mysql240718');
define('DB', 'galery');

define('DATA_DIR', SITE_ROOT . 'data');
define('VAR_DIR', SITE_ROOT . 'var/');
define('LIB_DIR', SITE_ROOT . 'engine/');
define('TPL_DIR', SITE_ROOT . 'templates/');
define('IMG_DIR', WWW_ROOT . '/img/');

define('SITE_TITLE', 'Урок 5');

require_once LIB_DIR . 'functions.php';
require_once LIB_DIR . 'db.php';

