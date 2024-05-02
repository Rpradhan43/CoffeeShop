<?php 

include "create_connection.php";

    if (isset($_POST['updateforcust'])) {

        $customer_name = $_POST['customer_name'];

        $customer_id = $_POST['customer_id'];

        $customer_addr = $_POST['customer_addr'];

        $phone_num = $_POST['phone_num']; 

        $sql = "UPDATE `CUSTOMER` SET `customer_name`='$customer_name',`customer_addr`='$customer_addr',`phone_num`='$phone_num' WHERE `customer_id`='$customer_id'"; 

        $result = $conn->query($sql); 

        if ($result == TRUE) {

            echo "Record updated successfully.";

        }else{

            echo "Error:" . $sql . "<br>" . $connection->error;

        }

    } 

if (isset($_GET['customer_id'])) {

    $user_id = $_GET['customer_id']; 

    $sql = "SELECT * FROM `CUSTOMER` WHERE `customer_id`='$customer_id'";

    $result = $conn->query($sql); 

    if ($result->num_rows > 0) {        

        while ($row = $result->fetch_assoc()) {

            $customer_name = $row['customer_name'];

            $customer_addr = $row['customer_addr'];

            $phone_num = $row['phone_num'];

            $customer_id = $row['customer_id'];

        } 

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

        </body>

        </html> 

    <?php

    } else{ 

        header('Location: viewforcust.php');

    } 

}

?> 