<?php
session_start();

// Error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Check if the form was submitted via POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_otp = trim($_POST['otp']); // Get the OTP entered by the user

    if ($user_otp == $_SESSION['otp']) {
        require_once 'Users.php';

        // Get the user data from the session
        $user_data = $_SESSION['user_data'];
        $user = new Users();

        // Create the user in the database
        if ($user->createUser($user_data['fullname'], $user_data['username'], $user_data['email'], $user_data['password'])) {
            // User successfully created, clear session and redirect
            unset($_SESSION['otp']); // Clear the OTP from the session
            unset($_SESSION['user_data']); // Clear user data from the session
            header("Location: userTable.php");
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
    <title>Verify OTP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.0/font/bootstrap-icons.min.css" rel="stylesheet">
    <style>
        .otp-section {
            background-color: #343a40;
            color: white;
            padding: 2rem;
            border-radius: 10px;
            max-width: 400px;
            margin: auto;
            margin-top: 100px;
        }
        .otp-section h1 {
            text-align: center;
        }
    </style>
</head>
<body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

<div class="otp-section">
    <h1>Verify OTP</h1>
    <form action="otp.php" method="POST">
        <div class="mb-3">
            <label for="otp" class="form-label">Enter OTP</label>
            <input type="text" class="form-control" placeholder="Enter OTP" id="otp" name="otp" required>
        </div>
        <button type="submit" class="btn btn-primary w-100">Verify</button>
    </form>
</div>

</body>
</html>
