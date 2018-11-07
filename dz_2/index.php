<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8" http-equiv="content-type">
    <title>Lesson 2</title>
</head>
<body>
<?php
echo "Задание 1" . "<br>";
echo "<hr>";
    $a = 15;
	$b = -5;
	if ($a >= 0 && $b >= 0) {
		echo $a - $b;
	}
	if ($a < 0 && $b < 0) {
		echo $a * $b;
	}
	else {
		echo $a + $b;
	}
	
echo "<br><br>" . "Задание 2" . "<br>";
echo "<hr>";
	$a1 = 5;
	switch($a1) {
		case 0:
            echo "0 ";
		case 1:
            echo "1 ";
		case 2:
            echo "2 ";
		case 3:
            echo "3 ";
		case 4:
            echo "4 ";
		case 5:
            echo "5 ";
		case 6:
            echo "6 ";
		case 7:
            echo "7 ";
		case 8:
            echo "8 ";
		case 9:
            echo "9 ";
		case 10:
            echo "10 ";
		case 11:
            echo "11 ";
		case 12:
            echo "12 ";
		case 13:
            echo "13 ";
		case 14:
            echo "14 ";
		case 15:
            echo "15 ";
		break;
	}
	
echo "<br><br>" . "Задание 3" . "<br>";
echo "<hr>";
	function sum($a2, $b2) {
		return $a2 + $b2;
	}
	function diff($a2, $b2) {
		return $a2 - $b2;
	}
	function multipl($a2, $b2) {
		return $a2 * $b2;
	}
	function division($a2, $b2) {
		if($b2 !== 0) {
		return $a2 / $b2;
		} else {
			echo "Division by zero is impossible!";
		}
	}
	
	echo sum(2, 3) . "<br>";
	echo diff(10, 2) . "<br>";
	echo multipl(5, 2) . "<br>";
	echo division(10, 0) . "<br>";
	
echo "<br><br>" . "Задание 4" . "<br>";
echo "<hr>";

	function mathOperation($a2, $b2, $oper) {
		switch($oper) {
			case '+':
				return sum($a2, $b2);
			case '-':
				return diff($a2, $b2);
			case '*':
				return multipl($a2, $b2);
			case '/':
				return division($a2, $b2);
		}
	}
	
	echo mathOperation(8, 4, '*');
	
echo "<br><br>" . "Задание 5" . "<br>";
echo "<hr>";

	echo date("d-m-Y l");

echo "<br><br>" . "Задание 6" . "<br>";
echo "<hr>";

function powRequrs($val, $pow) {
	if ($val === 0) {
		return 0;
	} else if ($val === 1 || $pow === 0) {
		return 1;
	} else if ($pow === 1) {
			return $val;
	} else if ($pow < 0) {
		return  1 / powRequrs($val, -$pow);
	} else {
		return $val * powRequrs($val, $pow - 1);
		}
	
}
echo powRequrs(5, -3);

echo "<br><br>" . "Задание 7" . "<br>";
echo "<hr>";

function getCurrentTime($currTime) {
	$time = date("h i");
	//$timeHour = date("h");
	//$timeMinute = date("i");
	$timeExplode = explode(" ", $time); 
	if($timeExplode[0] < 10) {
		//$timeExplodeHour = str_replace("0", "", $timeExplode[0]);
		$timeExplodeHour = $timeExplode[0][1];
	} else {
		$timeExplodeHour = $timeExplode[0];
	}
	switch($timeExplodeHour) {
		case ($timeExplodeHour == 1 || $timeExplodeHour == 21):
			$hours = " час ";
			break;
		case ($timeExplodeHour == 2 || $timeExplodeHour == 3 || $timeExplodeHour == 4 || $timeExplodeHour == 22 || $timeExplodeHour == 23):
			$hours = " часа ";
			break;
		default:
			$hours = " часов ";
			break;
	}
	/*if ($timeExplodeHour%100 == 0 || ($timeExplodeHour%100 >= 5 && $timeExplodeHour%100 <= 20)) {
		$hours = " часов ";
	} else if ($timeExplodeHour%10 == 1) {
		$hours = " час ";
	} else {
		$hours = " часа ";
	}*/
	$timeExplodeMinute = $timeExplode[1];
	switch($timeExplodeMinute) {
		case ($timeExplodeMinute >= 10 && $timeExplodeMinute <= 20):
			$minutes = " минут";
			break;
		case ($timeExplodeMinute[1] == 1):
			$minutes = " минута";
			break;
		case ($timeExplodeMinute[1] == 2 || $timeExplodeMinute[1] == 3 || $timeExplodeMinute[1] == 4):
			$minutes = " минуты";
			break;
		default:
			$minutes = " минут";
			break;	
	}
	/*if ($timeExplodeMinute%10 == 0 || ($timeExplodeMinute%10 >= 5 && $timeExplodeMinute%10 <= 9) || ($timeExplodeMinute%100 >= 11 && $timeExplodeMinute%100 <= 14)) {
		$minutes = " минут";
	} else if ($timeExplodeMinute%10 == 1){
		$minutes = " минута";
	} else {
		$minutes = " минуты";
	}*/
	return $currTime = "<b>Текущее время: <b> " . $timeExplodeHour . $hours . $timeExplodeMinute . $minutes;
}
echo(getCurrentTime($currTime));
?>
</body>
</html>
