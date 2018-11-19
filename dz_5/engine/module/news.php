<?php
/**
 * Created by PhpStorm.
 * User: legio
 * Date: 11.11.18
 * Time: 19:40
 */

$news = getAssocResult("select * from news where id = ". $_GET['id']);


$vars = [
    'title' => 'Наши новости',
    'news' => $news,
];

require_once TPL_DIR . 'news.php';