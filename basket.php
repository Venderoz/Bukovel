<?php
session_start();
// If the user is not logged in redirect to the login page...
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

$checkOrdersQuery = "SELECT is_realised FROM orders WHERE user_id LIKE  " . $_SESSION['id'] . ";";
$getSelectedOffers = "SELECT o.*, s.season, s.skiing_period, s.days_number, s.status, e.equipment_name, e.category FROM orders AS o INNER JOIN skipasses AS s ON o.skipass_id = s.id INNER JOIN equipment AS e ON o.equipment_id = e.id WHERE user_id LIKE  " . $_SESSION['id'] . ";";
$result1 = $conn->query($checkOrdersQuery);
$result2 = $conn->query($getSelectedOffers);

$orderStatus = mysqli_fetch_all($result1, MYSQLI_ASSOC);
$orders = mysqli_fetch_all($result2, MYSQLI_ASSOC);

$doneFlag = false;

foreach ($orderStatus as $el) {
    if (in_array("0", $el)) {
        $doneFlag = true;
        break;
    }
}

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
    <title>Contacts and Placement</title>

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

        .remove-order-box>p {
            width: min-content;
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
        <!-- DON'T FORGET TO INSERT CURRENT TIME WHEN DOING ORDER -->
        <div class="container">
            <?php if (mysqli_num_rows($result1) == 0 || !$doneFlag) : ?>
                <div class="no-order-container">
                    <h2>Looks like you didn't make any order yet. Check the offerlist here:</h2>
                    <a href="skipassesAndequipment.php"><button class="go-to-offers-btn">Go to offers</button></a>
                </div>
            <?php else : ?>
                <div class="pending-orders">
                    <h3>Pending orders: </h3>
                    <?php foreach ($orders as $order) : ?>
                        <?php if (!$order['is_realised']) : ?>
                            <div class="order-container">
                                <ul class="offer-info-list">
                                    <li><?= $order['season']; ?></li>
                                </ul>
                                <div class="price-container">
                                    <p><?= $order['payment']; ?>$</p>
                                </div>
                                <div class="make-purchase-box">
                                    <p><a href="update_order_status.php?id=<?= $order["ID"]; ?>">Purchase</a></p>
                                </div>
                                <div class="delete-order-box">
                                    <p><a href="delete_order.php?id=<?= $order["ID"]; ?>" id="remove-order-btn"><i class="bi bi-trash-fill"></i></a></p>
                                </div>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
            <div class="done-orders-box" id="done-orders-box">
                <h3>Done orders:</h3>
                <?php foreach ($orders as $order) : ?>
                    <?php if ($order['is_realised']) : ?>
                        <div class="order-container">
                            <ul class="offer-info-list">
                                <li><?= $order['season']; ?></li>
                            </ul>
                            <div class="price-container">
                                <p><?= $order['payment']; ?>$</p>
                            </div>
                        </div>
                    <?php endif; ?>
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

    <script>
        const removeOrderBtn = document.querySelectorAll("#remove-order-btn");
        const doneOrdersBox = document.getElementById("done-orders-box");

        function checkDoneOrdersContent() {
            console.log(doneOrdersBox.querySelector(".order-container") !== null);
            doneOrdersBox.style.display = doneOrdersBox.innerHTML === " " ? "none" : "flex";
        }
        removeOrderBtn.forEach(button => {
            if (button) {
                button.addEventListener("click", () => {
                    confirm("Are you sure you want to remove that order? You can make another one.") ? window.location.replace("delete_order.php") : "";
                });
            }
        });

        checkDoneOrdersContent();
    </script>

</body>

</html>