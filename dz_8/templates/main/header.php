<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8" http-equiv="content-type">
	<link rel="stylesheet" href="<?=WWW_ROOT?>/css/style.css">
	<title><?=$vars['title_main']?></title>
</head>
<body>
<header>
<menu>
<?php foreach ($varsHeader['menu'] as $item => $link): ?>
<a href = "<?=$link?>"><?=$item?></a>
<?php endforeach; ?>
</menu>
<a class = "del-session" href = <?=WWW_ROOT . '/?module=logout'?> >Выйти</a>
<div class = "clearfix"></div>
</header>