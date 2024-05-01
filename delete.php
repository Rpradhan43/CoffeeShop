<?php
// Start session (if not already started)
include 'create_connection.php';
session_start();

// Check if form is submitted for deletion
if (isset($_POST['deletebtn'])) {
    // Get the drink to delete
    $drink_to_delete = $_POST['drink'];

    // Remove the drink from the session order
    if (($key = array_search($drink_to_delete, $_SESSION["order"])) !== false) {
        unset($_SESSION["order"][$key]);
    }
}

// Redirect back to the orders page
header("Location: orders.php");
exit;
?>
