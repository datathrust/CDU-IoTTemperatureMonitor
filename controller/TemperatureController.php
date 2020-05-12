<?php
    include_once("models/ReadingPrototype.php");
	include_once("models/TemperatureReading.php");
	include_once("models/GetAllReadings.php");
	include_once("models/CalculateAverages.php");
	include_once("models/GetWeather.php");
	

	Class TemperatureController{
		public $model;
		
		public function __construct(){
			$this -> model = new TemperatureReading();
		}
		
		public function invoke(){
		    // Get raw data from the model. 
			$arr = GetAllReadings();
			
    		//Get Current Temp from Web API
			$currentTemp = GetWeather();
			
			//Iterate on date, collect all unique dates
			$dateArray = array();
			foreach ($arr as $reading){
			    if (in_array($reading->date, $dateArray))
			        {
			            //Already exists, do nothing.
			        }
			    else
			        {
			            //Add the new date.
			            array_push($dateArray, $reading->date);
			        }
			}
			
			//Check POST for date value. Set check date to either that, or the most recent date. 
			if (isset($_POST["dateSelect"]))
			{
                //Sanitize this, incase of captured/manipulated requests. 
			    $dateComparison = filter_var($_POST['dateSelect'], FILTER_SANITIZE_STRING);
			}
			else
			{
			    $dateComparison = $dateArray[0];
			}
			
			//Get all readings that match a specified date, add them to a new array.
			//Set a limit on  number of readings per day, just in case. 
			$limit = 24;
			$readingArray = array();
			foreach ($arr as $reading){
			    if ($reading->date == $dateComparison)
			        {
			            if (count($readingArray) <= $limit)
    			            {
    			                array_push($readingArray, $reading);
    			            }
    			     }
			};
			
			//Calculate Averages from the Date Set
			$avgTemp = AverageTemperature($readingArray);
			$avgHumid = AverageHumidity($readingArray);
			
			//Call the view to draw the webpage. 
			include "view/TemperatureReadings.php";
		}
	}
?>
