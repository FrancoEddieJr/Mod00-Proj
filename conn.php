<?php
 $host = 'localhost';
 $root = 'root';
 $pass = '';
 $database = 'covid_vacc';

$conn = mysqli_connect($host,$root,$pass,$database);


if(!$conn){
    die('Connection failed: ' . mysqli_connect_error());
}

?>