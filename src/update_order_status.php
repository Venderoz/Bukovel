<?php
    session_start();
    include "connection.php";
    $id = $_SESSION['id'];
    $orderId = $_GET['id'];
    $date = date('Y-m-d H:i:s');
    $query = "UPDATE orders SET is_realised = 1, order_time = '$date' WHERE user_id = $id AND ID = $orderId;";
    mysqli_query($conn, $query);

    mysqli_close($conn);
    header('Location: ../basket.php');
