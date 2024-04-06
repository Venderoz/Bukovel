<?php
session_start();
    include "connection.php";
    $id = $_SESSION['id'];
    $query = "DELETE FROM users WHERE ID = $id;";
    mysqli_query($conn, $query);
    mysqli_close($conn);
session_destroy();
// Redirect to the login page:
header('Location: login.php');