<?php 

include "create_connection.php";

  if (isset($_POST['submit'])) {

    $customer_name = $_POST['customer_name'];

    $customer_addr = $_POST['customer_addr'];

    $phone_num = $_POST['phone_num'];

    $sql = "INSERT INTO CUSTOMER(`customer_name`, `customer_addr`, `phone_num`) VALUES ('$customer_name','$customer_addr','$phone_num')";

    $result = $conn->query($sql);

    if ($result == TRUE) {

      echo "New record created successfully.";

    }else{

      echo "Error:". $sql . "<br>". $connection->error;

    } 

    $conn->close(); 

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

    <input type="text" name="lastname">

    <br>

    Phone:<br>

    <input type="number" name="phone_num">

    <br>

    <input type="submit" name="submit" value="submit">

  </fieldset>

</form>

</body>

</html>