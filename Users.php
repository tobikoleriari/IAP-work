<?php
require_once 'phpHandler.php'; // Include the database handler

class Users {
    private $dbHandler;

    public function __construct() {
       
        $conn = new PDO('mysql:host=localhost;dbname=iap-work', 'root', ''); 
        $this->dbHandler = new phpHandler($conn);
    }

    public function createUser( $fullname, $username, $email,$gender, $password) {
        // Create the user by inserting the data using phpHandler
        return $this->dbHandler->insertData($fullname, $email, $username,$gender, $password);
    }
}
?>

