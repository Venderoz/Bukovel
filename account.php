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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
    <link rel="stylesheet" href="./public/css/theme-colors.css" />
    <link rel="stylesheet" href="./public/css/reset.css" />
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
            height: 100%;
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

        .main-username-box {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-basis: 20%;
        }

        .main-username-box h2 {
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
            flex-direction: column;
            margin-inline: auto;
            margin-block: auto;
            background-color: var(--primary);
            width: 400px;
            height: 500px;
            border-radius: 1rem;
            border: none;
        }
        .close-dialog-btn-container{
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-basis: 10%;
            padding-inline: 20px;
            background-color: var(--primary);
        }
        .close-dialog-btn-container > h2{
            background: none;
        }
        .close-dialog-btn{
            display: flex;
            justify-content: center;
            align-items: center;
            border: none;
            background: none;
        }
        .close-dialog-btn > i{
            background: none; 
            font-size: 150%;
        }

        dialog > form{
            display: flex;
            flex-direction: column;
            flex-basis: 90%;
            justify-content: center;
            align-items: center;
            gap: 30px;      
        }

        dialog> form div {
            display: flex;
            width: 80%;
            position: relative;
        }
        
        dialog > form div:not(.submit-box) label {
            position: absolute;
            top: 0px;
            left: 0px;
            font-size: 16px;
            color: black;
            pointer-events: none;
            transition: all 0.3s;
        }

        dialog > form div input {
            border: 0;
            border-bottom: 1px solid rgb(0, 0, 0);
            background: transparent;
            width: 100%;
            padding: 8px 0 5px 0;
            font-size: 16px;
            color: black;
        }

        dialog > form div input[name="submit"] {
            cursor: pointer;
            display: flex;
            justify-content: center;
            align-items: center;
            border: none;
            background-color: rgba(50, 91, 195, 1);
            box-shadow: 2px 2px 0px 1px black;
            color: white;
            transition: 0.1s all;
            height: 45px;
            border-radius: 5px;
        }

        dialog > form div input[name="submit"]:active {
            box-shadow: none;
            transform: translateY(2px);
        }

        dialog > form div input:focus {
            border: none;
            outline: none;
            border-bottom: 1px solid rgba(50, 91, 195, 1);
        }

        dialog > form div input:focus~label,
        dialog > form div input:valid~label {
            top: -12px;
            font-size: 12px;
        }
        .bi {
            position: absolute;
            right: 0;
            top: 0;
            font-size: 120%;
            color: black;
            font-weight: bold;
            cursor: pointer;
        }
        input[type="password"]::-ms-reveal,
        input[type="password"]::-ms-clear {
            display: none;
        }

        dialog::backdrop {
            background-color: black;
            opacity: 0.75;
        }

            /* Media Query for Mobile Devices*/
    @media screen and (max-width: 480px) {}

    /* Media Query for low resolution  Tablets, Ipads */
    @media screen and (min-width: 481px) {}

    /* Media Query for Tablets Ipads portrait mode */
    @media screen and (min-width: 768px) {

    }

    /* Media Query for Laptops and Desktops */
    @media screen and (min-width: 1025px) {
        .main-container{
            height: 800px;
        }
    }

    /* Media Query for Large screens */
    @media screen and (min-width: 1281px) {
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
        <div class="close-dialog-btn-container">
            <h2>Change</h2>
            <button autofocus class="close-dialog-btn"><i class="fa fa-times-circle"></i></button>
        </div>
        <form action="update_script.php" method="post" enctype="multipart/form-data" autocomplete="off">
                <div class="username-box">
                    <input type="text" name="username" id="username" value="<?= $_SESSION["name"]; ?>" required>
                    <label for="username">
                        Username
                    </label>
                </div>
                <div class="email-box">
                    <input type="email" name="email" id="email" value="<?= $email; ?>" required>
                    <label for="email">
                        Email
                    </label>
                </div>
                <div class="password-box">
                    <input type="password" name="password" id="password" value="<?= $password; ?>" required>
                    <i class="bi bi-eye-slash" id="togglePassword"></i>
                    <label for="password">
                        Password
                    </label>
                </div>
                <div class="birthdate-box">
                    <input type="date" name="birthdate" id="birthdate" value="<?= $birthdate; ?>" required>
                    <label for="birthdate">
                        Birthdate
                    </label>
                </div>
                <div class="userImage-box">
                    <input type="file" name="userImage" accept="image" id="">
                    <label for="userImage">
                        User's image
                    </label>
                </div>
                <div class="submit-box">
                    <input type="submit" value="Change" name="submit">
                </div>
                <?php if (isset($_GET['res'])) : ?>
                    <small class="change-error">
                        <?= $_GET['res'] ?>
                    </small>
                <?php endif; ?>
                
        </form>
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
                                <img class="user-image" src="./public/assets/<?php echo $accountImage; ?>" alt="user image">
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
                                <img class="user-image" src="./public/assets/<?php echo $accountImage; ?>" alt="user image">
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
                <div class="main-username-box">
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
                            <img src="./public/assets/<?php echo $accountImage; ?>" alt="user image">
                        <?php else : ?>
                            <img src="https://www.pngmart.com/files/21/Account-User-PNG-Isolated-HD.png" alt="logged out image">
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
        const togglePassword = document.querySelector("#togglePassword");
        const password = document.querySelector("#password");

        updateBtn.addEventListener("click", () => {
            dialog.showModal();
            dialog.style.display = "flex";
        });

        // "Close" button closes the dialog
        closeDialogBtn.addEventListener("click", () => {
            dialog.close();
            dialog.style.display = "none";
        });
        logoutBtn.addEventListener("click", () => {
            window.location.replace("logout.php");
        })
        deleteBtn.addEventListener("click", () => {
            window.location.replace("delete.php");
        })

        togglePassword.addEventListener("click", function() {
            // toggle the type attribute
            const type = password.getAttribute("type") === "password" ? "text" : "password";
            password.setAttribute("type", type);

            // toggle the icon
            this.classList.toggle("bi-eye");
        });
    </script>
</body>