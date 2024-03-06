<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";

//connectie naar database
try {
    $conn = new PDO("mysql:host=$servername;dbname=mydb", $username, $password);

    //connectie check
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}