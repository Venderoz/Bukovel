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
  <link rel="stylesheet" href="./public/css/trailmap_styles.css">
  <title>Trails map</title>
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
    <div class="iframe-container">
      <iframe src="https://bukovel.com/map-new/?lang=en&from-site=true" frameborder="0"></iframe>
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