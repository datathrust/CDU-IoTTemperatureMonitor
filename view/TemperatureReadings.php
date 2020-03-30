
Skip to content
Pull requests
Issues
Marketplace
Explore
@datathrust
Learn Git and GitHub without any code!

Using the Hello World guide, you’ll start a branch, write comments, and open a pull request.
datathrust /
CDU-IoTTemperatureMonitor
Private

1
0

    0

Code
Issues 0
Pull requests 0
Actions
Projects 0
Wiki
Security
Insights
Settings
CDU-IoTTemperatureMonitor/view/TemperatureReadings.php /
@datathrust datathrust Create TemperatureReadings.php 3d4e0ad 5 minutes ago
33 lines (31 sloc) 716 Bytes
Code navigation is available!

Navigate your code with ease. Click on function and method calls to jump to their definitions or references in the same repository. Learn more
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

    © 2020 GitHub, Inc.
    Terms
    Privacy
    Security
    Status
    Help

    Contact GitHub
    Pricing
    API
    Training
    Blog
    About

