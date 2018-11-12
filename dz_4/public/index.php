<?php
require_once('../config/config.php');
require_once(TPL_DIR . "/galery.php");

/*$file = fopen(TPL_DIR . "/galery.php", "r");
$variables = ['nameSite' => SITE_TITLE];
if(!$file) {
	echo "Неправильный адрес файла";
}
while (!feof($file)) {
	$buffer .= fread($file, 1);
	//echo (str_replace());
}
echo $buffer;
fclose($file);
*/
//unlink(WWW_ROOT . "/galeryTemp.php");
/*echo (render(TPL_DIR . "/galery.php", ['nameSite' => SITE_TITLE]));
echo $_SERVER['DOCUMENT_ROOT'];*/
//echo _DIR_;