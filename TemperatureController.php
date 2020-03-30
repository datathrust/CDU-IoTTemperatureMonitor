<?php
	include_once("models/TemperatureReading.php");

	Class TemperatureController{
		public $model;
		
		public function __construct(){
			$this -> model = new TemperatureReading();
		}
		
		public function invoke(){
			$arr = $this -> model -> GetAllReadings();
			include "view/TemperatureReadings.php";
		}
	}
?>