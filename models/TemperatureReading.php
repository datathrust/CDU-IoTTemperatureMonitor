<?php
	Class TemperatureReading
	{
	    public $sensorid;
		public $date;
		public $time;
		public $temperature;
		public $humidity;
		
		public function __construct($sensorid = null, $date = null, $time = null, $temperature = null, $humidity = null)
		{
		    $this -> sensorid = $sensorid;
			$this -> date = $date;
			$this -> time = $time;
			$this -> temperature = $temperature;
			$this -> humidity = $humidity;
		}
		
		public function GetAllReadings()
		{
            //Database Connection Script
            //Currently borrowing the painting scores database. Issues with Backend. 
			include("../../script/581_connect.php");
			$connection = createConnection();
            
            //Iterate security on this.
            $sql = "SELECT * FROM SensorReadings ORDER BY DateTime DESC LIMIT 12";
            $result = $connection -> query($sql);
            $arr = array();
            
            if ($result -> num_rows > 0 ){
                while ($row = $result -> fetch_assoc()){
                    //Explode out date/time.
                    $dateArray = explode(" ",$row["DateTime"]);
                    
                    //Push values to Array
                    $row["ID"] = new TemperatureReading($row["SensorID"], $dateArray[0], $dateArray[1], $row["Temperature"], $row["Humidity"]);
                    array_push($arr, $row["ID"]);
                }
            }
           
           return $arr;
		}
	}
?>
