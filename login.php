<?php
// Replace these values with your MySQL RDS database credentials
$host = "localhost";
$username = "newuser";
$password = "password";
$dbname = "details";

// Connect to the database
$conn = mysqli_connect($host, $username, $password, $dbname);

// Check if the connection was successful
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get the form data
$email = $_POST['email'];
$password = $_POST['password'];

// Validate the form data
if (empty($email) || empty($password)) {
    die("Please enter your email and password");
}

// Query the database for a user with the specified email and password
$sql = "SELECT * FROM login WHERE email = '$email' AND password = '$password'";
$result = mysqli_query($conn, $sql);

// Check if a matching user was found
if (mysqli_num_rows($result) == 1) {
    // Start a session and set the user as logged in
    session_start();
    $_SESSION['loggedin'] = true;
    $_SESSION['email'] = $email;
    
    // Show success message
            echo "Login successful.";
    exit();
} else {
    // Display an error message and allow the user to try again
    echo "Invalid email or password. Please try again.";
}

// Close the database connection
mysqli_close($conn);
?>

