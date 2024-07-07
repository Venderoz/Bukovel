<?php
session_start();
include "connection.php";

$username = htmlspecialchars(trim($_POST["username"]));
$password = trim($_POST["password-1"]);
$password2 = trim($_POST["password-2"]);
$email = trim($_POST["email"]);
$birthdate = trim($_POST["birthdate"]);

$msg = "";

if ($stmt = $conn->prepare('SELECT ID, password FROM users WHERE username = ?')) {
    $username = trim($_POST["username"]);
    $stmt->bind_param('s', $username);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $userPassword);
        $stmt->fetch();
        if ($_POST['password'] === $userPassword) {
            session_regenerate_id();
            $_SESSION['loggedin'] = TRUE;
            $_SESSION['name'] = htmlspecialchars($_POST['username']);
            $_SESSION['id'] = $id;
            header("Location: ../account.php");
        } else {
            $msg = 'Incorrect username and/or password!';
            header("Location: ../login.php?msg=$msg");
        }
    } else {
        $msg = 'Incorrect username and/or password!';
        header("Location: ../login.php?msg=$msg");
    }

    $stmt->close();
}
