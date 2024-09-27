<?php
$host = 'localhost';
$dbname = 'calc'; 
$username = 'root'; 
$password = ''; 
// $host = 'localhost';
// $dbname = 'airlitq9_wp689'; 
// $username = 'airlitq9_wp689'; 
// $password = 'iXI@S254@p'; 

// Create a new PDO instance and set error mode to exception
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    // Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // Optionally set the default fetch mode
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    // Optionally set character encoding
    $pdo->exec("set names utf8");
    // echo "Database connection successful.";
} catch (PDOException $e) {
    // Handle connection errors
    echo "Database connection failed: " . $e->getMessage();
}