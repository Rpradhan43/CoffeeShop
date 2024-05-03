<?php 
include "create_connection.php";

if (isset($_POST['submit'])) {
    // Dump form data for debugging
    var_dump($_POST);
    
    // Retrieve form data
    $customer_name = $_POST['customer_name'];
    $customer_addr = $_POST['customer_addr'];
    $phone_num = $_POST['phone_num'];

    // Perform additional validation if needed

    // Proceed with database insertion
    // Corrected SQL statement using backticks for table name
    $sql = "INSERT INTO `CUSTOMER` (`customer_name`, `customer_addr`, `phone_num`) VALUES ('$customer_name','$customer_addr','$phone_num')";

    $result = $connection->query($sql);

    // Check if the insertion was successful
    if ($result == TRUE) {
        echo "New record created successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $connection->error;
    } 

    // Close database connection
    $connection->close(); 
}
?>

<!DOCTYPE html>
<html>
<body>
<h2>Your Information</h2>
<form action="" method="POST">
  <fieldset>
    <legend>Personal information:</legend>
    Name:<br>
    <input type="text" name="customer_name">
    <br>
    Address:<br>
    <input type="text" name="customer_addr">
    <br>
    Phone:<br>
    <input type="number" name="phone_num">
    <br><br>
    <input type="submit" name="submit" value="submit">
  </fieldset>
</form>
</body>
</html>
