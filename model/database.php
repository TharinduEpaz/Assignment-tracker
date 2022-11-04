<?php 

$dsn = 'mysql:host=localhost;dbname=assignment_tracker';
$username = 'root';
// $password = 'stil not give a password;

try{
    $db = new PDO($dsn, $username);
}catch(PDOException $e){
    $error = "database error : ".$e->getMessage();
    include('view/error.php');
    exit();
}