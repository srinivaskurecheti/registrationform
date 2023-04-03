<?php
// Replace these values with your MySQL RDS database credentials
#print_r($_POST);
#error_reporting(E_ALL);
#ini_set('display_errors', 1);

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
$full_name = $_POST['full_name'];
$email = $_POST['email'];
$password = $_POST['password'];

// Insert the data into the database
$sql = "INSERT INTO login (username, email, password) VALUES ('$full_name', '$email', '$password')";
// Assume $email is the email address entered by the user

$sql = "SELECT * FROM login WHERE email = '$email'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // Email already exists, display a message to the user
	echo "You are already registered.Please <a href='login.html'>login</a> instead.";
} else {
    // Email does not exist, insert a new row into the database
	#$sql = "INSERT INTO users (email, password) VALUES ('$email', '$password')";
	#mysqli_query($conn, $sql);
	if (mysqli_query($conn, $sql)) {
    echo "Registration successful";
      } 
	else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

}


#if (mysqli_query($conn, $sql)) {
 #   echo "Registration successful";
#} else {
#    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
#}

// Close the database connection
mysqli_close($conn);
?>
