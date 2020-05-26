<?php
    echo '
	<!doctype html>
    <html lang="en">
		<head>
		    <meta charset="euc-kr">
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
            
            <div class="container text-center">
                <form action = "/../index.php" method = "post" class="form-control mt-5 pb-3">
                    <h3>Login</h3>';
                        if (isset($error)){
                            echo'<span class="text-danger"><b>Invalid Username or Password</b></span></br>';
                        }
    echo'
                    <label>Username  : </label><input type = "text" name = "username"/><br /><br />
                    <label>Password  : </label><input type = "password" name = "password"/><br/><br />
                    <input type = "submit" value = " Submit "/><br />
                </form>
            </div>
        </body>
            
        <footer class="footer text-muted text-center">
            <div class="container">
                <p>Shannan Mikic, Syed Rafay Mukhtar, Syed Wajih Ul Hasan Shan, Trevor Pinto, Pengyang Yu, Jiayi Dai - 2020 </p>
            </div>
        </footer>
		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>  
        </html>
    ';
?>