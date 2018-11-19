<h1><?= $vars['title'] ?></h1>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8" http-equiv="content-type">
	<link rel="stylesheet" href="<?=WWW_ROOT?>/css/style.css">
    <title><?=$vars['title_main']?></title>
</head>
<body>

<h2><?= $vars['title_h2']?></h2>

<div>
<ul>
	<li>Задание 1: <a href = <?=WWW_ROOT.'/?module=calculator'?> >файл calculator.php</a></li>
	<li>Задание 2: <a href = <?=WWW_ROOT.'/?module=calculator_new'?> >файл calculator_new.php</a></li>
	<li>Задание 3: <a href = <?=WWW_ROOT.'/?module=reviews'?> >файл reviews.php</a></li>
	<li>Задание 4</li>
</ul>
</div>
</body>
</html>

