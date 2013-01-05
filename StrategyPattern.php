<?php 

//walk behaviours
interface WalkBehaviour {
	function walk();
}

Class canter implements WalkBehaviour {
	public function walk(){
		printf("left rear, right front, right rear,right front, left rear, right front, right rear,right front <br>");
	}	
}

Class stroll implements WalkBehaviour {
	public function walk(){
		printf("left, right, left, right <br>");
	}	
}

//speak behaviours
interface SpeakBehaviour {
	function speak();
}

Class meow implements SpeakBehaviour {
	public function speak(){
		printf("meow <br>");
	}	
}

Class neigh implements SpeakBehaviour {
	public function speak(){
		printf("neigh <br>");
	}	
}

Class hello implements SpeakBehaviour {
	public function speak(){
		printf("hi! <br>");
	}	
}

//eat behaviours
interface EatBehaviour {
	function eat();
}

Class nom implements EatBehaviour {
	public function eat(){
		printf("nom <br>");
	}	
}


abstract Class animal {
	protected $speakBehaviour = null;
	protected $eatBehaviour = null;
	protected $walkBehaviour = null;

	function performWalk(){
		$this->walkBehaviour->walk();
	}

	function performSpeak(){
		$this->speakBehaviour->speak();
	}

	function performEat(){
		$this->eatBehaviour->eat();
	}

}

Class cat extends animal{
		
	public function __construct() {
		$this->speakBehaviour = new meow();
		$this->eatBehaviour = new nom();
		$this->walkBehaviour = new canter();
	}
}

Class horse extends animal{
		
	public function __construct() {
		$this->speakBehaviour = new neigh();
		$this->eatBehaviour = new nom();
		$this->walkBehaviour = new canter();
	}
}

Class human extends animal{
		
	public function __construct() {
		$this->speakBehaviour = new hello();
		$this->eatBehaviour = new nom();
		$this->walkBehaviour = new stroll();
	}
}

$me =  new human();

$me->performWalk();
$me->performSpeak();
$me->performEat();

$rufus =  new cat();

$rufus->performWalk();
$rufus->performSpeak();
$rufus->performEat();

$bob =  new horse();

$bob->performWalk();
$bob->performSpeak();
$bob->performEat();