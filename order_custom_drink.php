<?php
include 'create_connection.php';
session_start();

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if a custom drink is provided
    if (isset($_POST["custom_drink"]) && !empty($_POST["custom_drink"])) {
        // Get the custom drink
        $custom_drink = $_POST["custom_drink"];
        
        // Store the custom drink in session
        $_SESSION["order"][] = $custom_drink;
        
        // Redirect back to the order page
        header("Location: orders.php");
        exit;
    } else {
        // If no custom drink is provided, redirect back to the order page
        header("Location: orders.php");
        exit;
    }
} else {
    // If form is not submitted, redirect back to the order page
    header("Location: orders.php");
    exit;
}
?>
