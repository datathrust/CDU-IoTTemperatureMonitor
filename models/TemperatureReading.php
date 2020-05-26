<?php
    include_once("models/ReadingPrototype.php");
	
	Class TemperatureReading implements ReadingPrototype
	{
	    //public $sensorid;
		public $date;
		public $time;
		public $temperature;
		public $humidity;
		
		public function __construct($date = null, $time = null, $temperature = null, $humidity = null)
		{
		    //$this -> sensorid = $sensorid;
			$this -> date = $date;
			$this -> time = $time;
			$this -> temperature = $temperature;
			$this -> humidity = $humidity;
		}
		
		public function setDate ($date){
		    $this -> date = $date;
		}
		
		public function setTime($time){
		    $this -> time = $time;
		}
		
		public function setTemp($temp){
		    $this -> temperature = $temp;
		}
		
		public function setHumid($humid){
		    $this -> humidity = $humid;
		}

		public function clone__ (){
		    //Implement the clone method to allow for cloning.
		}
		
	}
?>
