<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8" http-equiv="content-type">
	<link rel="stylesheet" href="<?=WWW_ROOT?>/css/style.css">
    <title><?=$vars['title_main']?></title>
</head>
<body>

<h2><?= $vars['title_h2']?></h2>

<div class = "images">
<?php foreach ($vars['images'] as $image): ?>
	<div class = "images-wrapper">
	<p>Просмотры:&nbsp;<?=$image['counter']?></p>
    <p class = "p-img"><img src = <?=IMG_DIR?><?=$image['path']?> </p>
	<h3><?= $image['name'] ?></h3>
    </div>
<?php endforeach; ?>
</div>
</body>
</html>
