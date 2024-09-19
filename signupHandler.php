<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once 'db.php';
require_once 'phpHandler.php';
$conn = new PDO('mysql:host=localhost;dbname=iap-work', 'root', '');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['fullname'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $user = new phpHandler($conn);
    $user->insertData($name, $username, $email, $password);
    echo "User successfully registered!";
} else {
    echo "Failed to register user!";
}
