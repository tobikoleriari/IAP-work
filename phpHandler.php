<?php
require_once 'db.php';
class phpHandler{
    private $db;

   // Constructor 
public function __construct($conn){
    $this->db = $conn;
}
//insert user data
public function insertData($name, $email, $username, $password){
    $hashedPassword= password_hash($password,PASSWORD_BCRYPT);
    $sql = "INSERT INTO users(name, email, username, password) VALUES(:name, :email, :username, :password)";
    $stmt = $this->db->prepare($sql);
    $stmt->execute(['name' => $name, 'email' => $email, 'username' => $username, 'password' => $hashedPassword]);
    return true;

}
// OBTAIN USER DATA
public function fetchData(){
$sql="SELECT* FROM users";
$stmt=$this->db->prepare($sql);
$stmt->execute;
return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

}
?>
