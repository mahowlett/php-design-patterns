<?php 
Class exampleClass {

	private $name = null;
	private static $lineBreak = "\n";
	
	public function __construct($myName){
		$this->name = $myName;
	}

	public function getName(){
		return $this->name;
	}
	
	public function sayHello() {
		printf("Hello ".$this->name.self::$lineBreak);
	}

}

$me =  new exampleClass('Mark');

$me->sayHello();

