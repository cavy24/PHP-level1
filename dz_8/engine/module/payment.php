<?php
$payments = [
	'Qiwi',
	'Яндекс',
	'WebMany',
	'Visa',
	'Mastercard'];

$vars = [
	'payments' => $payments
];

require_once TPL_DIR. 'payment.php';