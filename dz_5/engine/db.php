<?php


function getAssocResult($sql){
    $result = executeQuery($sql);

    $arrayResult = array();
    while($row = mysqli_fetch_assoc($result))
        $arrayResult[] = $row;

    return $arrayResult;
}

//Функция выполнения запроса к БД
function executeQuery($sql){
    $db = connect();
    $result = mysqli_query($db, $sql);
    mysqli_close($db);
    return $result;
}

//Функция соединения с БД
function connect() {
    $db = mysqli_connect(HOST, USER, PASS, DB);

    if (!$db) {
        echo 'Ошибка: Невозможно установить соединение с MySQL.'. PHP_EOL;
        exit;
    }

    return $db;
}
