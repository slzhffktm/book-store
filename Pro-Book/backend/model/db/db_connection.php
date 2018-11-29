<?php

    if (!function_exists("OpenCon")) {
        function OpenCon() {
            $dbhost = "localhost";
            $dbuser = "root";
            $dbpass = "";
            $db = "tayobook";
            $conn = new mysqli($dbhost, $dbuser, $dbpass, $db) or die("Connect failed: %s\n" . $conn->error);
            return $conn;
        }
    }

    if (!function_exists("CloseCon")) {
        function CloseCon($conn) {
            $conn->close();
        }
    }

    if (!function_exists("escape")) {
        function escape($inputString) {
            return '"' . addslashes($inputString) . '"';
        }
    }

    if (!function_exists("OpenConPDO")) {
        function OpenConPDO() {
            $dbhost = "localhost";
            $dbuser = "root";
            $dbpass = "";
            $db = "tayobook";
            try {
                $conn = new PDO("mysql:host=$dbhost;dbname=$db", $dbuser, $dbpass);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch(PDOException $e) {
                die("Connect failed: %s\n" . $conn['error']);
            }
 
            return $conn;
        }
    }
?>