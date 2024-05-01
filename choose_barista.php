<?php
// Start session (if not already started)
include 'create_connection.php';
session_start();

// Fetch baristas from the database
$sql = "SELECT * FROM EMPLOYEE WHERE barista = 1";
$result = mysqli_query($connection, $sql);

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if a barista is selected and tip amount is provided
    if (isset($_POST["barista"]) && !empty($_POST["barista"]) && isset($_POST["tip"]) && !empty($_POST["tip"])) {
        // Get the selected barista and tip amount
        $selected_barista = $_POST["barista"];
        $tip_amount = $_POST["tip"];

        // Process the order, update the database, etc.

        // Redirect to a thank you page or any other page you want
        header("Location: thank_you.php");
        exit;
    } else {
        // If barista or tip amount is not provided, display an error message
        $error_message = "Please select a barista and enter the tip amount.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Choose Barista</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div id="main-content">
        <h2>Choose Your Barista</h2>
        <?php
        if (isset($error_message)) {
            echo "<p class='error'>$error_message</p>";
        }
        ?>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <select name="barista" required>
                <option value="">Select Barista</option>
                <?php
                // Add default baristas
                $default_baristas = array("Carlos", "Alex", "Raja");
                foreach ($default_baristas as $barista_name) {
                    echo "<option value='$barista_name'>$barista_name</option>";
                }

                // Display options for selecting a barista from the database
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<option value='" . $row['employee_id'] . "'>" . $row['employee_name'] . "</option>";
                }
                ?>
            </select>
            <label for="tip">Enter Tip Amount:</label>
            <input type="number" name="tip" required>
            <input type="submit" value="Submit">
        </form>
    </div>
</body>
</html>
