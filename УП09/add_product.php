<?php
// Start the session to access the user's ID
session_start();

// Database connection details
$dbHost = 'localhost';
$dbUsername = 'root';
$dbPassword = '';
$dbName = 'shop';

// Create a database connection
$conn = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_product'])) {
    // Retrieve the form data
    $image = $_POST['image'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];

    // Проверка наличия сообщения в сессии
if (isset($_SESSION['message'])) {
    // Вывод сообщения с помощью JavaScript
    echo '<script>alert("' . htmlspecialchars($_SESSION['message']) . ' 😊");</script>';
    
    // Удаление сообщения из сессии после его вывода
    unset($_SESSION['message']);
}
    // Prepare the SQL statement to insert the product with NULL users_id
    $stmt = $conn->prepare("INSERT INTO products (image, name, description, price) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("sssd", $image, $name, $description, $price);

    // Execute the product insert statement
    if ($stmt->execute()) {
        // Redirect to a success page or back to the form
        header("Location: admin_panel.php");
        exit;
    } else {
        // Handle the error
        echo "Error inserting product: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
}

// Close the database connection
$conn->close();
?>