<?php
    function AverageTemperature($arr)
    {
        $sum = 0.0;
        $count = count($arr);
        
        //Iterate through array of Readings, add temperature to total sum. 
        foreach($arr as $key=>$value){
            $sum = $sum + $value->temperature;
        }
        
        //Calculate Average. 
        $average = $sum / $count;
        
        //Format to two decimal places. 
        return number_format((float)$average, 2, '.', '');
    }
    
    function AverageHumidity($arr)
    {
        $sum = 0.0;
        $count = count($arr);
        
        //Iterate through array of Readings, add humidity to total sum. 
        foreach($arr as $key=>$value){
            $sum = $sum + $value->humidity;
        }
        
        //Calculate Average. 
        $average = $sum / $count;
        
        //Format to two decimal places. 
        return number_format((float)$average, 2, '.', '');
    }

?>