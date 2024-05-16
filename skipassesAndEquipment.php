<?php
session_start();
include "checkLogin.php";
include "connection.php";

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
$showEquipmentCategories = "SELECT DISTINCT(category) FROM equipment;";

$result1 = $conn->query($showSkippasesQuery);
$result2 = $conn->query($showEquipmentQuery);
$result3 = $conn->query($showEquipmentCategories);

$skipasses = mysqli_fetch_all($result1, MYSQLI_ASSOC);
$equipment = mysqli_fetch_all($result2, MYSQLI_ASSOC);
$categories = mysqli_fetch_all($result3, MYSQLI_ASSOC);
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
    <title>Offers</title>

    <style>
        main {
            display: flex;
            width: 100%;
        }

        .container {
            display: flex;
            width: 100%;
            height: fit-content;
            flex-direction: column;
            gap: 1rem;
            padding: 1rem;
            font-size: 120%;
        }
    </style>
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
                        <a href="skipassesAndEquipment.php">
                            <p>Skipasses and equipment</p>
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
                        <a href="skipassesAndEquipment.php">
                            <p>Skipasses and equipment</p>
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
                    <div class="skipass-offer-box">
                        <form action="basket.php" method="post">
                        <?= $skipass['season']; ?>
                        <input style="display: none;" type="text" name="season" value="<?= $skipass['season']; ?>">
                            <ul class="skipass-info-list">
                                <li><?= $skipass['skiing_period']; ?></li>
                                <li>
                                    <?php if ($skipass['days_number'] != 0) : ?>
                                        <select name="days-number" id="">
                                            <?php if ($skipass['season'] == "High season") : ?>
                                                <?php for ($i = 2; $i < 8; $i++) : ?>
                                                    <option value="<?= $i; ?>"><?= $i; ?></option>
                                                <?php endfor; ?>
                                            <?php elseif ($skipass['season'] == "Holiday season") : ?>
                                                <?php for ($i = 2; $i < 6; $i++) : ?>
                                                    <option value="<?= $i; ?>"><?= $i; ?></option>
                                                <?php endfor; ?>
                                            <?php elseif ($skipass['season'] == "Low season") : ?>
                                                <?php for ($i = 2; $i < 4; $i++) : ?>
                                                    <option value="<?= $i; ?>"><?= $i; ?></option>
                                                <?php endfor; ?>
                                            <?php endif; ?>
                                        </select>
                                    <?php else : ?>
                                        <p>On the day of purchase</p>
                                    <?php endif; ?>
                                </li>
                                <li>
                                    <select name="equipment-name" id="">
                                        <?php foreach ($equipment as $thing) : ?>
                                            <option value="<?= $thing["equipment_name"]; ?>"><?= $thing["equipment_name"]; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </li>
                                <li>
                                    <select name="equipment-category" id="">
                                        <?php foreach ($categories as $category) : ?>
                                            <option value="<?= $category["category"]; ?>"><?= $category["category"]; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </li>
                                <li>
                                    <input type="submit" value="Choose" name="offer-btn">
                                </li>
                            </ul>
                        </form>
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
    <script src="./public/scripts/change_theme.js"></script>
    <script src="./public/scripts/sidebarManipulation.js"></script>

</body>

</html>