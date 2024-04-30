<?php
// DELETE operation

require_once "create_connection.php"; #cl
$id = $_GET["id"];
$query = "DELETE FROM CUSTOMER WHERE customer_id = '$id'"; // Note this will need to be edited for our DB, cl
if (mysqli_query($conn, $query)) {
    header("location: index.php");
} else {
     echo "Something went wrong. Please try again later.";
}


?>