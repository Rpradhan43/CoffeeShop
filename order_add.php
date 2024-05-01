<?php
// Include the database connection file
include 'create_connection.php';
echo "form submitted"

// Start session (if not already started)

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if a drink is selected
    if (isset($_POST["drink"]) && !empty($_POST["drink"])) {
        // Get the selected drink
        $selected_drink = $_POST["drink"];
        
        // Store the selected drink in session
        $_SESSION["order"][] = $selected_drink;
        
        // Redirect back to the order page
        header("Location: orders.php");
        exit;
    } else {
        // If no drink is selected, redirect back to the order page
        header("Location: orders.php");
        exit;
    }
} else {
    // If form is not submitted, redirect back to the order page
    header("Location: orders.php");
    exit;
}
?>
