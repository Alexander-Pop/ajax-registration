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
if(mysqli_connect_errno()){
	die('Error, database connection was not possible.');
}
