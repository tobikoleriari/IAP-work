<?php
require_once 'db.php';
require_once 'phpHandler.php';
$conn=new PDO('mysql:host=localhost;dbname=iap-work','root','');

if($_SERVER['REQUEST METHOD']=='POST'){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $username=$_POST['username'];
    $password=$_POST['password'];
}
$user=new phpHandler($conn);
$user->insertData($name,$email,$username,$password);
