<?php

$vars = [
    'title_head' => 'Главная сраница сайта',
    'title_h2' => 'Домашняя работа'
];

var_dump($_POST);
echo "<br>SESSION: ";
var_dump($_SESSION);
require_once TPL_DIR. 'index.php';


