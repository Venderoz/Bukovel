<?php
session_start();

if (isset($_POST["submit"])) {

    include "connection.php";

    $username = $_POST["username"];
    $password = $_POST["password-1"];
    $password2 = $_POST["password-2"];
    $email = $_POST["email"];
    $birthdate = $_POST["birthdate"];

    $err = "";

    $query1 = "SELECT * FROM users WHERE username='$username' OR email='$email'";

    $result = mysqli_query($conn, $query1);

    $num = mysqli_num_rows($result);

    if ($num == 0) {
        $regex = '/^.{8}$/';
        // if (preg_match($password, $regex)) {
            echo "<script>alert('Hi')</script>";
            if ($password == $password2) {
                $query2 = "INSERT INTO users (username, birthdate, email, password) VALUES ('$username','$birthdate','$email','$password');";

                $result = mysqli_query($conn, $query2);
                if ($result) {
                    header("Location: account.php");
                }
            } else {
                $err = "Passwords are not the same";
                header("Location: signup.php?err=$err");
            }
        // } else {
        //     $err = "Password has to have minimum 8 letters in length";
        //     header("Location: signup.php?err=$err");
        // }
    } else if ($num > 0) {
        $err = "This data is already in use";
        header("Location: signup.php?err=$err");
    }
}
session_destroy();
