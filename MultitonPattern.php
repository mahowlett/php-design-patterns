<?php

Class PrintersMultiton {

	//One job per printer
	protected static $lineBreak = "<br>";
	private static $_printers = array();
    private static $isPrinting = FALSE;

    static function printPage($printerName) {
    
		  if (!isset(self::$_printers[$printerName])) {
           self::$_printers[$printerName]= new PrintersMultiton();
           return self::$_printers[$printerName];
      } else { 
    	 return null;
      }
    }


    function finishJob(PrintersMultiton $jobFinished, $printerName) {
        //remove printername from array
        self::$_printers[$printerName] = NULL;
    }

    function getStatus($printerName) {
    	printf( "I'm printing".self::$lineBreak);
    }
}

Class PrintPage {

	protected static $lineBreak = "<br>";
    private $printJob;
    private $canPrint = FALSE;

    function __construct() {}

    function getStatus($printerName) {
    	if (TRUE == $this->canPrint) {
      		return $this->printJob->getStatus($printerName);
      	} else {
    		printf("I can't print".self::$lineBreak);
    	}
	}

    function printPage($printerName) {
    	$this->printJob = PrintersMultiton::printPage($printerName);
      	if ($this->printJob == NULL) {
        	$this->canPrint = FALSE;
      	} else {
        	$this->canPrint = TRUE;
      	}
    }

    function finishJob($printerName) {
      	$this->printJob->finishJob($this->printJob,$printerName);
    }

}

  
$printPage1 = new PrintPage();
$printPage2 = new PrintPage();

//page1 gets the instance of the printer so can print
$printPage1->printPage('job1');
$printPage1->getStatus('job1');

//page 2 won't be able to print as page 1 has the printer
$printPage2->printPage('job1');
$printPage2->getStatus('job1');

//page 2 will be able to print as it uses different key to page1
$printPage2->printPage('job2');
$printPage2->getStatus('job2');

//page1 releases the printer
$printPage1->finishJob('job1');
  
//now page 2 can print using key page 1 had
$printPage2->printPage('job1');
$printPage2->getStatus('job1');
  

