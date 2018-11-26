<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8" http-equiv="content-type">
	<link rel="stylesheet" href="<?=WWW_ROOT?>/css/style.css">
    <title><?=$vars['title_main']?></title>
</head>
<body>
<p>Создать форму-калькулятор операциями: сложение, вычитание, умножение, деление. Не забыть обработать деление на ноль! Выбор операции можно осуществлять с помощью тега select </p>
<h2><?= $vars['title_h2']?></h2>

<div class = "">

<form action = "" method = "post">
<input class = "place-number" type = "text" name = "firstNum" />
<select name = "operation">
<option>+</option>
<option>-</option>
<option>*</option>
<option>/</option>
</select>
<input class = "place-number" type = "text" name = "secondNum" />
<input type = "submit" value = "Равно" />
<input type = "text" name = "result" value = "Ответ: <?=$vars['result']?>" />
</form>
<?php 
//print ($vars['result']);
echo "<pre>";
var_dump($_POST);
echo "</pre>";
echo "<br>";
print($_POST['operation']);
?>
</div>
</body>
</html>
