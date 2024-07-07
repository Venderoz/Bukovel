<?php
if (!isset($_SESSION['loggedin'])) {
    header("Location: ../Bukovel/login.php");
    exit;
}
