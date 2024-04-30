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
  <title>Bukovel. Welcome to the Heart of Carpathians</title>

  <style>
    header {
      position: absolute;
      top: 0;
      z-index: 4;
    }

    main {
      display: flex;
      flex-direction: column;
      width: 100%;
      height: fit-content;
      position: relative;
    }

    .swiper {
      width: 100dvw;
      height: 100dvh;
      border: none;
      z-index: 3;
    }

    .swiper-slide {
      position: relative;
      width: 100%;
      height: 100%;
      background-size: cover;
      box-shadow: inset 0px 250px 150px black;
    }

    .slide-text-container {
      position: absolute;
      display: flex;
      justify-content: center;
      align-items: center;
      width: 100%;
      height: 100px;
      top: 82px;
      left: 0;
      background: none;
      padding: .5rem;
    }

    .slide-text-container>p {
      text-align: center;
      background: none;
      font-size: 180%;
      color: white;
    }

    .first-slide {
      background-image: url("./public/assets/Bukovel1.png");
    }

    .second-slide {
      background-image: url("./public/assets/Bukovel2.png");
    }

    .third-slide {
      background-image: url("./public/assets/Bukovel3.png");
    }

    .swiper-slide>img {
      position: absolute;
      width: 100%;
      height: 100%;
      z-index: 2;
    }

    .swiper-pagination {
      background: none;
    }

    .main-text-content {
      width: 100%;
      height: fit-content;
      display: flex;
      flex-direction: column;
      gap: 50px;
      padding: 1rem;
      background: none;
      z-index: 3;
    }

    .main-text-content div {
      display: flex;
      width: 100%;
      background: none;
      font-size: 100%;
    }

    .main-text-content div:nth-child(even) {
      justify-content: flex-end;
    }

    .main-text-content div p {
      padding: 1rem;
      background-color: var(--primary);
      width: 100%;
      border-radius: 1rem;
      line-height: 30px;
      box-shadow: 3px 3px 7px var(--text);
    }

    .main-text-content div p span {
      font-size: larger;
      background-color: var(--primary);
      font-weight: bold;
    }

    .mountains {
      background-image: url("./public/assets/main-page-waves.svg");
      background-size: cover;
      background-position: center;
      position: sticky;
      bottom: 0;
      height: 700px;
      z-index: 2;
    }

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
    <div class="swiper">
      <!-- Additional required wrapper -->
      <div class="swiper-wrapper">
        <!-- Slides -->
        <div class="swiper-slide first-slide">
          <div class="slide-text-container first-slide-text">
            <p>Bukovel: Breathtakingly Beautiful</p>
          </div>
        </div>
        <div class="swiper-slide second-slide">
          <div class="slide-text-container second-slide-text">
            <p>Skiing Paradise Awaits</p>
          </div>
        </div>
        <div class="swiper-slide third-slide">
          <div class="slide-text-container third-slide-text">
            <p>Embrace Winter Wonder</p>
          </div>
        </div>
      </div>
      <div class="swiper-pagination"></div>
    </div>
    <div class="main-text-content">
      <div id="slide-trigger">
        <p>
          <span>Welcome to Bukovel</span><br />
          Bukovel is the largest ski resort in Eastern Europe, nestled in the
          breathtaking Carpathian Mountains of Ukraine. Its picturesque
          location and diverse range of activities make it a year-round
          destination for adventurers and nature enthusiasts.
        </p>
      </div>
      <div>
        <p>
          <span>Winter Wonderland </span><br />
          When winter blankets the Carpathians in snow, Bukovel comes alive
          with the thrills of skiing and snowboarding. The resort offers over
          60 kilometers of meticulously groomed slopes catering to skiers of
          all levels, from beginners to experts. State-of-the-art ski lifts
          ensure quick and easy access to the slopes, while ski schools and
          equipment rentals are available for those new to winter sports. In
          addition to downhill skiing, visitors can partake in snow tubing,
          snowmobiling, and the exhilarating experience of husky dog sledding.
        </p>
      </div>
      <div>
        <p>
          <span>Summer Escapade </span><br />
          As the snow melts away, Bukovel reveals a vibrant summer playground.
          Lush green meadows and dense forests provide the backdrop for an
          array of outdoor activities, including hiking, mountain biking, and
          horseback riding. Nature enthusiasts can explore the region's
          diverse flora and fauna along well-marked trails, which range from
          leisurely strolls to challenging mountain treks. Adrenaline junkies
          can get their fix with zip-lining, ATV tours, and even paragliding,
          offering a bird's-eye view of the stunning landscape.
        </p>
      </div>
      <div>
        <p>
          <span>A Place to Unwind</span><br />
          Bukovel ensures a comfortable and enjoyable stay with its variety of
          accommodation options, ranging from cozy chalets to upscale hotels.
          After a day of outdoor adventures, visitors can relax and rejuvenate
          at the resort's wellness centers, which offer spa treatments,
          saunas, and indoor pools. Additionally, Bukovel's restaurants and
          bars showcase a blend of local and international cuisines, providing
          a delightful culinary experience amidst the mountain scenery.
        </p>
      </div>
      <div>
        <p>
          <span>Experience Ukrainian Hospitality</span><br />
          Beyond its natural beauty and thrilling activities, Bukovel welcomes
          guests with warm Ukrainian hospitality. The resort's friendly
          atmosphere and genuine charm create a welcoming environment for
          families, couples, and groups seeking an unforgettable holiday
          experience in the heart of the Carpathians.
        </p>
      </div>
    </div>

    <div class="mountains">
      <!-- image of mountains while user is on the main part -->
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

  <!-- Swiper.js -->
  <script type="module">
    import Swiper from "https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.mjs";

    const swiper = new Swiper(".swiper", {
      // Optional parameters
      direction: "horizontal",
      loop: true,
      keyboard: {
        enabled: true,
        onlyInViewport: true,
      },
      autoplay: {
        delay: 5000,
      },
      pagination: {
        el: ".swiper-pagination",
      },
    });
  </script>
</body>

</html>