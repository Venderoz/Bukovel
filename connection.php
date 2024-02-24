<?php 
    $host = 'localhost';
    $user = 'root';
    $password = '';
    $db_name = 'bukovel_db';
    $conn = mysqli_connect($host, $user, $password, $db_name);
    if (mysqli_connect_errno()) {
      exit('Failed to connect to MySQL: ' . mysqli_connect_error());
    }
?>