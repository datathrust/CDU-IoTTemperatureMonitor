<?php
    function Session()
    {
       //If there is not a session set.
       if(!isset($_SESSION['login_user'])){
            return false;
       }
       
       $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
       $user_check = $_SESSION['login_user'];
       $ses_sql = mysqli_query($db,"select username from users where username = '$user_check' ");
       $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
       return true;
       
    }
?>