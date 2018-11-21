<?php 

    if(! function_exists("OpenCon")){
        function OpenCon() {
            $dbhost = "localhost";
            $dbuser = "root";
            $dbpass = "1234";
            $db = "tayobook";
            $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);
            return $conn;
        }
    }
    
    if(! function_exists("CloseCon")){
        function CloseCon($conn){
            $conn->close();
        }
    }

    if(! function_exists("escape")){
        function escape($inputString){
            return '"'.addslashes($inputString).'"';
        }
    }
?>