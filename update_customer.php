<?php
// Include the database connection file
include 'create_connection.php';

// Start session (if not already started)
session_start();

// Check if the form is submitted for updating the customer information
if (isset($_POST['update_customer'])) {
    // Retrieve the customer ID and new information from the form
    $customer_id = $_POST['customer_id'];
    $customer_name = $_POST['customer_name'];
    $phone_num = $_POST['phone_num'];
    $customer_addr = $_POST['customer_addr'];
    
    // Update the customer information in the database
    $sql = "UPDATE CUSTOMER SET customer_name = '$customer_name', phone_num = '$phone_num', customer_addr = '$customer_addr' WHERE customer_id = $customer_id";
    $result = mysqli_query($connection, $sql);

    // Check if the update was successful
    if ($result) {
        // Redirect back to the customer page
        header("Location: customer.php");
        exit;
    } else {
        echo "Error updating customer information: " . mysqli_error($connection);
    }
}
?>
