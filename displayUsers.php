<?php
require_once 'phpHandler.php';

$conn=new PDO('mysql:host=localhosst;dbname=iap-work','root','');
$user =new phpHandler($conn);
$users=$user->fetchData();
?>
