<?php

require_once LIB_DIR . 'db.php';

$image = getAssocResult("select * from images where id = " . $_GET['id'], DB_IMG);

$counter = executeQuery("update images set counter = counter + 1 where id = " . $_GET['id'], DB_IMG);
$counter_image = getAssocResult("select `counter` from images where id = " . $_GET['id'], DB_IMG);

$vars = [
    'title_main' => 'Картина во весь экран',
     'image' => $image
];

/*echo "<pre>";
print_r($counter_image);
echo "</pre>";*/
require_once TPL_DIR . 'image.php';