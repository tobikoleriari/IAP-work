<?php
require_once 'phpHandler.php';
$user = new phpHandler($conn);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userId = $_POST['userId'];
    if ($user->delete($userId)) {
        echo "User deleted successfully!";
    } else {
        echo "Error deleting user.";
    }
}
