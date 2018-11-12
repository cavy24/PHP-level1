<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8" http-equiv="content-type">
	<link rel="stylesheet" href="css/style.css">
    <title><?=SITE_TITLE?></title>
</head>
<body>
<h1><?=PAGE_TITLE?></h1>

<div class = "images">
<?php
showImage("img/");
?>

</div>
<?php callEcho();?>
</body>
</html>