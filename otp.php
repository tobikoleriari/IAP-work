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

<?php
session_start();

// if(isset($_POST['otp'])){
//     $otp = $_POST['otp'];
//     if($otp == $_SESSION['otp']){
//         echo "OTP verified";
//     }else{
//         echo "OTP not verified";
//     }
// }


if($_SERVER["REQUEST_METHOD"] == "POST"){
    $user_otp = $_POST['otp'];
   
    }
    if($user_otp == $_SESSION['otp']){
        require_once 'displayUsers.php';
    }