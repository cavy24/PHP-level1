<?php

require_once LIB_DIR . 'calculator.php';
require_once LIB_DIR . 'functions.php';

$vars = [
    'title_main' => 'Задание 2',
    'title_h2' => 'Калькулятор NEW',
    //'result' => calculator_new(checkValue($_POST['firstNum']), checkValue($_POST['secondNum']), checkValue($_POST['operation']))
];

require_once TPL_DIR . 'calculator_new.php';
