<?php
session_start();

include "./src/connection.php";

// We don't have the password or email info stored in sessions, so instead, we can get the results from the database.
$stmt = $conn->prepare('SELECT account_image FROM users WHERE id = ?');
// In this case we can use the account ID to get the account info.
$stmt->bind_param('i', $_SESSION['id']);
$stmt->execute();
$stmt->bind_result($accountImage);
$stmt->fetch();
$stmt->close();

$showSkippasesQuery = "SELECT season, skiing_period, days_number, status, description, validity FROM skipasses GROUP BY season;";
$showEquipmentQuery = "SELECT equipment_name, days_num, category FROM equipment GROUP BY equipment_name;";

$result1 = $conn->query($showSkippasesQuery);
$result2 = $conn->query($showEquipmentQuery);

$skipasses = mysqli_fetch_all($result1, MYSQLI_ASSOC);
$equipment = mysqli_fetch_all($result2, MYSQLI_ASSOC);
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
    <link rel="stylesheet" href="./public/css/offers_styles.css">

    <title>Offers</title>
</head>
<!-- ----------------------------------------------------------------------- -->

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
            <div class="skipasses-box">
                <?php foreach ($skipasses as $skipass) : ?>
                    <div class="skipass-offer-box" id="skipass-offer-box">
                        <div class="offer-title" id="offer-title">
                            <h2><?= $skipass['season']; ?></h2>
                        </div>
                        <div class="offer-info-box shrinked" id="offer-info-box">
                            <form action="./src/addOrder.php" method="post">
                                <input style="display: none;" type="text" name="season" value="<?= $skipass['season']; ?>">
                                <ul class="skipass-info-list">
                                    <li>
                                        <h3>Equipment: </h3>
                                        <div class="equipment-offer-box">
                                            <select name="equipment-name" id="">
                                                <?php foreach ($equipment as $thing) : ?>
                                                    <option value="<?= $thing["equipment_name"]; ?>"><?= $thing["equipment_name"]; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                            <select name="equipment-category" id="">
                                                <option value="A">A</option>
                                                <option value="B">B</option>
                                                <option value="C">C</option>
                                                <option value="D1">D1</option>
                                                <option value="D2">D2</option>
                                            </select>
                                        </div>
                                    </li>
                                    <li>
                                        <h4>Skiing period: </h4>
                                        <?= $skipass['skiing_period']; ?>
                                    </li>
                                    <li>
                                        <h4>Number of days: </h4>
                                        <?php if ($skipass['days_number'] != 1) : ?>
                                            <div class="days-number-box">
                                                <select name="days-number" id="">
                                                    <?php if ($skipass['season'] != "Low season") : ?>
                                                        <?php for ($i = 2; $i < 6; $i++) : ?>
                                                            <option value="<?= $i; ?>"><?= $i; ?></option>
                                                        <?php endfor; ?>
                                                    <?php elseif ($skipass['season'] == "Low season") : ?>
                                                        <?php for ($i = 2; $i < 4; $i++) : ?>
                                                            <option value="<?= $i; ?>"><?= $i; ?></option>
                                                        <?php endfor; ?>
                                                    <?php endif; ?>
                                                </select>
                                                <p>days</p>
                                            </div>
                                        <?php else : ?>
                                            <p>The day it was bought</p>
                                        <?php endif; ?>
                                    </li>
                                    <li>
                                        <h4>Status: </h4>
                                        <select name="status-name" id="">
                                            <option value="Standard" selected>Standard</option>
                                            <option value="VIP">VIP</option>
                                        </select>
                                    </li>
                                    <li>
                                        <h4>Description: </h4>
                                        <p class="description">
                                            <?= $skipass["description"]; ?>
                                        </p>
                                    </li>
                                    <li>
                                        <h4>Validity: </h4>
                                        <p class="validity">
                                            <?= $skipass["validity"]; ?>
                                        </p>
                                    </li>
                                    <li>
                                        <input type="submit" value="Add to the wishlist" name="order-btn" class="order-btn">
                                    </li>
                                </ul>
                            </form>
                        </div>
                    </div>
                <?php endforeach; ?>
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
    <!-- ----------------------------------------------------------------------- -->
    <script src="./public/scripts/changeTheme.js"></script>
    <script src="./public/scripts/sidebarManipulation.js"></script>
    <script src="./public/scripts/orderBoxSizeManipulation.js"></script>

</body>

</html>