<?php
    function GetWeather(){
        //Connect top OpenWeatherMap API to grab Darwin's current temperature.
		    $url = "http://api.openweathermap.org/data/2.5/weather?q=Darwin&appid=c332e36276ccd2277d0cc44be328a018";
		    
		    //Run cURL to get JSON data and Decode into PHP array.
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            $data = curl_exec($ch);
            curl_close($ch);
            
            $jsondata = json_decode($data, true);
            
            //Grab temperature from Array.
            $kelvin = $jsondata["main"]["temp"];
            
            //Convert from Kelvin to Celsius
            $celsius = $kelvin - 273.15;
            
            return $celsius;
    }
?>