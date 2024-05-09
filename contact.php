<?php
session_start();

include "connection.php";

// We don't have the password or email info stored in sessions, so instead, we can get the results from the database.
$stmt = $conn->prepare('SELECT account_image FROM users WHERE id = ?');
// In this case we can use the account ID to get the account info.
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
    <link rel="stylesheet" href="./public/css/nav-bar.css" />
    <link rel="stylesheet" href="./public/css/footer.css" />
    <title>Trails map</title>

    <style>
        .mapouter {
            position: relative;
            text-align: right;
            width: 600px;
            height: 400px;
        }

        .gmap_canvas {
            overflow: hidden;
            background: none !important;
            width: 600px;
            height: 400px;
        }

        .gmap_iframe {
            width: 600px !important;
            height: 400px !important;
        }
    </style>
</head>
<!-- ----------------------------------------------------------------------- -->

<body>
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
        <div class="content">
            <div class="article">
                <div class="about-article">
                    <p>
                        Here you will find all the contacts that will be useful when planning your trip or stay at the Bukovel resort. <br>
                        You can also contact us to resolve any issues. <br>
                        After all, the heart of the Carpathians is always open to you.
                    </p>
                    <h3>Contact us also:</h3>
                    <ul class="social-media-list">
                        <li><a href="https://www.facebook.com/bukovel" target="_blank"><i class="bi bi-facebook"></i></a></li>
                        <li><a href="https://www.instagram.com/Bukovel/" target="_blank"><i class="bi bi-instagram"></i></a></li>
                        <li><a href="https://t.me/bukovel_resort" target="_blank"><i class="bi bi-telegram"></i></a></li>
                    </ul>
                    <h3>For phone calls:</h3>
                    <ul class="phone-numbers-list">
                        <li>
                            <small>Have any questions?</small> <br>
                            Contact us 24/7: <span>0 800 500 818</span>
                        </li>
                        <li>
                            <small>Need help booking your accommodation?</small> <br>
                            Booking department: <span>+38 (0342) 59 11 00</span>
                        </li>
                        <li>
                            <small>Do you want to choose and book a tour?</small> <br>
                            Tourist center: <span>+38 (067) 340 40 71</span>
                        </li>
                        <li>
                            <small>Having trouble placing or paying for an order on our website?</small> <br>
                            Contact technical support: <span>b24@bukovel.com</span>
                        </li>
                    </ul>

                </div>
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
                    This site was made by Venderoz.
                </a>
            </p>
        </div>
    </footer>
    <!-- ----------------------------------------------------------------------- -->
    <script src="./public/scripts/change_theme.js"></script>
    <script src="./public/scripts/sidebar_manipulation.js"></script>

</body>

</html>