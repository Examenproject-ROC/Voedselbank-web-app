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

// Assuming you have a database connection established
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the posted data
    $naam = $_POST["naam"];
    $wachtwoord = $_POST["wachtwoord"];

    // Perform some basic validation, you may need more depending on your requirements
    if (empty($naam) || empty($wachtwoord)) {
        echo "Please enter both name and password.";
    } else {
        // Hash the password (you should use password_hash() in a real scenario)
        $hashedPassword = md5($wachtwoord);

        // Insert the data into the database
        $sql = "INSERT INTO gebruikers (Naam, Wachtwoord) VALUES ('$naam', '$hashedPassword')";

        // Perform the query
        if (mysqli_query($your_db_connection, $sql)) {
            echo "Registration successful!";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($your_db_connection);
        }
    }
}

// Close the database connection after use
mysqli_close($your_db_connection);
