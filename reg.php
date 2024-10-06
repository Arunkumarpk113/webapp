<?php
// Enable error reporting for development (remove or comment out in production)
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Database configuration
$servername = "localhost";
$username = "arun"; // Update with your database username
$password = "pass123"; // Update with your database password
$dbname = "ar"; // Update with your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form data is set
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data and sanitize it
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);
    $password = trim($_POST['password']);

    // Hash the password before storing it
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO registration (name, email, phone_number, password) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $name, $email, $phone, $hashed_password);

    // Execute the statement
    if ($stmt->execute()) {
        // Redirect to the result page with query parameters
        header("Location: result.html?name=" . urlencode($name) . "&email=" . urlencode($email));
        exit(); // Ensure no further code is executed after redirection
    } else {
        echo "Error: " . $stmt->error; // Display error message
    }

    // Close statement and connection
    $stmt->close();
}

// Close the connection
$conn->close();
?>

