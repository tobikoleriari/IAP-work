<?php
class phpHandler{
    private $db;

   // Constructor 
public function __construct($pdo){
    $this->db = $pdo;
}
//insert user data
public function insertData($name, $email, $password){
    $hashedPassword= password_hash($password,PASSWORD_BCRYPT);
    $sql = "INSERT INTO users(name, email, password) VALUES(:name, :email, :password)";
    $stmt = $this->db->prepare($sql);
    $stmt->execute(['name' => $name, 'email' => $email, 'password' => $hashedPassword]);
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
