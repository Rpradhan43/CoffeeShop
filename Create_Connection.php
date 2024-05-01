<?php

// MySQL database configuration
$host = "localhost";
$username = "root";
$password = "Carlos3822"; 
$database = "coffee_shop"; // Change this to the name of your MySQL database

// Create a connection to the MySQL database
$connection = new mysqli($host, $username, $password, $database);

// Check if the connection was successful
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

echo "Connected successfully";


?>
