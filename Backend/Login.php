<?php
session_start();
$host = "localhost";
$user = "root"; // Change this to your database username
$password = ""; // Change this to your database password
$database = "Gabaya"; // Change this to your database name

// Connect to database
$conn = new mysqli($host, $user, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);

    // Prevent SQL injection
    $username = mysqli_real_escape_string($conn, $username);
    $email = mysqli_real_escape_string($conn, $email);

    // Query the database
    $sql = "SELECT * FROM users WHERE username='$username' AND email='$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Fetch the user row from the database
        $row = $result->fetch_assoc();

        // Store user information in session variables
        $_SESSION['username'] = $username;
        $_SESSION['id'] = $row['id'];  // Added user id to session

        // Display a success message before redirecting if needed
        echo "Login successful! Redirecting...";

        // Immediate redirect to the index page
        header("Location: ../pages/index.php");
        exit(); // Always call exit after redirecting
    } else {
        echo "Invalid credentials. Please try again.";
    }
}

$conn->close();
?>
