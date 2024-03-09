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
  <link rel="shortcut icon" href="./public/assets/icons/favicon.ico" type="image/x-icon" />
  <link rel="stylesheet" href="./public/css/theme-colors.css" />
  <link rel="stylesheet" href="./public/css/resetting.css" />
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
      width: 100%;
      height: 400px;
      border: none;
      z-index: 3;
    }

    .swiper-slide {
      width: 100%;
      height: 100%;
    }

    .swiper-slide>figure {
      position: relative;
      width: 100%;
      height: 100%;
    }

    .swiper-slide>figure>img {
      position: absolute;
      width: 100%;
      height: 100%;
      z-index: 2;
    }

    .swiper-slide>figure>a {
      position: absolute;
      display: block;
      text-decoration: none;
      z-index: 3;
      padding: 1rem;
      border-radius: 10px;
      box-shadow: 3px 3px 5px gray;
      font-style: italic;
      background-color: rgba(0, 0, 0, 0.5);
      color: white;
    }

    .swiper-slide>figure>.first-slide-text {
      width: 210px;
      font-size: 120%;
      left: 20px;
      top: 110px;
    }

    .swiper-slide>figure>.second-slide-text {
      width: 200px;
      font-size: 80%;
      right: 20px;
      top: 110px;
    }

    .swiper-slide>figure>.third-slide-text {
      width: 200px;
      font-size: 80%;
      right: 20px;
      bottom: 40px;
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
      padding: 3rem;
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
    @media (max-width: 480px) {}

    /* Media Query for low resolution  Tablets, Ipads */
    @media (min-width: 481px) and (max-width: 767px) {}

    /* Media Query for Tablets Ipads portrait mode */
    @media (min-width: 768px) and (max-width: 1024px) {
      .swiper {
        width: 100%;
        height: 600px;
      }

      .swiper-slide>figure>.first-slide-text {
        left: 40px;
        top: 150px;
        width: 300px;
        font-size: 150%;
      }

      .swiper-slide>figure>.second-slide-text {
        right: 40px;
        top: 140px;
        width: 300px;
        font-size: larger;
      }

      .swiper-slide>figure>.third-slide-text {
        right: 40px;
        bottom: 40px;
        width: 300px;
        font-size: larger;
      }
    }

    /* Media Query for Laptops and Desktops */
    @media (min-width: 1025px) and (max-width: 1280px) {
      .swiper {
        width: 100%;
        height: 700px;
      }

      .swiper-slide>figure>.first-slide-text {
        left: 40px;
        top: 150px;
        width: 350px;
        font-size: 200%;
      }

      .swiper-slide>figure>.second-slide-text {
        right: 40px;
        top: 140px;
        width: 350px;
        font-size: x-large;
      }

      .swiper-slide>figure>.third-slide-text {
        right: 40px;
        bottom: 40px;
        width: 350px;
        font-size: x-large;
      }

      .main-text-content div p {
        width: 45%;
      }

      .main-text-content div {
        font-size: 130%;
      }
    }

    /* Media Query for Large screens */
    @media (min-width: 1281px) {
      .swiper {
        width: 100%;
        height: 750px;
      }

      .swiper-slide>figure>.first-slide-text {
        left: 40px;
        top: 150px;
        width: 600px;
        font-size: 230%;
      }

      .swiper-slide>figure>.second-slide-text {
        right: 40px;
        top: 140px;
        width: 350px;
        font-size: x-large;
      }

      .swiper-slide>figure>.third-slide-text {
        right: 40px;
        bottom: 40px;
        width: 350px;
        font-size: x-large;
      }

      .main-text-content div p {
        width: 45%;
      }

      .main-text-content div {
        font-size: 130%;
      }
    }
  </style>
</head>
<!-- ----------------------------------------------------------------------- -->

<body>
  <div class="sidebar-menu-container" id="sidebar-menu-container">
    <div class="content">
      <div class="close-button-box">
        <button type="button" id="close-btn"><span>&xotime;</span></button>
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
              <?php if ($accountImage != "") : ?>
                <img class="user-image" src="data:image;base64,<?php echo base64_encode($accountImage); ?>" alt="">
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
              <?php if ($accountImage != "") : ?>
                <img class="user-image" src="data:image;base64,<?php echo base64_encode($accountImage); ?>" alt="">
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
        <div class="swiper-slide">
          <figure>
            <img src="./public/assets/Bukovel1.png" alt="Bukovel1.png" />
            <a href="#slide-trigger" class="first-slide-text">
              Welcome to Bukovel &#8212; <br />
              a stunning ski resort nestled in the heart of the Carpathian
              Mountains.
            </a>
          </figure>
        </div>
        <div class="swiper-slide">
          <figure>
            <img src="./public/assets/Bukovel2.png" alt="Bukovel2.png" />
            <a href="#" class="second-slide-text">
              At Bukovel, visitors can easily arrange their ski adventure by
              conveniently ordering their ski pass and equipment in advance.
              Streamline your experience and maximize your time on the slopes
              by planning ahead and securing everything you need for a
              seamless skiing or snowboarding experience.
            </a>
          </figure>
        </div>
        <div class="swiper-slide">
          <figure>
            <img src="./public/assets/Bukovel3.png" alt="Bukovel3.png" />
            <a href="#" class="third-slide-text">
              As the sun sets behind the snow-capped peaks, embrace the cozy
              warmth of Bukovel's après-ski scene. Unwind with a cup of mulled
              wine, savor delicious local cuisine, and relish the camaraderie
              of fellow adventurers. Let the enchanting atmosphere of Bukovel
              make your winter getaway truly unforgettable.
            </a>
          </figure>
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