<?php

require_once LIB_DIR . 'reviews.php';

$vars = [
    'title_main' => 'Задание 3',
    'title_h2' => 'Отзывы',
    'title_h3' => 'Оставьте отзыв',
    'review' => updateBase($_POST),
	'reviews' => showReviews()
];

require_once TPL_DIR . 'reviews.php';
