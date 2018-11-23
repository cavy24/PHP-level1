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
	<li>Задание 1: <a href = <?=WWW_ROOT.'/?module=bascket'?> >файл bascket.php</a></li>
	<li>Задание 2: <a href = <?=WWW_ROOT.'/?module=product&id=1'?> >файл product.php</a></li>
</ul>
<a href = <?=WWW_ROOT . '/?module=logout'?> >Закончить сессию</a>
</div>
</body>
</html>

