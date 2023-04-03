<?php
// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Retrieve the email and password values from the form
  $email = $_POST['email'];
  $password = $_POST['password'];

  // Connect to the MySQL database
  $conn = mysqli_connect('localhost', 'newuser', 'password', 'details');

  // Check if the email exists in the database
  $query = "SELECT * FROM login WHERE email='$email'";
  $result = mysqli_query($conn, $query);

  if (mysqli_num_rows($result) === 0) {
    // Email does not exist, display an error message
    echo "Email not found in the database.";
  } else {
    // Email exists, update the password for the user
    $query = "UPDATE login SET password='$password' WHERE email='$email'";
    $result = mysqli_query($conn, $query);

    // Display a success message
    echo "Your password has been updated.Please <a href='login.html'>login</a> instead.";
  }

  // Close the database connection
  mysqli_close($conn);
}
?>

