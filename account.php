<?php
session_start();
include "./src/checkLogin.php";
include "./src/connection.php";


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
    <link rel="shortcut icon" href="./public/assets/icons/favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" href="./public/css/theme-colors.css" />
    <link rel="stylesheet" href="./public/css/reset.css" />
    <link rel="stylesheet" href="./public/css/navbar.css" />
    <link rel="stylesheet" href="./public/css/footer.css" />
    <link rel="stylesheet" href="./public/css/account_styles.css">
</head>

<body>
    <dialog>
        <div class="close-dialog-btn-container">
            <h2>Update</h2>
            <button autofocus class="close-dialog-btn"><i class="bi bi-x-circle"></i></button>
        </div>
        <form action="./src/update_user_info.php" method="post" enctype="multipart/form-data" autocomplete="off">
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
                <input type="submit" value="Confirm" name="submit">
            </div>
            <?php if (isset($_GET['msg'])) : ?>
                <script>
                    alert("<?= $_GET['msg'] ?>");
                </script>
            <?php endif; ?>

        </form>
    </dialog>
    <!-- ----------------------------------------------------------------------- -->
    <div class="sidebar-menu-container" id="sidebar-menu-container">
        <div class="content">
            <div class="close-button-box">
                <button type="button" id="close-btn"><i class="bi bi-x-circle"></i></button>
            </div>
            <div class="sidebar-list-box">
                <ul>
                    <li>
                        <a href="trailsMap.php">
                            <p>Map of trails</p>
                        </a>
                    </li>
                    <li>
                        <a href="offers.php">
                            <p>Offers</p>
                        </a>
                    </li>
                    <li>
                        <a href="contact.php">
                            <p>Contact and place</p>
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
                            <?php if (file_exists("./public/assets/$accountImage") && !is_null($accountImage) && $accountImage != "") : ?>
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
                        <a href="offers.php">
                            <p>Offers</p>
                        </a>
                    </li>
                    <li>
                        <a href="contact.php">
                            <p>Contact and place</p>
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
                            <?php if (file_exists("./public/assets/$accountImage") && !is_null($accountImage) && $accountImage != "") : ?>
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
                <div class="user-pfp-box">
                    <div class="image-box">
                        <?php if (file_exists("./public/assets/$accountImage") && !is_null($accountImage) && $accountImage != "") : ?>
                            <img src="./public/assets/<?php echo $accountImage; ?>" alt="user image">
                        <?php else : ?>
                            <img src="https://www.pngmart.com/files/21/Account-User-PNG-Isolated-HD.png" alt="logged out image">
                        <?php endif; ?>
                    </div>
                </div>
                <div class="user-details-box">
                    <p>Details: </p>
                    <ul>
                        <li><small>Email:</small><?= $email; ?></li>
                        <li><small>Birthdate:</small><?= $birthdate; ?></li>
                        <li class="list-button-box">
                            <button type="button" id="update-btn" class="update-btn">
                                <p>Update</p>
                            </button>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="logout-box">
                <button type="button" id="logout-btn" class="logout-btn">
                    <p>Logout <i class="bi bi-box-arrow-right"></i></p>
                </button>
                <button type="button" id="delete-btn" class="delete-btn">
                    <p>Delete account <i class="bi bi-trash"></i></p>
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
                <a href="https://github.com/Venderoz/Bukovel/" target="_blank">
                    This website was made by Venderoz.
                </a>
            </p>
        </div>
    </footer>
 
    <script src="./public/scripts/changeTheme.js"></script>
    <script src="./public/scripts/sidebarHandler.js"></script>
    <script src="./public/scripts/dialogHandler.js"></script>
    <script src="./public/scripts/showPassword.js"></script>
    <script>
        const updateBtn = document.getElementById("update-btn");
        const deleteBtn = document.getElementById("delete-btn");
        const logoutBtn = document.getElementById("logout-btn");

        updateBtn.addEventListener("click", () => {
            dialog.showModal();
            dialog.style.display = "flex";
        });

        logoutBtn.addEventListener("click", () => {
            confirm("Do you really want to logout?") ? window.location.replace("./src/logout.php") : "";
        })
        deleteBtn.addEventListener("click", () => {
            confirm("Do you really want to delete you account forever?") ? window.location.replace("./src/delete_user.php") : "";
        })
    </script>
</body>