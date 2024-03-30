<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
    header('Location: login.php');
    exit;
}
include "connection.php";

$stmt = $conn->prepare('SELECT password, email, birthdate, account_image FROM users WHERE id = ?');

$stmt->bind_param('i', $_SESSION['id']);

$stmt->execute();

$stmt->bind_result($password, $email, $birthdate, $accountImage);

$stmt->fetch();

$stmt->close();
?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Profile Page</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
    <link rel="stylesheet" href="./public/css/theme-colors.css" />
    <link rel="stylesheet" href="./public/css/resetting.css" />
    <link rel="stylesheet" href="./public/css/nav-bar.css" />
    <link rel="stylesheet" href="./public/css/footer.css" />
    <style>
        main {
            display: flex;
            width: 100%;
        }

        .main-container {
            display: flex;
            flex-direction: column;
            width: 100%;
            height: 650px;
        }

        .main-info-box {
            display: flex;
            flex-direction: column;
            width: 100%;
            flex-basis: 90%;
            margin-bottom: 30px;
            gap: 20px;
        }

        .logout-box {
            display: flex;
            justify-content: space-around;
            width: 100%;
            flex-basis: 10%;
            padding: 1rem;
            gap: 5%;
        }

        .logout-box button {
            border: none;
            font-size: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-basis: 50%;
            padding: .5rem;
            position: relative;
            overflow: hidden;
            border-bottom: 2px solid var(--accent);
            border-radius: 10px 10px 0 0;
        }

        .logout-box button:hover {
            box-shadow: 2px 2px 5px gray;
        }

        .logout-box button:hover:after {
            content: "";
            display: block;
            width: 100%;
            height: 100%;
            position: absolute;
            background-color: var(--accent);
            z-index: 0;
            animation: animateButtonBg .5s;
        }

        .logout-box button>p {
            z-index: 1;
            background: none;
        }

        .user-details-box {
            order: 2;
            display: flex;
            flex-direction: column;
            flex-basis: 40%;
            gap: 1rem;
        }

        .user-details-box>p {
            font-size: 150%;
        }

        .user-details-box>ul {
            display: flex;
            flex-direction: column;
            gap: 10px;
            list-style-type: none;
            background-color: var(--secondary);
            padding: 10px;
            border-radius: 10px;
            width: 60%;
        }
        .user-details-box>ul .list-button-box{
            background-color: var(--secondary);
        }
        .user-details-box>ul li:not(.list-button-box) {
            display: flex;
            word-break: break-all;
            flex-direction: column;
            background-color: var(--accent);
            padding: .5rem;
            border-radius: 10px;
        }

        .user-details-box>ul li>small {
            background: none;
        }

        .user-details-box>ul .list-button-box>button {
            cursor: pointer;
            display: flex;
            justify-content: center;
            align-items: center;
            border: none;
            background-color: var(--primary);
            box-shadow: 2px 2px 0px 1px black;
            color: white;
            transition: 0.1s all;
            width: 100%;
            padding: .5rem;
            border-radius: 10px;
        }

        .user-details-box>ul .list-button-box>button:active {
            box-shadow: none;
            transform: translateY(2px);
        }

        .user-details-box>ul .list-button-box>button>p {
            font-size: 120%;
            background: none;
        }

        .username-box {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-basis: 20%;
        }

        .username-box h2 {
            font-size: 200%;
        }

        .user-pfp-box {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-basis: 40%;
            order: 1;
        }

        .user-details-box {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .image-box {
            position: relative;
            height: 200px;
            width: 200px;
        }

        .image-box img {
            position: absolute;
            width: 100%;
            height: 100%;
            background-color: white;
            border-radius: 50%;
        }

        dialog {
            position: absolute;
            margin-inline: auto;
            margin-block: auto;
            background-color: var(--primary);
            width: 400px;
            height: 500px;
        }
        .close-dialog-btn{
            position: absolute;
            display: flex;
            justify-content: center;
            align-items: center;
            border: none;
            background: none;
            width: 50px;
            height: 50px;
            right: 10px;
            top: 10px;
        }
        .close-dialog-btn > i{
            background: none; 
            font-size: 150%;
        }

        dialog::backdrop {
            background-color: black;
            opacity: 0.75;
        }

        @keyframes animateButtonBg {
            from {
                top: 100%;
            }

            to {
                top: 0;
            }
        }
    </style>
</head>

<body>
    <dialog>
        <button autofocus class="close-dialog-btn"><i class="fa fa-times-circle"></i></button>
    </dialog>
    <!-- ----------------------------------------------------------------------- -->
    <div class="sidebar-menu-container" id="sidebar-menu-container">
        <div class="content">
            <div class="close-button-box">
                <button type="button" id="close-btn"><i class="fa fa-times-circle"></i></button>
            </div>
            <div class="sidebar-list-box">
                <ul>
                    <li>
                        <a href="trailsMap.php">
                            <p>Map of trails</p>
                        </a>
                    </li>
                    <li>
                        <a href="skipassesAndEquipment.php">
                            <p>Skipasses and equipment</p>
                        </a>
                    </li>
                    <li>
                        <a href="contact.php">
                            <p>Contact and access</p>
                        </a>
                    </li>
                    <li>
                        <a href="basket.php" class="shopping-basket-logo-box">
                            <span class="material-symbols-outlined">
                                shopping_basket
                            </span>
                        </a>
                    </li>
                    <li>
                        <a href="account.php" class="account-logo-box">
                            <span class="material-symbols-outlined">
                                account_circle
                            </span>
                            <?php if ($accountImage != "") : ?>
                                <img class="user-image" src="data:image;base64,<?php echo base64_encode($accountImage); ?>" alt="">
                            <?php endif ?>
                        </a>
                    </li>
                    <li>
                        <button type="button" data-theme-toggle>
                            <!-- inserted with JS -->
                        </button>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- ----------------------------------------------------------------------- -->
    <header>
        <nav>
            <div class="logo-box">
                <a href="welcomePage.php" id="main-logo-box">
                    <!-- Inserted with JS -->
                </a>
            </div>
            <div class="nav-list-box">
                <button type="button" id="show-sidebar-btn" class="show-sidebar-btn">
                    <!-- inserted with JS -->
                </button>
                <ul>
                    <li>
                        <a href="trailsMap.php">
                            <p>Map of trails</p>
                        </a>
                    </li>
                    <li>
                        <a href="skipassesAndEquipment.php">
                            <p>Skipasses and equipment</p>
                        </a>
                    </li>
                    <li>
                        <a href="contact.php">
                            <p>Contact and access</p>
                        </a>
                    </li>
                    <li>
                        <a href="basket.php" class="shopping-basket-logo-box">
                            <span class="material-symbols-outlined">
                                shopping_basket
                            </span>
                        </a>
                    </li>
                    <li>
                        <a href="account.php" class="account-logo-box">
                            <span class="material-symbols-outlined">
                                account_circle
                            </span>
                            <?php if ($accountImage != "") : ?>
                                <img class="user-image" src="data:image;base64,<?php echo base64_encode($accountImage); ?>" alt="">
                            <?php endif ?>
                        </a>
                    </li>
                    <li>
                        <button type="button" data-theme-toggle>
                            <!-- inserted with JS -->
                        </button>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <!-- ----------------------------------------------------------------------- -->
    <main>
        <div class="main-container">
            <div class="main-info-box">
                <div class="username-box">
                    <h2 class="username"><?= $_SESSION['name'] ?></h2>
                </div>
                <div class="user-details-box">
                    <p>Details: </p>
                    <ul>
                        <li><small>Email:</small><?= $email ?></li>
                        <li><small>Birthdate:</small><?= $birthdate ?></li>
                        <li class="list-button-box">
                            <button type="button" id="update-btn" class="update-btn">
                                <p>Change</p>
                            </button>
                        </li>
                    </ul>
                </div>
                <div class="user-pfp-box">
                    <div class="image-box">
                        <?php if ($accountImage != "") : ?>
                            <img src="data:image;base64,<?php echo base64_encode($accountImage); ?>" alt="">
                        <?php else : ?>
                            <img src="https://www.pngmart.com/files/21/Account-User-PNG-Isolated-HD.png" alt="loggedout-img">
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="logout-box">
                <button type="button" id="logout-btn" class="logout-btn">
                    <p>Logout <i class="fa fa-sign-out"></i></p>
                </button>
                <button type="button" id="delete-btn" class="delete-btn">
                    <p>Delete account <i class="fa fa-trash"></i></p>
                </button>
            </div>
        </div>
    </main>
    <!-- ----------------------------------------------------------------------- -->
    <footer>
        <div class="footer-contact-box">
            <p>
                24h info line<br />
                <span>0 800 500 818</span>
            </p>
            <p>
                «Bukovel-24» customer support <br />
                <span>b24@bukovel.com</span>
            </p>
        </div>
        <div class="footer-copyrights-box">
            <p>Bukovel 2024 &copy; All rights reserved</p>
        </div>
        <div class="footer-creator-box">
            <p>
                <a href="https://github.com/Venderoz/Bukovel/">
                    This site was made by Venderoz.
                </a>
            </p>
        </div>
    </footer>
    <!-- ----------------------------------------------------------------------- -->
    <script src="./public/scripts/change_theme.js"></script>
    <script src="./public/scripts/sidebar_manipulation.js"></script>
    <script>
        const updateBtn = document.getElementById("update-btn");
        const dialog = document.querySelector("dialog");
        const closeDialogBtn = document.querySelector(".close-dialog-btn");
        const deleteBtn = document.getElementById("delete-btn");
        const logoutBtn = document.getElementById("logout-btn");

        updateBtn.addEventListener("click", () => {
            dialog.showModal();
        });

        // "Close" button closes the dialog
        closeDialogBtn.addEventListener("click", () => {
            dialog.close();
        });
        logoutBtn.addEventListener("click", () => {
            window.location.replace("logout.php");
        })
        deleteBtn.addEventListener("click", () => {
            window.location.replace("delete.php");
        })
    </script>
</body>