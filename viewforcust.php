<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include "create_connection.php";

$sql = "SELECT * FROM CUSTOMER";
$result = $connection->query($sql);

if (!$result) {
    echo "Error: " . $connection->error;
} else {
?>
<!DOCTYPE html>
<html>
<head>
    <title>View Customer Info</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>Customer Information</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Customer ID</th>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Phone</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody> 
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                ?>
                    <tr>
                        <td><?php echo $row['customer_id']; ?></td>
                        <td><?php echo $row['customer_name']; ?></td>
                        <td><?php echo $row['customer_addr']; ?></td>
                        <td><?php echo $row['phone_num']; ?></td>
                        <td>
                            <a class="btn btn-info" href="updateforcust.php?customer_id=<?php echo $row['customer_id']; ?>">Edit</a>
                            <a class="btn btn-danger" href="deleteforcust.php?customer_id=<?php echo $row['customer_id']; ?>">Delete</a>
                        </td>
                    </tr>
                <?php
                    }
                } else {
                    echo "<tr><td colspan='5'>No customer information available</td></tr>";
                }
                ?>    
            </tbody>
        </table>
    </div> 
</body>
</html>
<?php
}
?>
