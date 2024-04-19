<?php

// UPDATE operation
    require_once "conn.php";
    if(isset($_POST["name"]) && isset($_POST["grade"]) && isset($_POST["marks"])){ 
        $name = $_POST['name'];
        $grade = $_POST['grade'];
        $marks = $_POST['marks'];
        $sql = "UPDATE results SET `name`= '$name', `class`= '$grade', `marks`= $marks  WHERE id= ".$_GET["id"];
        if (mysqli_query($conn, $sql)) {
            header("location: index.php");
        } else {
            echo "Something went wrong. Please try again later.";
        }
    }
?>

