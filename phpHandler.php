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
    public function insertData($fullname,$username, $email, $password,$gender)
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
            $sql = "INSERT INTO users(fullname,username,email,gender,password) VALUES(:fullname,:username, :email,:gender, :password)";
            $stmt = $this->db->prepare($sql);
            $stmt->execute(['fullname' => $fullname,'username' => $username, 'email' => $email, 'gender' =>$gender, 'password' => $hashedPassword]);

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

    public function fetchSingleUser($userId) {
        $sql = "SELECT * FROM users WHERE userId = :userId";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':userId', $userId, PDO::PARAM_INT); // Bind parameter properly
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    
    public function update($fullname, $username, $email, $gender, $password, $id) {
        $sql = "UPDATE users SET fullname = :fullname, username = :username, email = :email, gender = :gender, password = :password WHERE userId = :id";
        $params = [
            'fullname' => $fullname,
            'username' => $username,
            'email' => $email,
            'gender' => $gender,
            'password' => $password,
            'id' => $id
        ];
        $stmt = $this->db->prepare($sql);
        return $stmt->execute($params);
    }
    public function delete($userId)
    {
        $stmt = $this->db->prepare("DELETE FROM users WHERE userId = :userId");
        return $stmt->execute(['userId' => $userId]);
    }
}
