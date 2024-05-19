<?php
session_start();
    include "connection.php";
    $query = "DELETE FROM orders WHERE ID = " . $_GET['id'] . ";";
    mysqli_query($conn, $query);
    mysqli_close($conn);
header('Location: basket.php');