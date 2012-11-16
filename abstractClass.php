<?php 

abstract Class animalHello {
	
	protected $name = null;
	protected static $lineBreak = "\n";

	public function __construct($name){
		$this->name = $name;
	}

	//abstract public function getName(){
	//	return $this->name;
	//}

	abstract protected function sayHello();

}
Class humanHello extends animalHello{
		
	public function sayHello() {
		printf("Hello ".$this->name.self::$lineBreak);
	}

}

Class catHello extends animalHello{
		
	public function sayHello() {
		printf("here puss pusss puss, here ".$this->name.self::$lineBreak);
	}

}

$me =  new humanHello('Mark');

$me->sayHello();

$cat =  new catHello('Rufus');

$cat->sayHello();

