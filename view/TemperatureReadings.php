<?php
	echo '
	<html>
		<head></head>
		<title>CDU Temperature Sensor</title>
		<body>
		    <table>
		        <tr>
		            <th>SensorID</th>
		            <th>Date</th>
		            <th>Time</th>
		            <th>Temperature</th>
		            <th>Humidity</th>
		        <tr>
		'; // Echo
		    
		foreach ($arr as $reading)
		{
        echo "
		        <tr>
		            <td align='center'>".$reading->sensorid."
		            <td align='center'>".$reading->date."
		            <td align='center'>".$reading->time."
		            <td align='center'>".$reading->temperature."
		            <td align='center'>".$reading->humidity."
		        </tr>";
		}
		
		echo'
		    </table>
		</body>
	</html>';
?>