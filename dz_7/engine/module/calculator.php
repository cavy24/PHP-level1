<?php

require_once LIB_DIR . 'calculator.php';
require_once LIB_DIR . 'functions.php';

$vars = [
    'title_main' => 'Задание 1',
    'title_h2' => 'Калькулятор',
    'result' => calculator(checkValue($_POST['firstNum']), checkValue($_POST['secondNum']), checkValue($_POST['operation']))
];

require_once TPL_DIR . 'calculator.php';
