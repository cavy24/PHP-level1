<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8" http-equiv="content-type">
	<link rel="stylesheet" href="<?=WWW_ROOT?>/css/style.css">
	
    <title><?=$vars['title_main']?></title>
</head>
<body>
<p> Добавить функционал отзывов в имеющийся у вас проект.</p>
<h2><?= $vars['title_h2']?></h2>

<div class = "reviews">
<div class = "review-all">
<form action = "" method = "post">
<?php foreach ($vars['reviews'] as $review): ?>
    <h4><?= $review['name'] ?></h4>
    <p><?= $review['text'] ?> </p>
    <p><?= $review['created_at'] ?></p>
	<p name = "id"><?= $review['id'] ?></p>
	<input class = "reviews-btn" type = "submit" value = "Удалить отзыв" name = "delreview" />
<?php endforeach; ?>
</form>
</div>
<div class = "review">
<h3><?=$vars['title_h3']?>
<form action = "" method = "post">
<ul>
<li><input class = "reviews-name" type = "text" name = "name" /></li>
<li><textarea rows="6" cols="22" class = "reviews-text" name = "review"></textarea></li>
<li><input class = "reviews-text" type = "text" value = "<?=date("Y:m:d H:i:s");?> " name = "date" /></li>
<li><input class = "reviews-btn" type = "submit" value = "Добавить отзыв" name = "addreview" /></li>
</ul>
</form>
</div>

<?php 
//print ($vars['result']);
/*echo "<pre>";
var_dump($_POST);
echo "</pre>";
echo "<br>";
print($_POST);*/
?>
</div>
<script src = "<?=WWW_ROOT?>/js/calculator_new.js"></script>
</body>
</html>
