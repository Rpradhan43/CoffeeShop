<?php
// Include the database connection file
include 'create_connection.php';

// Retrieve current customer information
$sql = "SELECT * FROM CUSTOMER LIMIT 1";
$result = mysqli_query($connection, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Customer Information</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="home.html">Coffee Shop</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item"><a class="nav-link" href="home.html">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="orders.php">Orders</a></li>
            </ul>
        </div>
    </nav>
</header>

<div id="main-content">
    <h2>Update Customer Information</h2>
    <form method="post" action="update_customer.php">
        <div class="form-group">
            <label for="customer_name">Name:</label>
            <input type="text" id="customer_name" name="customer_name" required>
        </div>
        <div class="form-group">
            <label for="phone_num">Phone Number:</label>
            <input type="text" id="phone_num" name="phone_num" required>
        </div>
        <div class="form-group">
            <label for="customer_addr">Address:</label>
            <textarea id="customer_addr" name="customer_addr" required></textarea>
        </div>
        <input type="submit" name="update_customer" value="Update Customer">
    </form>

    <!-- Display current customer information if available -->
    <h2>Current Customer Information</h2>
    <table class="table table-dark">
        <thead>
        <tr>
            <th>Name</th>
            <th>Phone Number</th>
            <th>Address</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <?php
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['customer_name'] . "</td>";
                echo "<td>" . $row['phone_num'] . "</td>";
                echo "<td>" . $row['customer_addr'] . "</td>";
                echo "<td>
                        <form method='post' action='update_customer.php'>
                            <input type='hidden' name='customer_id' value='" . $row['customer_id'] . "'>
                            <input type='submit' name='delete_customer' value='Delete' class='btn btn-danger'>
                        </form>
                      </td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='4'>No customer information available</td></tr>";
        }
        ?>
        </tbody>
    </table>
</div>

<footer class="footer">
    <p style="text-align: center;">Contact us: email@example.com</p>
</footer>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>
</html>
