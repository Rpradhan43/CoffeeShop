<?php
include "create_connection.php";

if (isset($_GET['customer_id'])) {
    // Retrieves id
    $customer_id = $_GET['customer_id'];
    // SQL query to delete the customer record
    $sql = "DELETE FROM CUSTOMER WHERE customer_id='$customer_id'";

    $result = $connection->query($sql);

    if ($result === TRUE) {
        echo "Record deleted successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $connection->error;
    }
} else {
    echo "Customer ID not provided.";
}

$connection->close();
?>
