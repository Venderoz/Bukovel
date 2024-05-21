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
$getUnrealisedOffers = "SELECT o.*, s.season, s.skiing_period, s.days_number, s.status, e.equipment_name, e.category FROM orders AS o INNER JOIN skipasses AS s ON o.skipass_id = s.id INNER JOIN equipment AS e ON o.equipment_id = e.id WHERE is_realised = 0 AND user_id LIKE  " . $_SESSION['id'] . ";";
$getRealisedOffers = "SELECT o.*, s.season, s.skiing_period, s.days_number, s.status, e.equipment_name, e.category FROM orders AS o INNER JOIN skipasses AS s ON o.skipass_id = s.id INNER JOIN equipment AS e ON o.equipment_id = e.id WHERE is_realised = 1 AND user_id LIKE  " . $_SESSION['id'] . ";";

$result1 = $conn->query($checkOrdersQuery);
$result2 = $conn->query($getUnrealisedOffers);
$result3 = $conn->query($getRealisedOffers);

$orderStatus = mysqli_fetch_all($result1, MYSQLI_ASSOC);
$realisedOrders = mysqli_fetch_all($result2, MYSQLI_ASSOC);
$unrealisedOrders = mysqli_fetch_all($result3, MYSQLI_ASSOC);

$doneFlag = false;

foreach ($orderStatus as $el) {
    if (in_array("1", $el)) {
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

        ul {
            list-style-type: none;
        }

        .container {
            display: flex;
            width: 100%;
            height: 100%;
            flex-direction: column;
            gap: 1rem;
            padding: 1rem;
            font-size: 120%;
        }

        .no-order-container {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            gap: 2rem;
        }

        .no-order-container>h2 {
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
        }

        .no-order-container>button {
            width: 60%;
            height: 100%;
            padding: .5rem;
            font-size: 110%;
            cursor: pointer;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: var(--secondary);
            border: none;
            box-shadow: 2px 2px 0px 1px var(--text);
            color: var(--text);
            transition: 0.1s all;
            border-radius: 5px;
        }

        .no-order-container>button:active {
            box-shadow: none;
            transform: translateY(2px);
        }

        .no-order-container>button>a {
            background: none;
            border: none;
            text-decoration: none;
            width: 100%;
            height: 100%;
        }

        .pending-orders {
            display: flex;
            flex-direction: column;
            gap: 2rem;
        }

        .pending-orders>h3 {
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 120%;
        }

        .order-container {
            display: flex;
            flex-direction: column;
            max-width: 530px;
            background-color: var(--secondary);
            border-radius: 10px;
            padding: 1rem;
            gap: 1rem;
            box-shadow: 3px 3px 7px black;
        }

        .about-order-box {
            display: flex;
            flex-direction: row;
            flex-basis: 80%;
        }

        .order-info-box {
            flex-basis: 80%;
        }

        .order-info-list>li:first-child {
            font-size: 150%;
            margin-bottom: .5rem;
        }

        .price-container {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-basis: 20%;
        }

        .price-container>p {
            font-size: 200%;
        }

        .do-order-box {
            display: flex;
            flex-direction: row;
            flex-basis: 20%;
            border-top: 1px solid var(--text);
        }

        .make-purchase-box {
            cursor: pointer;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-basis: 70%;
            border-right: 1px solid var(--text);
            width: 100%;
            height: 100%;
            padding: .5rem;
        }

        .make-purchase-box>p,
        .make-purchase-box>p>a {
            display: flex;
            justify-content: center;
            align-items: center;
            text-decoration: none;
            width: 100%;
            height: 100%;
            font-weight: bold;
            text-transform: uppercase;
        }

        .delete-order-box {
            cursor: pointer;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-basis: 30%;
            width: 100%;
            height: 100%;
            padding: .5rem;
        }

        .delete-order-box>p {
            display: flex;
            gap: 2px;
        }

        .order-container * {
            background: none;
        }

        .delete-order-box>p {
            width: min-content;
        }

        .delete-order-box>p>i {
            cursor: pointer;
        }

        .done-orders-box {
            display: flex;
            flex-direction: column;
            flex-direction: column;
            gap: 2rem;
        }

        .done-orders-box>h3 {
            display: flex;
            justify-content: center;
            align-items: center;
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
                        <a href="skipassesAndEquipment.php">
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
        <!-- DON'T FORGET TO INSERT CURRENT TIME WHEN DOING ORDER -->
        <div class="container">
            <?php if (mysqli_num_rows($result2) == 0) : ?>
                <div class="no-order-container">
                    <h2>Looks like you didn't make any order yet. Check the offerlist here:</h2>
                    <button class="go-to-offers-btn"><a href="skipassesAndequipment.php">Go to offers</a></button>
                </div>
            <?php else : ?>
                <div class="pending-orders">
                    <h3>Pending orders: </h3>
                    <?php foreach ($realisedOrders as $order) : ?>
                        <?php if (!$order['is_realised']) : ?>
                            <div class="order-container">
                                <div class="about-order-box">
                                    <div class="order-info-box">
                                        <ul class="order-info-list">
                                            <li><?= $order['season']; ?></li>
                                            <li><?= $order['skiing_period']; ?></li>
                                        </ul>
                                    </div>
                                    <div class="price-container">
                                        <p><?= $order['payment']; ?>$</p>
                                    </div>
                                </div>
                                <div class="do-order-box">
                                    <div class="make-purchase-box">
                                        <p><a href="update_order_status.php?id=<?= $order["ID"]; ?>">Purchase</a></p>
                                    </div>
                                    <div class="delete-order-box <?= $order["ID"]; ?>" id="remove-order-btn">
                                        <p>Delete<i class="bi bi-trash-fill"></i></p>
                                    </div>
                                </div>

                            </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
            <?php if ($doneFlag) : ?>
                <hr>
                <div class="done-orders-box" id="done-orders-box">
                    <h3>Done orders:</h3>
                    <?php foreach ($unrealisedOrders as $order) : ?>
                        <?php if ($order['is_realised']) : ?>
                            <div class="order-container">
                                <div class="about-order-box">
                                    <div class="order-info-box">
                                        <ul class="order-info-list">
                                            <li><?= $order['season']; ?></li>
                                            <li><?= $order['order_time']; ?></li>
                                        </ul>
                                    </div>
                                    <div class="price-container">
                                        <p><?= $order['payment']; ?>$</p>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
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

    <?php if($_GET['res'] == "success"): ?>
        <script>alert("Purchased successfully. Have a great time in Bukovel.")</script>
    <?php endif; ?>

    <script>
        const removeOrderBtn = document.querySelectorAll("#remove-order-btn");
        const doneOrdersBox = document.getElementById("done-orders-box");

        function checkDoneOrdersContent() {
            console.log(doneOrdersBox.querySelector(".order-container") !== null);
            doneOrdersBox.style.display = doneOrdersBox.innerHTML === " " ? "none" : "flex";
        }
        removeOrderBtn.forEach(button => {
            if (button) {
                const trashId = button.classList[1];
                button.addEventListener("click", () => {
                    confirm("Are you sure you want to remove that order? You can make another one.") ? window.location.replace(`delete_order.php?id=${trashId}`) : "";
                });
            }
        });

        checkDoneOrdersContent();
    </script>

</body>

</html>