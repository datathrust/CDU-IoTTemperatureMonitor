<?php
    include("models/DatabaseConfig.php");

    function CheckCredentials($user, $pass)
    {
        //Connect to database, get username and hashed password from Database.
        $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
        $sql = "SELECT * FROM users WHERE username = '$user'";
        $result = mysqli_query($db, $sql);
        
        //Map query results to array, use password_verify to check for correct hash.
            if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_array($result)){
                    if(password_verify($pass, $row["password"])){
                        return 1;
                    }
                }
            }
            
        //If no matches, or invalid hash.
        return 0;
    }
?>