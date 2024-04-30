<?php

// UPDATE operation
    require_once "create_connection.php";
    if(isset($_POST["customer_name"]) && isset($_POST["phone_num"]) && isset($_POST["customer_addr"])){ 
        $customer_name = $_POST['customer_name'];
        $phone_num = $_POST['phone_num'];
        $customer_addr = $_POST['customer_addr'];
        $sql = "UPDATE CUSTOMER SET `customer_name`= '$customer_name', `phone_num`= '$phone_num', `customer_addr`= $customer_addr  WHERE customer_id= ".$_GET["id"];
        if (mysqli_query($conn, $sql)) {
            header("location: index.php");
        } else {
            echo "Something went wrong. Please try again later.";
        }
    }
?>

