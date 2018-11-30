<?php

/*Считаем общую сумму заказа*/
function addSumArrValues($func) {
	$arrValues = $func;
	//echo '$arrValues' . "  ";
	//var_dump($arrValues);
	if(empty($arrValues)) return 0;
	foreach ($arrValues as $value) {
		$sumArrValues[] = (int)$value['price'] * (int)$value['amount'];
	}
	return array_sum($sumArrValues);
}

/*Функция проверки входных данных*/
function checkValue($value) {
	return trim((string)htmlspecialchars(strip_tags($value)));
}

function escapeString($db, $str) {
    return mysqli_real_escape_string($db, htmlspecialchars(strip_tags($str)));
}

/**
 * Записываем лог в файл /var/logs_{$suffix}.log
 * @param mixed  $s
 * @param string $suffix
 *
 * @return mixed|string
 */
function _log($s, $suffix = '')
{
    if (is_array($s) || is_object($s)) {
        $s = print_r($s, 1);
    }

    $s = '### '.date('d.m.Y H:i:s')."\r\n".$s."\r\n\r\n\r\n";

    if ($suffix !== '') {
        $suffix = '_'.$suffix;
    }

    _writeToFile(VAR_DIR. 'logs'.$suffix.'.log', $s, 'a+');

    return $s;
}

/**
 * Записывает контент в переданный файл
 * нужные директории создаются автоматически
 * @param string $fileName
 * @param string $content
 * @param string $mode
 *
 * @return bool
 */
function _writeToFile($fileName, $content, $mode = 'w')
{
    $dir = mb_substr($fileName, 0, strrpos($fileName, '/'));

    if (!is_dir($dir)) {
        _makeDir($dir);
    }

    if ($mode !== 'r') {
        $fh = fopen($fileName, $mode);
        if (fwrite($fh, $content)) {
            fclose($fh);
            @chmod($fileName, 0644);//ф-ция, устанавливающая права

            return true;
        }
    }

    return false;
}

/**
 * Создание директории
 * @param string $dir
 * @param bool   $is_root
 * @param string $root
 *
 * @return bool|string
 */
function _makeDir($dir, $is_root = true, $root = '')
{

    $dir = rtrim($dir, '/');
    if (is_dir($dir)) {
        return true;
    }

    if ($is_root) {
        $dir  = str_replace($_SERVER['DOCUMENT_ROOT'], '', $dir);
        $root = $_SERVER['DOCUMENT_ROOT'];
    }
    $dir_parts = explode("/", $dir);

    foreach ($dir_parts as $step => $value) {
        if ($value !== '') {
            $root = $root.'/'.$value;
            if (!is_dir($root)) {
                if (!mkdir($root, 0755) && !is_dir($root)) {
                    throw new \RuntimeException(sprintf('Directory "%s" was not created', $root));
                }
                chmod($root, 0755);
            }
        }
    }

    return $root;
}

?>