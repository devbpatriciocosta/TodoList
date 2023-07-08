<?php

$dbHost         = "localhost";
$dbUser         = "root";
$dbPassword     = "";
$dbName         = "todolist";

if(!$connection = mysqli_connect($dbHost, $dbUser, $dbPassword, $dbName)) {
    die("Conection Failled".mysqli_connect_error());
} 

