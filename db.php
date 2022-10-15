<?php
        $host = "localhost";
        $user = "root";
        $pass = "";
        $name = "uts_kelompokk";

        $con = mysqli_connect($host,$user,$pass,$name);

        if(mysqli_connect_error()){
            echo "Failed to connect : " . mysqli_connect_error();
    }   
?>