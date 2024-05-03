<?php
include 'create_connection.php';

session_start();

echo "form submitted";

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if a drink is selected
    if (isset($_POST["drink"]) && !empty($_POST["drink"])) {
        // Get the selected drink
        $selected_drink = $_POST["drink"];
        
        $_SESSION["order"][] = $selected_drink;
        
        header("Location: orders.php");
        exit;
    } else {
        header("Location: orders.php");
        exit;
    }
} else {
    header("Location: orders.php");
    exit;
}
?>
