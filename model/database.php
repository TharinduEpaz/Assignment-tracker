<?php 

$dsn = 'mysql:host=localhost;dbname=assignment_tracker';
$username = 'root';
// $password = 'stil not give a password;

// Both MySQLi and PDO have their advantages:

// PDO will work on 12 different database systems, whereas MySQLi will only work with MySQL databases.

// oth are object-oriented, but MySQLi also offers a procedural API.

try{
    $db = new PDO($dsn, $username);
}catch(PDOException $e){
    $error = "database error : ".$e->getMessage();
    include('view/error.php');
    exit();
}