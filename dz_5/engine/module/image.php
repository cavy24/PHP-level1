<?php

$image = getAssocResult("select * from images where id = " . $_GET['id']);

$counter = executeQuery("update images set `counter` = `counter` + 1 where id = " . $_GET['id']);
$counter_image = getAssocResult("select `counter` from images where id = " . $_GET['id']);

$vars = [
    'title_main' => 'Картина во весь экран',
    'title_h2' => 'Картина ',
    'image' => $image
];

/*echo "<pre>";
print_r($counter_image);
echo "</pre>";*/
require_once TPL_DIR . 'image.php';