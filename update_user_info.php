<?php
session_start();
// Change this to your connection info.
include "connection.php";

$username = htmlspecialchars(trim($_POST["username"]));
$password = trim($_POST["password"]);
$email = trim($_POST["email"]);
$birthdate = trim($_POST["birthdate"]);
 
$filename = $_FILES["userImage"]["name"];
$tempname = $_FILES["userImage"]["tmp_name"];
$folder = "./public/assets/" . $filename;
 
$msg = "";

$query1 = "SELECT * FROM users WHERE ID = " . $_SESSION['id'] . ";";
$result1 = $conn->query($query1);
$olddata = mysqli_fetch_assoc($result1);

if ($result1) {
    if (
        $olddata["username"] == $username &&
        $olddata["password"] == $password &&
        $olddata["email"] == $email &&
        $olddata["birthdate"] == $birthdate &&
        $filename == ""
    ) {
        $msg = 'Nothing to change here!';
        header("Location: account.php?msg=$msg");
    } else {
        if($filename != ""){
            move_uploaded_file($tempname, $folder);
            $query2 = "UPDATE users SET username = '$username', birthdate = '$birthdate', email = '$email', password = '$password', account_image = '$filename' WHERE id = " . $_SESSION['id'] . ";";
        } else {
            $query2 = "UPDATE users SET username = '$username', birthdate = '$birthdate', email = '$email', password = '$password' WHERE id = " . $_SESSION['id'] . ";";
        }
        $conn->query($query2);
        $msg = "Data changed successfully";
        header("Location: account.php?msg=$msg");
    }
}
