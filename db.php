<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$servername = "localhost";
$username ="root";
$password = "";

try{
    $conn =new PDO('mysql:host=localhost;dbname=iap-work','root','');
    $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    // echo "Connected successfully!!!!";
} catch(PDOException $e){
    echo "Connection failed: ".$e->getMessage();
}
?>