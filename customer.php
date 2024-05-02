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
    <title>Customer Information</title>
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

<body>
    <section>
        <h1 style="text-align: center;margin: 50px 0;">Customer Info</h1>
        <div class="container">
            <form action="update_customer.php" method="post">
               <div class="row">
                    <div class="form-group col-lg-4">
                        <label for="">Name</label>
                        <input type="text" name="name" id="name" class="form-control" required>
                    </div>
                    <div class="form-group  col-lg-3">
                        <label for="">Address</label>
                        <input type="text" name="customer_addr" id="customer_addr" class="form-control" required>
                    </div>
                    <div class="form-group col-lg-3">
                        <label for="">Phone</label>
                        <input type="number" name="phone_num" id="phone_num" class="form-control" required>
                    </div>
                    <div class="form-group col-lg-2" style="display: grid;align-items:  flex-end;">
                        <input type="submit" name="submit" id="submit" class="btn btn-primary">
                    </div>
               </div>
            </form>
        </div>
    </section>
</body>

    <!-- Display current customer information if available -->
    <h2>Current Customer Information</h2>
    <table class="table table-dark">
        <thead>
        <tr>
            <th>Name</th>
            <th>Phone Number</th>
            <th>Address</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $sql = "SELECT * FROM CUSTOMER LIMIT 1";
        $result = mysqli_query($connection, $sql);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['customer_name'] . "</td>";
                echo "<td>" . $row['phone_num'] . "</td>";
                echo "<td>" . $row['customer_addr'] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='3'>No customer information available</td></tr>";
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
