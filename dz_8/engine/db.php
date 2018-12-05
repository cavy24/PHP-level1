<?php

require_once SITE_ROOT . 'config/config.php';

function getMaxValueFromDB($param, $table, $db) {
	$sqlmaxValue = "select max({$param}) from `{$table}`;";
	$value = getRowResult($sqlmaxValue, $db);
	$maxValue = (int)$value["max({$param})"];
	return $maxValue;
}

/*Получение массива значений из ДБ*/
function getAssocResult($sql, $database){
    $result = executeQuery($sql, $database);

    $arrayResult = array();
    while($row = mysqli_fetch_assoc($result))
        $arrayResult[] = $row;

    return $arrayResult;
}

/*Получение строки значений из ДБ*/
function getRowResult($sql, $database){
    $array_result = getAssocResult($sql, $database);

    if(isset($array_result[0])){
        $result = $array_result[0];
    } else {
        $result = null;
    }
    return $result;
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
	}
    if (!$db) {
        echo 'Ошибка: Невозможно установить соединение с MySQL.'. PHP_EOL;
        exit;
    }

    return $db;
}