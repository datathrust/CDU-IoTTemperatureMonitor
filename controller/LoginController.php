<?php
    include_once("models/Session.php");
    include_once("models/CheckCredentials.php");

	Class LoginController{
		public $model;
		
		public function __construct(){
		}

		public function invoke(){
            session_start();

            if($_SERVER["REQUEST_METHOD"] == "POST") {
              $user = $_POST['username'];
              $pass = $_POST['password'];
              
              // Check username/password combination via function. 
              if(CheckCredentials($user, $pass) == 1) {
                $_SESSION['login_user'] = $user;
              }
              else {
                $error = "Your Login Name or Password is invalid. ";
              }
           }
           
            //If a session exists, send user to the application, otherwise show login screen. 
		    if (Session()){
		        header("location:readings.php");
		    }
		    else {
		        include "view/Login.php";
		    }
	    }
	}
?>