<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
    <link rel="stylesheet" href="./public/css/resetting.css">
    <title>Sign-up</title>

    <style>
        main {
            display: flex;
            flex-direction: column;
            width: 100%;
            height: 100%;
            justify-content: center;
            align-items: center;
        }

        .container {
            display: flex;
            flex-direction: column;
            height: 350px;
            width: 300px;
            border-radius: 20px;
            border: 1px solid gray;
        }

        nav {
            flex-basis: 10%;
            display: flex;
            justify-content: center;
            align-items: center;
            border-bottom: 1px solid gray;
        }

        form {
            display: flex;
            flex-direction: column;
            flex-basis: 90%;
            justify-content: center;
            align-items: center;
            gap: 10px;
        }

        form div {
            display: flex;
            width: 80%;
            height: 30px;
        }

        form div label {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-basis: 10%;
            height: 100%;
        }

        form div input {
            flex-basis: 90%;
            height: 100%
        }

        .login-error {
            color: red;
        }
    </style>
</head>

<body>
    <main>
        <div class="container">
            <nav>
                <a href="welcomePage.php">
                    <img src="./public/assets/icons/dark_backward_arrow.svg" alt="arrow to go back">
                </a>
                <h1>Sign up</h1>
            </nav>
            <form action="signup_script.php" method="post" autocomplete="off">
                <div class="username-box">
                    <label for="username">
                        <i class="fas fa-user"></i>
                    </label>
                    <input type="text" name="username" placeholder="Username" id="username" required>
                </div>
                <div class="email-box">
                    <label for="email">
                        <i class="fas fa-user-tag"></i>
                    </label>
                    <input type="email" name="email" placeholder="Email" id="email" required>
                </div>
                <div class="password-box">
                    <label for="password">
                        <i class="fas fa-lock"></i>
                    </label>
                    <input type="password" name="password" placeholder="Password" id="password" required>
                </div>
                <div class="birthdate-box">
                    <label for="email">
                        <i class="fas fa-calendar"></i>
                    </label>
                    <input type="date" name="birthdate" placeholder="Birthdate" id="birthdate" required>
                </div>
                <div class="phone-box">
                    <label for="email">
                        <i class="fas fa-phone"></i>
                    </label>
                    <input type="number" name="phone" placeholder="Phone" id="phone">
                </div>
                <input type="submit" value="Create" name="submit">
                <?php if (isset($_GET['err'])) : ?>
                    <small class="create-error"> <?= $_GET['err'] ?> </small>
                <?php endif; ?>
                <a href="login.php"><small>Already have an account? Login then!</small></a>
            </form>
        </div>
    </main>

</body>

</html>