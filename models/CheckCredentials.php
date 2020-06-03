<?php
    include("models/DatabaseConfig.php");

    function CheckCredentials($user, $pass)
    {
        // Connect to Database, ustilize prepared statement to get Hash from database for provided username. 
        $connection = new mysqli(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
        $statement = $connection -> prepare ("SELECT * FROM users WHERE username = ?");
        $statement -> bind_param("s",$user);
        $statement -> execute();
        $result = $statement -> get_result();

        //If the username appears in the return query, compare provided password with stored hash.
        while ($row = $result->fetch_assoc())
        {
            if(password_verify($pass, $row["password"])){
            return 1;
            }
        }

        //If no matches, or invalid hash.
        return 0;
    }
?>