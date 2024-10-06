<?php
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

// Retrieve form data
$emailOrPhone = $_POST['email_or_phone'];
$password = $_POST['password'];

// Prepare and execute the query
$stmt = $conn->prepare("SELECT password FROM registration WHERE email = ? OR phone_number = ?");
$stmt->bind_param("ss", $emailOrPhone, $emailOrPhone);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows > 0) {
    // Bind result variables
    $stmt->bind_result($hashed_password);
    $stmt->fetch();

    // Verify the password
    if (password_verify($password, $hashed_password)) {
        // Password is correct
        header("Location: dashboard.html"); // Redirect to a dashboard or welcome page
    } else {
        // Invalid password
        echo "Invalid password.";
    }
} else {
    // No user found
    echo "No user found with this email or phone number.";
}

// Close statement and connection
$stmt->close();
$conn->close();
?>
