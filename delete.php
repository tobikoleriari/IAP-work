<?php
require_once 'phpHandler.php';
$user = new phpHandler($conn);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userId = $_POST['userId'];
    if ($user->delete($userId)) {
      header("Location: userTable.php");   
    } else {
        echo "Error deleting user.";
    }
}
