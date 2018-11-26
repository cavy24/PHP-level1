<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    if(!authWithCredentials()){
        $vars['autherror'] = 'Неправильный логин/пароль';
    }
    else{
        header('Location: /');
    }
}

$vars = [];