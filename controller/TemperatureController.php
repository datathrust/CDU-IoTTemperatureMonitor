<?php
	include_once("models/TemperatureReading.php");
	include_once("models/CalculateAverages.php");
	include_once("models/GetWeather.php");
	

	Class TemperatureController{
		public $model;
		
		public function __construct(){
			$this -> model = new TemperatureReading();
		}
		
		public function invoke(){
		    // Get data from various models. 
			$arr = $this -> model -> GetAllReadings();
			$avgTemp = AverageTemperature($arr);
			$avgHumid = AverageHumidity($arr);
			
			//Wait for API key to activate, then use this to pull current temperature. 
			$currentTemp = GetWeather();
			
			//Call the view to draw the webpage. 
			include "view/TemperatureReadings.php";
		}
	}
?>
