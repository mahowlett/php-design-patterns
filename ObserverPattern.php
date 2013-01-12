<?php

abstract Class abstractAnimalObserver {
	abstract function updateSleepCount(Abstractanimal $animal_in);

	abstract function updateEatCount(Abstractanimal $animal_in);
}

abstract Class abstractAnimal {
	abstract function attach(AbstractAnimalObserver $observer_in);
	abstract function detach(AbstractAnimalObserver $observer_in);

	abstract function notifySleeps();
	abstract function notifyEats();
}

Class animalObserver extends abstractAnimalObserver {

	//global counts of eats and sleeps
	protected $sleeps = 0;
	protected $eats = 0;
	protected static $lineBreak = "<br>";

	public function __construct() {
    }


    public function updateSleepCount(abstractAnimal $animal) {
		$this->sleeps++;
		printf("Total Sleeps so far: ".$this->eats.self::$lineBreak);
		printf("Your Sleeps so far: ".$animal->getSleeps().self::$lineBreak);

	}

	public function updateEatCount(abstractAnimal $animal) {
		$this->eats++;
		printf("Total Eats so far: ".$this->eats.self::$lineBreak);
		printf("Your Eats so far: ".$animal->getEats()." ".$animal->getName().self::$lineBreak);
	}
}

class animal extends AbstractAnimal {

	private $observers = array();
    private $mySleeps = 0;
	private $myEats = 0;
	private $name = null;

    function __construct($name) {
    	$this->name = $name;
    }


    function attach(AbstractAnimalObserver $observer_in) {
      $this->observers[] = $observer_in;
    }


    function detach(AbstractAnimalObserver $observer_in) {
      foreach($this->observers as $okey => $oval) {
        if ($oval == $observer_in) { 
          unset($this->observers[$okey]);
        }
      }
    }

    function notifySleeps() {
      foreach($this->observers as $obs) {
        $obs->updateSleepCount($this);
      }
    }

    function notifyEats() {
      foreach($this->observers as $obs) {
        $obs->updateEatCount($this);
      }
    }

    function updateMySleeps() {
      $this->mySleeps++;
      $this->notifySleeps();
    }


    function getSleeps() {
      return $this->mySleeps;
    }

    function updateMyEats() {
      $this->myEats++;
      $this->notifyEats();
    }


    function getEats() {
      return $this->myEats;
    }

    function getName() {
      return $this->name;
    }

}

$observer = new animalObserver;
$person = new animal("Mark");
$cat = new animal("Rufus");

$person->attach($observer);
$cat->attach($observer);

$person->updateMyEats();
$cat->updateMyEats();
$person->updateMyEats();
$person->updateMyEats();
$cat->updateMyEats();

$person->detach($observer);
$cat->detach($observer);