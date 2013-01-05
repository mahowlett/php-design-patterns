<?php 
//http://www.fluffycat.com/PHP-Design-Patterns/PHP-OO-Interface-Basics/
interface animalHello {
	
	function sayHello();

}

interface animalGoodbye {
	
	function sayGoodbye();

}

Class human implements animalHello, animalGoodbye{
		
	public function sayHello() {
		printf("Hello <br>");
	}

	public function sayGoodbye() {
		printf("See ya <br>");
	}

}

Class cat implements animalHello, animalGoodbye{
		
	public function sayHello() {
		printf("here puss pusss puss <br>");
	}

	public function sayGoodbye() {
		printf("Woof! <br>");
	}

}

$me =  new human();

$me->sayHello();
$me->sayGoodbye();

$cat =  new cat();

$cat->sayHello();
$cat->sayGoodbye();
