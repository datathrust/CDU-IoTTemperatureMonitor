<?php
	Class TemperatureReading
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
		
		public function GetAllReadings()
		{
			//Set thingspeak URL to pull data from.
		    $url = "https://api.thingspeak.com/channels/1024699/feeds.json";
		    
		    //Run cURL to get JSON data and Decode into PHP array.
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            $data = curl_exec($ch);
            curl_close($ch);
            
            $jsondata = json_decode($data, true);
            $arr = array();
            
            foreach($jsondata["feeds"] as $key=>$value){
                $temp = $value["field1"];
                $humid = $value["field2"];
                $datetime =  (explode("T",$value["created_at"])); 
                
                $arr[$key] = new TemperatureReading($datetime[0], rtrim($datetime[1], "Z"), $temp, $humid);
                //array_push($arr, "Something!");
                
                //echo $key . "=>" . $value["field1"] . " | " . $value["field2"] ."<br>";
                //$datetime =  (explode("T",$value["created_at"]));
                //echo "Date : ". $datetime[0] . " | Time : " . rtrim($datetime[1], "Z");
                //echo "</br>";
                    }
            return $arr;
		}
	}
?>
