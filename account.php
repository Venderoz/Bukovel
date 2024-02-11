<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
    header('Location: login.php');
    exit;
}
$host = 'localhost';
$user = 'root';
$password = '';
$db_name = 'bukovel_db';
$conn = mysqli_connect($host, $user, $password, $db_name);
if (mysqli_connect_errno()) {
    exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}
// We don't have the password or email info stored in sessions, so instead, we can get the results from the database.
$stmt = $conn->prepare('SELECT password, email, birthdate, phone_number, account_image FROM users WHERE id = ?');
// In this case we can use the account ID to get the account info.
$stmt->bind_param('i', $_SESSION['id']);
$stmt->execute();
$stmt->bind_result($password, $email, $birthdate, $phoneNumber, $accountImage);
$stmt->fetch();
$stmt->close();
?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Profile Page</title>
    <link href="style.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer">
    <style>
        .user-pfp-box{
            height: 200px;
            width: 200px;
        }
    </style>
</head>

<body class="loggedin">
    <nav class="navtop">
        <div>
            <h1>Website Title</h1>
            <a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
        </div>
    </nav>
    <div class="content">
        <h2>Profile Page</h2>
        <div>
            <p>Your account details are below:</p>
            <table>
                <tr>
                    <td>Username:</td>
                    <td><?= $_SESSION['name'] ?></td>
                </tr>
                <tr>
                    <td>Password:</td>
                    <td><?= $password ?></td>
                </tr>
                <tr>
                    <td>Email:</td>
                    <td><?= $email ?></td>
                </tr>
                <tr>
                    <td>Birthdate:</td>
                    <td><?= $birthdate ?></td>
                </tr>
                <tr>
                    <td>Phone number:</td>
                    <td><?= $phoneNumber ?></td>
                </tr>
                <div class="user-pfp-box">
                    <?php if(isset($accountImage)): ?>
                        <img src="data:image;base64,<?php echo base64_encode($accountImage);?>" alt="">
                    <?php else: ?>
                        <p>no photo</p>
                    <?php endif; ?>
                </div>
            </table>
        </div>
    </div>
</body>