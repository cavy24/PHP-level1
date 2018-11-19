<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8" http-equiv="content-type">
	<link rel="stylesheet" href="<?=WWW_ROOT?>/css/style.css">
    <title><?=$vars['title_main']?></title>
</head>
<body>

<h2><?=$vars['image'][0]['name']?></h2>

<div class = "image-one">

    <p><img src = <?=IMG_DIR?><?=$vars['image'][0]['path']?>> </p>
	<p class = "image-one-count">Количество просмотров картины&nbsp;<?=$_GET['id']?>:&nbsp;<?=$counter_image[0]['counter']?></p>
    
</div>
</body>
</html>
