<?php
session_start();
include "./src/connection.php";

$stmt = $conn->prepare('SELECT account_image FROM users WHERE id = ?');
$stmt->bind_param('i', $_SESSION['id']);
$stmt->execute();
$stmt->bind_result($accountImage);
$stmt->fetch();
$stmt->close();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
    <link rel="shortcut icon" href="./public/assets/icons/favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" href="./public/css/theme-colors.css" />
    <link rel="stylesheet" href="./public/css/reset.css" />
    <link rel="stylesheet" href="./public/css/navbar.css" />
    <link rel="stylesheet" href="./public/css/footer.css" />
    <link rel="stylesheet" href="./public/css/contact_styles.css">
    <title>Contacts and Placement</title>
</head>

<body>
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
                            <p>Our offers</p>
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
                            <?php if (file_exists("./public/assets/$accountImage") && !is_null($accountImage)) : ?>
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
                            <p>Our offers</p>
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
                            <?php if (file_exists("./public/assets/$accountImage") && !is_null($accountImage)) : ?>
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
        <div class="container">
            <div class="about-article">
                <p>Here you will find all the contacts that will be useful when planning your trip and the map where the great Bukovel ski resort takes its place.</p>
                <p>You can also contact us to resolve any issues.</p>
                <p>After all, the heart of the Carpathians is always open to you.</p>
            </div>
            <div class="article">
                <div class="contacts">
                <h3>For phone calls:</h3>
                    <ul class="phone-numbers-list">
                        <li>
                            <small>Have any questions?</small>
                            <p>Contact us 24/7: <span>0 800 500 818</span></p>
                        </li>
                        <li>
                            <small>Need help booking your accommodation?</small>
                            <p>Booking department: <span>+38 (0342) 59 11 00</span></p>
                        </li>
                        <li>
                            <small>Do you want to choose and book a tour?</small>
                            <p>Tourist center: <span>+38 (067) 340 40 71</span></p>
                        </li>
                        <li>
                            <small>Having trouble placing or paying for an order on our website?</small>
                            <p>Contact technical support: <span>b24@bukovel.com</span></p>
                        </li>
                    </ul>
                    <h3>Contact us also on:</h3>
                    <ul class="social-media-list">
                        <li><a href="https://www.facebook.com/bukovel" target="_blank"><i class="bi bi-facebook"></i>Facebook</a></li>
                        <li><a href="https://www.instagram.com/Bukovel/" target="_blank"><i class="bi bi-instagram"></i>Instagram</a></li>
                        <li><a href="https://t.me/bukovel_resort" target="_blank"><i class="bi bi-telegram"></i>Telegram</a></li>
                    </ul>
                </div>
                <div class="map">
                    <div class="mapouter">
                        <div class="gmap_canvas">
                            <iframe class="gmap_iframe" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=600&amp;height=400&amp;hl=en&amp;q=Bukovel&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe>
                            <a href="https://embed-googlemap.com">google maps embed</a>
                        </div>
                    </div>
                </div>
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

</body>

</html>