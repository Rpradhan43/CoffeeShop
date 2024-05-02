<?php
include "create_connection.php";

// Check if customer_id is set in the URL
if (isset($_GET['id'])) {
    // Retrieve the customer_id from the URL parameter
    $customer_id = $_GET['id'];

    // SQL query to delete the customer record
    $sql = "DELETE FROM CUSTOMER WHERE customer_id='$customer_id'";

    // Execute the query
    $result = $connection->query($sql);

    // Check if the deletion was successful
    if ($result === TRUE) {
        echo "Record deleted successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $connection->error;
    }
} else {
    echo "Customer ID not provided.";
}

// Close the database connection
$conn->close();
?>
