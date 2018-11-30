<?php

$images = getAssocResult("select * from images order by counter desc");

$vars = [
    'title_main' => 'Картинная галерея',
    'title_h2' => 'Картины',
    'images' => $images	
];

/*echo "<pre>";
print_r($vars['images']);
echo "</pre>";*/

require_once TPL_DIR . 'images.php';
