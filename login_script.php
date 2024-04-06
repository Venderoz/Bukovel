<?php
session_start();
// Change this to your connection info.
include "connection.php";

$err = "";


// Prepare our SQL, preparing the SQL statement will prevent SQL injection.
if ($stmt = $conn->prepare('SELECT ID, password FROM users WHERE username = ?')) {
    // Bind parameters (s = string, i = int, b = blob, etc), in our case the username is a string so we use "s"
    $username = trim($_POST["username"]);
    $stmt->bind_param('s', $username);
    $stmt->execute();
    // Store the result so we can check if the account exists in the database.
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $userPassword);
        $stmt->fetch();
        // Account exists, now we verify the password.
        if ($_POST['password'] === $userPassword) {
            // Verification success! User has logged-in!
            // Create sessions, so we know the user is logged in, they basically act like cookies but remember the data on the server.
            session_regenerate_id();
            $_SESSION['loggedin'] = TRUE;
            $_SESSION['name'] = htmlspecialchars($_POST['username']);
            $_SESSION['id'] = $id;
            header("Location: account.php");
        } else {
            // Incorrect password
            $err = 'Incorrect username and/or password!';
            header("Location: login.php?res=$err");
        }
    } else {
        // Incorrect username
        $err = 'Incorrect username and/or password!';
        header("Location: login.php?res=$err");
    }

    $stmt->close();
}