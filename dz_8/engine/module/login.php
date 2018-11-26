<?php
$vars = [];
// если уже залогинен, то выбрасываем на главную
if(alreadyLoggedIn()){
    header('Location: /src/public');
}

// если есть куки, то авторизуем сразу
//if(checkAuthWithCookie()){
	//header('Location: /');
//}
// иначе пробуем авторизовать по логину и паролю
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST'){

    if(!authWithCredentials()){
        $error = 'Неправильный логин/пароль';
    }
    else{
		if($_SESSION['user'] === 'admin') {
		header('Location: /src/public/?module=admin');	
		} else {
		header('Location: /src/public/?module=account');
		}
    }
}

$vars = [
    'errors' => $error
];

require_once TPL_DIR. 'login.php';
