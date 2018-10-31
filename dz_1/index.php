<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8" http-equiv="content-type">
    <title>Lesson 1</title>
</head>
<body>
<?php
	echo "Задание 2" . "<br />";
	echo "<hr>";
	$word1 = 'Hello';
	$word2 = 'World';
	echo $word1 . ", " . $word2 . "!";
	$myName = "Lena";
	echo "<br />";
	echo "Hello, $myName!";
	define('MY_SYTE', 'vakulenko-php1.loc');
	echo "<br />";
	echo "Мой сайт: " . MY_SYTE;
	$r_n = "<br />";
	$int10 = 42;
	$int2 = "0b101010";
	$int8 = "052";
	$int16 = "0x2A";
	echo $r_n . "Число десятеричной системы счисления $int10 в двоичной системе равно $int2," . $r_n . "в восьмеричной $int8, а в шестнадцатеричной $int16";
	$precise1 = 1.5;
	$precise2 = 1.5e4;
	$precise3 = 6E-8;
	echo $r_n . "$precise1 | $precise2 | $precise3";
	$a = 1;
	echo $r_n . '$a';
	echo $r_n . "$a";
	$b = 10;
	$c = (boolean)$b;
	echo $r_n;
	var_dump($c);
	var_dump("$c");
	echo $r_n;
	echo $r_n;
	$x = 25;
	$y = 5;
	echo "Математические операции:" . $r_n;
	echo $x + $y . $r_n;
	echo $x - $y . $r_n;
	echo $x * $y . $r_n;
	echo $x / $y . $r_n;
	echo $x % $y . $r_n;
	echo $x * $y;
	echo $x += $y;
	echo $r_n;
	echo $x /= $y;
	$d = 1;
	$e = 2;
	echo $r_n;
	echo $d++ . $r_n;
	echo $d . $r_n;
	echo --$e . $r_n;
	echo $e . $r_n;
	echo "Операции сравнения:" . $r_n;
	$f = 5;
	$g = 5.0;
	var_dump($f == $g);
	echo $r_n;
	var_dump($f === $g);
	echo $r_n;
	var_dump($f > $g);
	echo $r_n;
	var_dump($f < $g);
	echo $r_n;
	var_dump($f <> $g);
	echo $r_n;
	var_dump($f != $g);
	echo $r_n;
	var_dump($f !== $g);
	echo $r_n;
	echo "Задание 3" . "<br />";
	echo "<hr>";
	$h = 5;
	$i = '05';
	var_dump($h == $i);//true, PHP сравнивает только по значению
	echo "<br />";
	var_dump((int)'012345');//PHP привёл строку к целочисленному значению, по умолчанию в десятеричной системе счисления
	echo "<br />";
	var_dump((float)123.0 === (int)123.0);// false, потому что типы сравнимаемых значений разные 
	echo "<br />";
	echo (int)'hello, world';
	echo "<br />";
	var_dump((int)0 === (int)'hello, world');//true, потому что PHP пытается перевести строку в число, получает false, а false это 0
	echo "Задание 4" . "<br />";
	echo "<hr>";
	$sourse = 'http://vakulenko-php1.loc/index1.php';
	echo "Для просмотра решения перейдите, пожалуйста, по ссылке: <a href = {$sourse} target = '_blank'>{$sourse}</a>";
	echo "<br />" . "<br />";
	echo "Задание 5" . "<br />";
	echo "<hr>";
	$a1 = 1;
	$b1 = 2;
	$a1 = 2;
	$b1 = 1;
	echo "<br />" . $a1 . " " . $b1;
	
?>
</body>
</html>
