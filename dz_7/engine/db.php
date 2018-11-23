<?php

require_once SITE_ROOT . 'config/config.php';

function getAssocResult($sql, $database){
    $result = executeQuery($sql, $database);

    $arrayResult = array();
    while($row = mysqli_fetch_assoc($result))
        $arrayResult[] = $row;

    return $arrayResult;
}

//Функция выполнения запроса к БД
function executeQuery($sql, $database){
    $db = connect($database);
    $result = mysqli_query($db, $sql);
    mysqli_close($db);
    return $result;
}

//Функция соединения с БД
function connect($database) {
    $db = mysqli_connect(HOST, USER, PASS, $database);
	mysqli_set_charset($db, "utf8");
	if (!mysqli_set_charset($db, "utf8")) {
    printf("Ошибка при загрузке набора символов utf8: %s\n", mysqli_error($db));
	}/* else echo "Текущий набор символов: " . mysqli_character_set_name($db);*/
	
	//printf("Изначальная кодировка: %s\n", $mysqli->character_set_name($db));
    if (!$db) {
        echo 'Ошибка: Невозможно установить соединение с MySQL.'. PHP_EOL;
        exit;
    }

    return $db;
}

function getRowResult($sql, $database){
    $array_result = getAssocResult($sql, $database);

    if(isset($array_result[0])){
        $result = $array_result[0];
    } else {
        $result = null;
    }


    return $result;
}