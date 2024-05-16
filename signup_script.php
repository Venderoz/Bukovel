<?php
session_start();


    include "connection.php";

    $username = htmlspecialchars(trim($_POST["username"]));
    $password = trim($_POST["password-1"]);
    $password2 = trim($_POST["password-2"]);
    $email = trim($_POST["email"]);
    $birthdate = trim($_POST["birthdate"]);

    $msg = "";

    $query1 = "SELECT * FROM users WHERE username='$username' OR email='$email'";

    $result = $conn->query($query1);

    $num = mysqli_num_rows($result);

    if ($num == 0) {
        $regex = '/^(?=.*[A-Z])(?=.*\d).{8,}$/';
        if (preg_match($regex, $password)) {
            if ($password == $password2) {
                $query2 = "INSERT INTO users (username, birthdate, email, password) VALUES ('$username','$birthdate','$email','$password');";

                $result = $conn->query($query2);
                if ($result) {
                    header("Location: account.php");
                }
            } else {
                $msg = "Passwords are not the same";
                header("Location: signup.php?msg=$msg");
            }
        } else {
            $msg = "Password has to be minimum 8 letters long, contain at least one number and one big letter";
            header("Location: signup.php?msg=$msg");
        }
    } elseif ($num > 0) {
        $msg = "This data is already in use";
        header("Location: signup.php?msg=$msg");
    }

session_destroy();
