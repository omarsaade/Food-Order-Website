<?php

//start session
session_start();

//create Constant to store Non Repeating values 
define('SITEURL', 'http://localhost/learn/databaso/Food-Order-Website/');
define('LOCALHOST', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'food-order');




$conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die(mysqli_error(($conn))); // Database Connection
$db_select = mysqli_select_db($conn, DB_NAME) or die(mysqli_error($conn)); //selecting Database
