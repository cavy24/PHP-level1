<?php
require_once 'functions.php';
require_once 'db.php';
// блок функций авторизации
/**
 * валидация пользовательского куки
 * @return bool
 */
function checkAuthWithCookie(){
    $result = false;

    if(isset($_COOKIE['id_user']) && isset($_COOKIE['cookie_hash'])){
        $userId = (int)$_COOKIE['id_user'];
        // получаем данные пользователя по id

        $sql = "SELECT id, login, password FROM user WHERE id = '".$userId."'";
        $user = getRowResult($sql, DB_USER);

        if(null !== $user) {
            if(($user['password'] !== $_COOKIE['user_hash']) || ($user['id'] !== $_COOKIE['id_user'])){
                setcookie('id_user', '', time() - 3600*24*30*12);
                setcookie('user_hash', '', time() - 3600*24*30*12);
            }
            else{
                header('Location: /');
            }
        }


    }

    return $result;
}

/**
 * авторизация через логин и пароль
 */
function authWithCredentials(){
    $db = connect(DB_USER);
	$username = escapeString($db, $_POST['username']);
    $password = $_POST['password'];
	// получаем данные пользователя по логину
    $sql = "SELECT id, login, password FROM user WHERE login = '".$username."'";
    $user = getRowResult($sql, DB_USER);
	// проверяем соответствие логина и пароля
    if(null === $user) {
        $isAuth = false;
    } else {
        $isAuth = checkPassword($password, $user['password']);
    }

    if($isAuth) {

        // сохраним данные в сессию
        $_SESSION['user'] = $user['login'];
		$sql = "select `id` from user where `login` = '{$_SESSION['user']}'";
		$userId = getRowResult($sql, DB_USER);
		$_SESSION['user_id'] = $userId['id'];
    }
    return $isAuth;
}

/**
 * @param string $password
 *
 * @return string
 */
function hashPassword(string $password): ?string
{

    $salt = md5(SALT);
    $salt = substr(base64_encode($salt), 0, 22);
    return crypt($password, $salt);
}

/**
 * Сверяем введённый пароль и хэш
 *
 * @param $password 3456
 * @param $hash
 *
 * @return bool
 */
function checkPassword($password, $hash){
    return hashPassword($password) === $hash;
}

function alreadyLoggedIn(){
    return isset($_SESSION['user']);
}
