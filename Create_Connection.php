<?php

// MySQL database configuration
$host = "localhost";
$username = "root";
$password = "Carlos3822"; 
$database = "coffee_shop";

$connection = new mysqli($host, $username, $password, $database);

// Check if the connection was successful
if ($connection->connect_error) {
    // If there's an error, display an error message
    die("Connection failed: " . $connection->connect_error);
} else {
    // If the connection was successful, display a success message
    echo "Connected successfully";
}

?>
