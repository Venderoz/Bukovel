<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="./public/css/reset.css">
    <link rel="shortcut icon" href="./public/assets/icons/favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" href="./public/css/login_styles.css">

    <title>Login</title>
</head>

<body>
    <main>
        <div class="container">
            <nav>
                <h1>
                    <a href="#" id="move-to-previous">
                        <img src="./public/assets/icons/dark_backward_arrow.svg" alt="arrow to go back">
                    </a>
                    Login
                </h1>
            </nav>
            <form action="./src/login_script.php" method="post" autocomplete="off">
                <div class="username-box">
                    <input type="text" name="username" id="username" required>
                    <label for="username">
                        Username
                    </label>
                </div>
                <div class="password-box">
                    <input type="password" name="password" id="password" required>
                    <i class="bi bi-eye-slash" id="togglePassword"></i>
                    <label for="password">
                        Password
                    </label>
                </div>
                <div class="submit-box">
                    <input type="submit" value="Login" name="submit">
                </div>
                <?php if (isset($_GET['msg'])) : ?>
                    <script>
                        alert("<?= $_GET['msg'] ?>");
                    </script>
                <?php endif; ?>
            </form>
            <a href="signup.php"><small>Don't have an account? Make one!</small></a>
        </div>
    </main>
    <div class="mountains">
        <!-- image of mountains while user is on the main part -->
    </div>

    <script src="./public/scripts/moveToPrevious.js"></script>
    <script src="./public/scripts/showPassword.js"></script>
</body>

</html>