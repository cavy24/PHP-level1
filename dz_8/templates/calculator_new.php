<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8" http-equiv="content-type">
	<link rel="stylesheet" href="<?=WWW_ROOT?>/css/style.css">
	
    <title><?=$vars['title_main']?></title>
</head>
<body>
<p> Создать калькулятор, который будет определять тип выбранной пользователем операции, ориентируясь на нажатую кнопку.</p>
<h2><?= $vars['title_h2']?></h2>

<div class = "">

<form action = "" method = "post">
<input class = "place-number" type = "text" name = "firstNum" value = "" />
<input class = "place-number" type = "text" name = "secondNum"  value = "" />
<input class = "place-option" type = "submit" value = "+" />
<input class = "place-option" type = "submit" value = "-" />
<input class = "place-option" type = "submit" value = "X" />
<input class = "place-option" type = "submit" value = "/" />
<input type = "text" class = "place-result" name = "result" value = "Ответ: <?=$vars['result']?>" />
</form>

<?php 
//print ($vars['result']);
/*echo "<pre>";
var_dump($_POST);
echo "</pre>";
echo "<br>";
print($_POST['operation']);*/
?>
</div>
<script src = "<?=WWW_ROOT?>/js/calculator_new.js"></script>
</body>
</html>
