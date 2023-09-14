<?php

$host = 'localhost';
$dbname = 'a';
$dbusername = 'root';
$dbpassword = '';

try{
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $dbusername, $dbpassword);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

}catch (PDOException $e){
    echo "Database Connection failed: " . $e->getMessage();
}
