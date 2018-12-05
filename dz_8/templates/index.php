<?php require_once LIB_DIR. 'module/main/header.php'; ?>

<h2><?= $vars['title_h2']?></h2>

<div>
<p>Вы находитесь на главной странице сайта!</p>
<p>Чтобы перейти на другую страницу, воспользуйтесь Меню</p>
<p>или наберите нужный адрес через GET-запрос.</p>
<p>*Для доступа к страницам админа, например <a href = "<?=WWW_ROOT . '?module=admin'?>">admin.php</a> нужно войти под логином админа.</p>
<?php
//echo "<br>" . '$_SESSION' . "<br>";
//var_dump($_SESSION);
?>
</div>
<?php require_once LIB_DIR. 'module/main/footer.php'; ?>

