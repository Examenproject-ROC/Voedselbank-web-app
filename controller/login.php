<?php
// Assuming you have a database connection established
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the posted data
    $naam = $_POST["Naam"];
    $wachtwoord = $_POST["Wachtwoord"];

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
            echo "Registratie gelukt!";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($your_db_connection);
        }
    }
}