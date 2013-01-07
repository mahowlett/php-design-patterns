<?php

Class PrinterSingleton {

	protected static $lineBreak = "<br>";
	private static $page = NULL;
    private static $isPrinting = FALSE;

    static function printPage() {
    if (FALSE == self::$isPrinting) {
      	if (NULL == self::$page) {
           self::$page = new PrinterSingleton();
        }
        self::$isPrinting = TRUE;
        return self::$page;
    	} else {
        	return NULL;
    	}
    }


    function finishJob(PrinterSingleton $jobFinished) {
        self::$isPrinting = FALSE;
    }

    function getStatus() {
    	printf( "I'm printing".self::$lineBreak);
    }
}

Class PrintPage {

	protected static $lineBreak = "<br>";
    private $printJob;
    private $canPrint = FALSE;

    function __construct() {}

    function getStatus() {
    	if (TRUE == $this->canPrint) {
      		return $this->printJob->getStatus();
      	} else {
    		printf("I can't print".self::$lineBreak);
    	}
	}

    function printPage() {
    	$this->printJob = PrinterSingleton::printPage();
      	if ($this->printJob == NULL) {
        	$this->canPrint = FALSE;
      	} else {
        	$this->canPrint = TRUE;
      	}
    }

    function finishJob() {
      	$this->printJob->finishJob($this->printJob);
    }

}

  
$printPage1 = new PrintPage();
$printPage2 = new PrintPage();

//page1 gets the instance of the printer so can print
$printPage1->printPage();
$printPage1->getStatus();

//page 2 won't be able to print as page 1 has the printer
$printPage2->printPage();
$printPage2->getStatus();

//page1 releases the printer
$printPage1->finishJob();
  
//now page 2 can print
$printPage2->printPage();
$printPage2->getStatus();
  

