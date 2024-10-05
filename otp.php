<?php
session_start();

// Error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Check if the form was submitted via POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_otp = trim($_POST['otp']); // Get the OTP entered by the user

    // Check if the entered OTP matches the session OTP
    if ($user_otp == $_SESSION['otp']) {
        // Include the User class and proceed to user creation
        require_once 'User.php';

        // Get the user data from the session
        $user_data = $_SESSION['user_data'];
        $user = new User();

        // Create the user in the database
        if ($user->createUser($user_data['username'], $user_data['email'], $user_data['password'])) {
            // User successfully created, clear session and redirect
            unset($_SESSION['otp']); // Clear the OTP from the session
            unset($_SESSION['user_data']); // Clear user data from the session
            header("Location: ViewUsers.html"); // Redirect to the user view page
            exit;
        } else {
            echo "<p class='error'>Error registering user.</p>";
        }
    } else {
        // If the OTP does not match, display an error
        echo "<p class='error'>Invalid OTP. Please try again.</p>";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<div class="row">
  <div class="col">
    <form action="otp.php" method="POST">
        <label for="otp">Enter OTP</label>
    <input type="text" class="form-control" placeholder="Enter OTP" id="otp" name="otp" aria-label="First name">
  </div>
  <button type="submit" class="btn btn-primary">Verify</button>
</div>
</body>
</html>

