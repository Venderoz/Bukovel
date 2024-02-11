<?php
session_start();
// Change this to your connection info.
$host = 'localhost';
$user = 'root';
$password = '';
$db_name = 'bukovel_db';

$res = "";
// Try and connect using the info above.
$conn = mysqli_connect($host, $user, $password, $db_name);
if (mysqli_connect_errno()) {
    // If there is an error with the connection, stop the script and display the error.
    exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}

if (!isset($_POST['username'], $_POST['password'])) {
    // Could not get the data that should have been sent.
    exit('Please fill both the username and password fields!');
}



// Prepare our SQL, preparing the SQL statement will prevent SQL injection.
if ($stmt = $conn->prepare('SELECT ID, password FROM users WHERE username = ?')) {
    // Bind parameters (s = string, i = int, b = blob, etc), in our case the username is a string so we use "s"
    $stmt->bind_param('s', $_POST['username']);
    $stmt->execute();
    // Store the result so we can check if the account exists in the database.
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $userPassword);
        $stmt->fetch();
        // Account exists, now we verify the password.
        // Note: remember to use password_hash in your registration file to store the hashed passwords.
        if ($_POST['password'] === $userPassword) {
            // Verification success! User has logged-in!
            // Create sessions, so we know the user is logged in, they basically act like cookies but remember the data on the server.
            session_regenerate_id();
            $_SESSION['loggedin'] = TRUE;
            $_SESSION['name'] = $_POST['username'];
            $_SESSION['id'] = $id;
            header("Location: account.php");
        } else {
            // Incorrect password
            $res = 'Incorrect username and/or password!';
            header("Location: login.php?res=$res");
        }
    } else {
        // Incorrect username
        $res = 'Incorrect username and/or password!';
        header("Location: login.php?res=$res");
    }

    $stmt->close();
}