<?php
function calculator($num1, $num2, $operation) {
	$num1 = (int)$num1;	
	$num2 = (int)$num2;
	switch($operation) {
		case '+': return $num1 + $num2;
		case '-': return $num1 - $num2;
		case '*': return $num1 * $num2;
		case '/': if($num2 !== 0) return $num1 / $num2;
	}
}