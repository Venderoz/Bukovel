<?php
session_start();
    include "checkLogin.php";
    include "connection.php";

    $id = $_SESSION['id'];

    $seasonName = $_POST['season'] == "" ? "todays skipass" : $_POST['season'];
    $status = $_POST["status-name"];
    $equipmentName = $_POST["equipment-name"];
    $category = $_POST["equipment-category"];
    $daysNumber = !isset($_POST["days-number"]) ? 1 : $_POST["days-number"];

    $getSkipassData = "SELECT ID, price FROM skipasses WHERE season LIKE '$seasonName' AND days_number = $daysNumber AND status LIKE '$status';";

    $getEquipmentData = "SELECT ID, price FROM equipment WHERE equipment_name LIKE '$equipmentName' AND days_num = $daysNumber AND category LIKE '$category';";
    
    $skipass = mysqli_fetch_assoc(mysqli_query($conn, $getSkipassData));
    $equipment = mysqli_fetch_assoc(mysqli_query($conn, $getEquipmentData));

    $skipassID = $skipass['ID'];
    $equipmentID = $equipment['ID'];

    $finalPrice = $skipass['price'] + $equipment['price'];

    $insertionQuery = "INSERT INTO orders (user_id, skipass_id, equipment_id, payment) VALUES ('$id', '$skipassID', '$equipmentID', '$finalPrice');";

    mysqli_query($conn, $insertionQuery);
    header("Location: ../basket.php");