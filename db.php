<?
try{
    $pdo =new PDO('mysql:host=localhost;dbname=iap-work','root','');
    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e){
    echo "Connection failed: ".$e->getMessage();
}
?>