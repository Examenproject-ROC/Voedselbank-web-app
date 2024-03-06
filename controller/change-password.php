<?php

function updateUserData($user_id, $new_naam, $new_wachtwoord)
{
    global $your_db_connection;

    //User check
    if (empty($user_id) || empty($new_naam) || empty($new_wachtwoord)) {
        echo "Vul u huidige gebruikersnaam en wachtwoord in.";
        return;
    }

    // Hash the new password (you should use password_hash() in a real scenario)
    $hashedPassword = md5($new_wachtwoord);

    // Update the data in the database based on user ID
    $sql = "UPDATE gebruikers SET Naam = '$new_naam', Wachtwoord = '$hashedPassword' WHERE User_ID = $user_id";

    // Perform the query
    if (mysqli_query($your_db_connection, $sql)) {
        echo "Update successful!";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($your_db_connection);
    }
}

// Example usage
$user_id_to_update = 1; // Replace with the actual user ID you want to update
$new_name = "NewName";
$new_password = "NewPassword";

updateUserData($user_id_to_update, $new_name, $new_password);
