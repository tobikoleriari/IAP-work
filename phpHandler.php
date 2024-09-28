<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once 'db.php';
class phpHandler
{
    private $db;

    // Constructor 
    public function __construct($conn)
    {
        $this->db = $conn;
    }
    //insert user data
    public function insertData($name, $email, $username, $password)
    {
        try {
            // Check if username or email already exists
            $sql = "SELECT COUNT(*) FROM users WHERE username = :username OR email = :email";
            $stmt = $this->db->prepare($sql);
            $stmt->execute(['username' => $username, 'email' => $email]);
            $count = $stmt->fetchColumn();

            if ($count > 0) {
                return "Error: Username or email already exists!";
            }

            $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
            $sql = "INSERT INTO users(fullname, username, email, password) VALUES(:fullname, :username, :email, :password)";
            $stmt = $this->db->prepare($sql);
            $stmt->execute(['fullname' => $name, 'email' => $email, 'username' => $username, 'password' => $hashedPassword]);

            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
    // OBTAIN USER DATA
    public function fetchData()
    {
        $sql = "SELECT * FROM users";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);

        header('Location: phpHandler.php');
    }
}
