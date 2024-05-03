<?php
include 'create_connection.php';
session_start();

if (isset($_POST['deletebtn'])) {
    // Get the drink to delete
    $drink_to_delete = $_POST['drink'];

    // Remove the drink from the session order
    if (($key = array_search($drink_to_delete, $_SESSION["order"])) !== false) {
        unset($_SESSION["order"][$key]);
    }
}

header("Location: orders.php");
exit;
?>
