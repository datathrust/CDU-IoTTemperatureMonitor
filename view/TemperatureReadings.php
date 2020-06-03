<?php
	echo '
	<!doctype html>
    <html lang="en">
		<head><meta charset="euc-kr">
		    
		    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		    <link href="http://datathrust.net/581/css/StickyFooter.css" rel="stylesheet">
		    <link rel="stylesheet" href="http://datathrust.net/581/chartjs/css/Chart.css">
		    <link rel="stylesheet" href="http://datathrust.net/581/chartjs/css/Chart.min.css">
		    
		    <!-- Anti-Clickjacking -->
		    <style id="antiClickjack">
                body{display:none !important;}
            </style>
            
            <script type="text/javascript">
                if (self === top) {
                    var antiClickjack = document.getElementById("antiClickjack");
                    antiClickjack.parentNode.removeChild(antiClickjack);
                } else {
                    top.location = self.location;
                }
            </script>
		</head>
		<title>CDU Temperature Sensor</title>
		
		<body>
		<header>
            <div class="collapse bg-dark" id="navbarHeader">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-8 col-md-7 py-4">
                            <h4 class="text-white">About</h4>
                            <p class="text-muted">IoT Notification sysmte designed for Rasberry PI to take temperature and humidity readings around the university.</p>
                        </div>
                        <div class="col-sm-4 offset-md-1 py-4">
                            <h4 class="text-white">Contact</h4>
                            <ul class="list-unstyled">
                                <li><a href="#" class="text-white">Project on Github</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="navbar navbar-dark bg-dark box-shadow">
                <div class="container d-flex justify-content-between">
                    <a href="#" class="navbar-brand d-flex align-items-center">
                        <strong>IoT Notification System</strong>
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </div>
            </div>
        </header>
        
        <main role="main">
            <section class="jumbotron text-center mb-0 bg-secondary">
                <p><b><span class="text-white"> Welcome, '.$username.'. | <a href="/view/Logout.php">LOGOUT</a></b></span></p>
                <div class="container"> '; 
                    if ($dateError == 1)
        			{
                        echo '<span class="error"><b>Please enter a valid date range.</b></span>';
        			}
	echo '
                    <h3 class="text-white">Viewing Data for : '.$dateMinimum.' to '.$dateMaximum.'</h3>
                    <div class="form-group text-white">
                        <form action="/readings.php" method="post">
                            Select Date Range:
                            <select name="dateSelect-1">'; // echo
                                foreach ($dateArray as $date)
                                {
                                    echo'<option value="'.$date.'">'.$date.'</option>';
                                }
    echo'    
                            </select>
                            <select name="dateSelect-2">'; // echo
                                foreach ($dateArray as $date)
                                {
                                    echo'<option value="'.$date.'">'.$date.'</option>';
                                }
    echo'    
                            </select>
                            <input type="submit" value="Submit">
                        </form>
                    </div>
                    <div class="row pt-5">
                        <div class="col bg-danger pt-3 pb-2">
                            <h4>Average Temperature</h4>
                            <h4>'.$avgTemp.' °C</h4>
                        </div>
                        <div class="col-2">
                        </div>
                        <div class="col bg-info pt-3 pb-2">
                            <h4>AverageHumidity</h4>
                            <h4>'.$avgHumid.'%</h4>
                        </div>
                    </div>
                </div>
            </section>
        
            <div class="containter-fluid text-center bg-light p-2">
                <h5>Current Temperature: '.$currentTemp.' °C</h5>
            </div>

            <section class="text-center">
                <div class="container">
                    <div class="row">
                        <div class="col">
                                <script src="http://datathrust.net/581/chartjs/Chart.min.js"></script> ';//echo
    echo "
                                <div class=\"chart-container\" style=\"position: relative; height:450px; width:450px\">
                                <canvas id=\"tempChart\" width=\"100\" height=\"100\"></canvas>
                                    <script>
                                        var ctx = document.getElementById('tempChart').getContext('2d');
                                        var chart = new Chart(ctx, {
                                            // The type of chart we want to create
                                            type: 'line',
                                        
                                            // The data for our dataset
                                            data: {
                                                labels: [   "; //echo    
                                                foreach ($readingArray as $reading){
                                                    $shortTime = substr($reading->time,0,-3);
                                                  echo "'$shortTime',"; 
                                                };
                                            echo "],
                                                datasets: [{
                                                    label: 'Temperature (°C)',
                                                    backgroundColor: 'rgb(220, 53, 69)',
                                                    borderColor: 'rgb(180, 32, 47)',
                                                    data: [ "; // echo
                                                foreach ($readingArray as $reading){
                                                  echo "$reading->temperature,"; 
                                                };
                                            echo "]
                                                }]
                                            },
                                        
                                            // Configuration options go here
                                            options: {                                                
                                                scales: {
                                                    yAxes: [{
                                                        display: true,
                                                        ticks: {
                                                            suggestedMin: 0,    // minimum will be 0, unless there is a lower value.
                                                            suggestedMax: 45
                                                        }
                                                    }]
                                                }}
                                        });
                                    </script>
                                </div>";
    echo '                    
                        </div>
                        <div class="col"> ';
    echo "
                            <div class=\"chart-container\" style=\"position: relative; height:450px; width:450px\">
                                <canvas id=\"humidChart\" width=\"100\" height=\"100\"></canvas>
                                    <script>
                                        var ctx = document.getElementById('humidChart').getContext('2d');
                                        var chart = new Chart(ctx, {
                                            // The type of chart we want to create
                                            type: 'line',
                                        
                                            // The data for our dataset
                                            data: {
                                                labels: [   "; //echo    
                                                foreach ($readingArray as $reading){
                                                    $shortTime = substr($reading->time,0,-3);
                                                    echo "'$shortTime',"; 
                                                };
                                            echo "],
                                                datasets: [{
                                                    label: 'Humidity (%)',
                                                    backgroundColor: 'rgb(23, 162, 184)',
                                                    borderColor: 'rgb(6, 122, 141)',
                                                    data: [ "; // echo
                                                foreach ($readingArray as $reading){
                                                  echo "$reading->humidity,"; 
                                                };
                                            echo "]
                                                }]
                                            },
                                        
                                            // Configuration options go here
                                            options: {    
                                                scales: {
                                                    yAxes: [{
                                                        display: true,
                                                        ticks: {
                                                            suggestedMin: 0,    // minimum will be 0, unless there is a lower value.
                                                            suggestedMax: 100
                                                        }
                                                    }]
                                                }
                                            }
                                        });
                                    </script>
                            </div>";
    echo '
                    </div>
                </div>
                <div class ="container mt-5">
                    <h5>Raw Data:</h5>
                        <table class="table">
                            <thead class="thead-dark">
        		                <tr>
                		            <th>Date</th>
                		            <th>Time</th>
                		            <th>Temperature</th>
                		            <th>Humidity</th>
                		        <tr>
                		    </thead>';
            		foreach ($readingArray as $reading)
            		{
    echo "
            		        <tr>
            		            <td align='center'>".$reading->date."</td>
            		            <td align='center'>".$reading->time."</td>
            		            <td align='center'>".$reading->temperature." °C</td>
            		            <td align='center'>".$reading->humidity."%</td>
            		        </tr>";
            		}
    echo'
		            </table>
            </section>
        </main>
        </body>
        <footer class="footer text-muted text-center">
            <div class="container">
                <p>Shannan Mikic, Syed Rafay Mukhtar, Syed Wajih Ul Hasan Shan, Trevor Pinto, Pengyang Yu, Jiayi Dai - 2020 </p>
            </div>
        </footer>
		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>    
	</html>';
?>