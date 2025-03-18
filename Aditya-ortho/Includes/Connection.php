<?php 
// Databse Variables
$Host       ='localhost';
$DBUser     ='blog_user';
$DBPass     ='blog@post09876';
$DB         ='aditya_db';

//Create Connection

$Connection = new mysqli($Host, $DBUser, $DBPass, $DB);
$Connection->set_charset("utf8mb4");

//Check Connection
if($Connection->connect_error){
    die("Connection failed: " . $Connection->connect_error);
}
?>