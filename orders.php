<?php
// Start session (if not already started)
include 'create_connection.php';
session_start()
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Orders</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="home.html">Coffee Shop</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
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
    <h2>Choose Your Drink</h2>
    <form method="post" action="order_add.php" id="orderForm">
        <input type="radio" name="drink" value="caramel macchiato"> Caramel Macchiato<br>
        <input type="radio" name="drink" value="iced vanilla latte"> Iced Vanilla Latte<br>
        <input type="radio" name="drink" value="iced white chocolate mocha"> Iced White Chocolate Mocha<br>
        <input type="radio" name="drink" value="raspberry cappuccino"> Raspberry Cappuccino<br>
        <<form method="post" action="order_custom_drink.php">
            <input type="text" name="custom_drink" placeholder="Enter custom drink">
            <input type="submit" value="Add Custom Drink">
        </form>
        <input type="submit" value="Place Order">
    </form>

    <script>
        document.querySelector('input[name="drink"]').addEventListener('change', function() {
            if (this.value === 'custom') {
                document.getElementById('customDrinkInput').style.display = 'block';
            } else {
                document.getElementById('customDrinkInput').style.display = 'none';
            }
        });
    </script>
        
        <h2>Current Order</h2>
        <table class="table table-dark">
            <thead>
                <tr>
                    <th>Drink</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Display current order details
                if (isset($_SESSION["order"]) && !empty($_SESSION["order"])) {
                    foreach ($_SESSION["order"] as $drink) {
                        echo "<tr>";
                        echo "<td>$drink</td>";
                        echo "<td>
                                <form method='post' action='delete.php'>
                                    <input type='hidden' name='drink' value='$drink'>
                                    <input type='submit' name='deletebtn' value='Delete' class='btn btn-danger'>
                                </form>
                              </td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='2'>No drinks in the current order</td></tr>";
                }
                ?>
            </tbody>
        </table>

        <form method="post" action="choose_barista.php">
            <input type="submit" value="Finish Order">
        </form>
    </div>
    </div>

    <footer class="footer">
        <p style="text-align: center;">Contact us: email@example.com</p>
    </footer>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>
</html>
