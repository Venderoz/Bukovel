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
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
  <link rel="shortcut icon" href="./public/assets/icons/favicon.ico" type="image/x-icon" />
  <link rel="stylesheet" href="./public/css/theme-colors.css" />
  <link rel="stylesheet" href="./public/css/reset.css" />
  <link rel="stylesheet" href="./public/css/nav-bar.css" />
  <link rel="stylesheet" href="./public/css/footer.css" />
  <title>Trails map</title>

  <style>

    /* Media Query for Mobile Devices*/
    @media screen and (max-width: 480px) {}

    /* Media Query for low resolution  Tablets, Ipads */
    @media screen and (min-width: 481px) {}

    /* Media Query for Tablets Ipads portrait mode */
    @media screen and (min-width: 768px) {
      .swiper-slide {
        box-shadow: inset 250px 0px 150px black;
      }

      .slide-text-container {
        left: -40%;
        top: 50%;
        transform: rotateZ(-90deg);
      }
      .slide-text-container > p{
        font-size: 200%;
      }

    }

    /* Media Query for Laptops and Desktops */
    @media screen and (min-width: 1025px) {

      .slide-text-container {
        left: -43%;
      }
      .slide-text-container > p{
        font-size: 200%;
      }
      .main-text-content div p {
        width: 45%;
      }

      .main-text-content div {
        font-size: 130%;
      }
    }

    /* Media Query for Large screens */
    @media screen and (min-width: 1281px) {

      .slide-text-container {
        left: -45%;
      }
      .slide-text-container > p{
        font-size: 200%;
      }
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
              <?php if (file_exists("./public/assets/$accountImage")) : ?>
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
              <?php if (file_exists("./public/assets/$accountImage")) : ?>
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
    <iframe src="https://bukovel.com/map-new/?lang=en&from-site=true" frameborder="0"></iframe>
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
</body>

</html>