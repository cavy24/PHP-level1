document.addEventListener('DOMContentLoaded', addSign);

function addSign() {
	let options = document.querySelectorAll(".place-option");
	options.forEach(option => option.addEventListener('click', function(e) {
	e.preventDefault();
	let sign = this.value;
	calculator(sign);
	//return sign;
	}));
};

function calculator(val) {
	let numbers = document.querySelectorAll(".place-number");
	console.log(numbers);
	let number1 = +numbers[0].value;
	let number2 = +numbers[1].value;
	let numAdd = 0;
	if(isNumeric(number1) && isNumeric(number2)) {
	switch(val) {
		case '+': numAdd = number1 + number2; break;
		case '-': numAdd = number1 - number2; break;
		case 'X': numAdd = number1 * number2; break;
		case '/': if(number2 !== 0) numAdd = number1 / number2; else numAdd = "На ноль делить нельзя!";
	};
	};
	let placeResult = document.querySelector(".place-result");
	placeResult.value = "Ответ: " + numAdd;
};

function isNumeric(num) {
  return !isNaN(parseFloat(num)) && isFinite(num);
}

