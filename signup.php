<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
    <link rel="shortcut icon" href="./public/assets/icons/favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" href="./public/css/reset.css">
    <link rel="stylesheet" href="./public/css/signup_styles.css">

    <title>Sign-up</title>
</head>

<body>
    <main>
        <div class="container">
            <nav>
                <h1> 
                    <a href="#" id="move-to-previous">
                        <img src="./public/assets/icons/dark_backward_arrow.svg" alt="arrow to go back">
                    </a>Sign up
                </h1>
            </nav>
            <form action="./src/signup_script.php" method="post" autocomplete="off">
                <div class="username-box">
                    <input type="text" name="username" id="username" required>
                    <label for="username">
                        Username
                    </label>
                </div>
                <div class="email-box">
                    <input type="email" name="email" id="email" required>
                    <label for="email">
                        Email
                    </label>
                </div>
                <div class="password-box">
                    <input type="password" name="password-1" id="password" required>
                    <i class="bi bi-eye-slash" id="togglePassword"></i>
                    <label for="password">
                        Password
                    </label>
                </div>
                <div class="repeat-password-box">
                    <input type="password" name="password-2" required>
                    <label for="password">
                        Repeat password
                    </label>
                </div>
                <div class="birthdate-box">
                    <input type="date" name="birthdate" id="birthdate" required>
                    <label for="birthdate">
                        Birthdate
                    </label>
                </div>
                <div class="submit-box">
                    <input type="submit" value="Create" name="submit">
                </div>
                <?php if (isset($_GET['msg'])) : ?>
                    <script>alert("<?= $_GET['msg'] ?>");</script>
                <?php endif; ?>
            </form>
            <a href="login.php"><small>Already have an account? Login then!</small></a>
        </div>
    </main>
    <div class="mountains">
        <!-- image of mountains while user is on the main part -->
    </div>

    <script src="./public/scripts/moveToPrevious.js"></script>
    <script>
        const togglePassword = document.querySelector("#togglePassword");
        const password = document.querySelector("#password");
        togglePassword.addEventListener("click", function() {
            const type = password.getAttribute("type") === "password" ? "text" : "password";

            password.setAttribute("type", type);

            this.classList.toggle("bi-eye");
        });
    </script>
</body>

</html>