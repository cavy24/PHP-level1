<?php require_once LIB_DIR. 'module/main/header.php'; ?>
<h2><?= $vars['title_h2']?></h2>

<div class = "reviews">
<div class = "review-all">
<form action = "" method = "post">
<?php foreach ($vars['reviews'] as $review): ?>
    <h4><?= $review['name'] ?></h4>
    <p><?= $review['text'] ?> </p>
    <p><?= $review['created_at'] ?></p>
	<input type = "hidden" name = "id" value = <?= $review['id'] ?> />
	<input class = "reviews-btn" type = "submit" value = "Удалить отзыв" name = "delreview" />
<?php endforeach;?>
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
<?php require_once LIB_DIR. 'module/main/footer.php'; ?>
