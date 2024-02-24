<?php
session_start();

if (isset($_POST["submit"])) {

    include "connection.php";

    $username = $_POST["username"];
    $password = $_POST["password"];
    $email = $_POST["email"];
    $birthdate = $_POST["birthdate"];
    $phone = $_POST["phone"];

    $err = "";

    $query1 = "SELECT * FROM users WHERE username='$username' OR email='$email'";

    $result = mysqli_query($conn, $query1);

    $num = mysqli_num_rows($result);

    // This sql query is use to check if 
    // the username is already present  
    // or not in our Database 
    if ($num == 0) {
        // Password Hashing is used here.  
        $query2 = "INSERT INTO users (username, birthdate, email, password, phone_number) VALUES ('$username','$birthdate','$email','$password','$phone_number');";

        $result = mysqli_query($conn, $query2);
        if($result){
            header("Location: account.php");
        }
    } else if ($num > 0) {
        $err = "This data is already in use";
        header("Location: signup.php?err=$err");
    }
}
session_destroy();
