<?php
include "create_connection.php";

if (isset($_POST['updateforcust'])) {
    // Validate form data
    $customer_id = $_POST['customer_id'];
    $customer_name = $_POST['customer_name'];
    $customer_addr = $_POST['customer_addr'];
    $phone_num = $_POST['phone_num']; 

    // Update the customer record
    $sql = "UPDATE CUSTOMER SET customer_name=?, customer_addr=?, phone_num=? WHERE customer_id=?";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("sssi", $customer_name, $customer_addr, $phone_num, $customer_id);
    
    if ($stmt->execute()) {
        echo "Record updated successfully.";
    } else {
        echo "Error updating record: " . $stmt->error;
    }

    // Close prepared statement
    $stmt->close();
}

// Display the update form
if (isset($_GET['customer_id'])) {
    $customer_id = $_GET['customer_id']; 

    $sql = "SELECT * FROM CUSTOMER WHERE customer_id=?";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("i", $customer_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $customer_name = $row['customer_name'];
        $customer_addr = $row['customer_addr'];
        $phone_num = $row['phone_num'];
        $customer_id = $row['customer_id'];
?>
        <h2>User Update Form</h2>
        <form action="" method="post">
            <fieldset>
                <legend>Personal information:</legend>
                Name:<br>
                <input type="text" name="customer_name" value="<?php echo $customer_name; ?>">
                <input type="hidden" name="customer_id" value="<?php echo $customer_id; ?>">
                <br>
                Address:<br>
                <input type="text" name="customer_addr" value="<?php echo $customer_addr; ?>">
                <br>
                Phone:<br>
                <input type="number" name="phone_num" value="<?php echo $phone_num; ?>">
                <br><br>
                <input type="submit" value="Update" name="updateforcust">
            </fieldset>
        </form> 
<?php
    } else { 
        header('Location: viewforcust.php');
    } 

    // Close prepared statement
    $stmt->close();
} else {
    echo "Customer ID not provided.";
}

// Close database connection
$connection->close();
?>
