<?php
	Abstract Class PastaDish {
		protected $name;
		protected $cost;

		function __construct() {
			
		}

		function getName() {
			return $this->name;
		}

		abstract function cost();
		

	}

	Abstract Class PastaDecorator extends PastaDish{
		function getName() {
			return $this->name;
		}

	}

	Class TomatoSauce extends PastaDish {
		function __construct (){
			$this->name = "Tomato Sauce";
		}

		function cost(){
			return 2.99;
		}
	}

	Class PestoSauce extends PastaDish {
		function __construct (){
			$this->name = "Pesto Sauce";
		}

		function cost(){
			return 3.99;
		}
	}

	Class CreamSauce extends PastaDish {
		function __construct (){
			$this->name = "Cream Sauce";
		}

		function cost(){
			return 2.50;
		}
	}

	Class Spaghetti extends PastaDecorator{
		private $pastaDish;
		function __construct($pastaDish) {
			$this->pastaDish = $pastaDish;
		}

		function getName(){
			return "Spaghetti, ".$this->pastaDish->getName();
		}

		function cost(){
			return 1.00+$this->pastaDish->cost();
		}
	}

	Class Tortellini extends PastaDecorator{
		private $pastaDish;
		function __construct($pastaDish) {
			$this->pastaDish = $pastaDish;
		}

		function getName(){
			return "Tortellini, ".$this->pastaDish->getName();
		}

		function cost(){
			return 1.20+$this->pastaDish->cost();
		}
	}

	Class Tagliatelli extends PastaDecorator{
		private $pastaDish;
		function __construct($pastaDish) {
			$this->pastaDish = $pastaDish;
		}

		function getName(){
			return "Tagliatelli, ".$this->pastaDish->getName();
		}

		function cost(){
			return 1.20+$this->pastaDish->cost();
		}
	}

	Class Chicken extends PastaDecorator{
		private $pastaDish;
		function __construct($pastaDish) {
			$this->pastaDish = $pastaDish;
		}

		function getName(){
			return "Chicken, ".$this->pastaDish->getName();
		}

		function cost(){
			return 2.00+$this->pastaDish->cost();
		}
	}

	Class RoastVeg extends PastaDecorator{
		private $pastaDish;
		function __construct($pastaDish) {
			$this->pastaDish = $pastaDish;
		}

		function getName(){
			return "Roasted Vegetables, ".$this->pastaDish->getName();
		}

		function cost(){
			return 1.00+$this->pastaDish->cost();
		}
	}
	$myDish = new TomatoSauce();
	$myPasta = new Spaghetti($myDish);
	printf($myDish->getName()." ");
	printf($myDish->cost()."<br>");
	printf($myPasta->getName()." ");
	printf($myPasta->cost()."<br>");
	$myPasta = new Chicken($myPasta);
	printf($myPasta->getName()." ");
	printf($myPasta->cost()."<br>");
	$myPasta = new RoastVeg($myPasta);
	printf($myPasta->getName()." ");
	printf($myPasta->cost()."<br>");
