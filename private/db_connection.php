<?php
error_reporting(0);

//database connection

//variables
$username = 'root';
$password = '';
$hostname = 'localhost';
$database = 'usersregistration';

//query for connection
$dbconnection = mysqli_connect($hostname,$username,$password, $database);
	
//check if connection is okay 
if(!$dbconnection){
	die('Error, database connection was not possible.');
}
