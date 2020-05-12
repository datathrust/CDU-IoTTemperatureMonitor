<?php
        include_once("TemperatureReading.php");

		function GetAllReadings(){
			//Set thingspeak URL to pull data from.
		    $url = "https://api.thingspeak.com/channels/1024699/feeds.json";
		    
		    //Run cURL to get JSON data and Decode into PHP array.
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            $data = curl_exec($ch);
            curl_close($ch);
            
            $jsondata = json_decode($data, true);
            $readingPrototype = new TemperatureReading();
            $arr = array();
            
            foreach($jsondata["feeds"] as $key=>$value){
                $temp = $value["field1"];
                $humid = $value["field2"];
                $datetime =  (explode("T",$value["created_at"])); 

                //Make new TemperatureReading Object
                $arr[$key] = clone $readingPrototype;
                $arr[$key] -> setDate($datetime[0]);
                $arr[$key] -> setTime(rtrim($datetime[1], "Z"));
                $arr[$key] -> setTemp($temp);
                $arr[$key] -> setHumid($humid);
            }
            return $arr;
	    	
		}
?>
