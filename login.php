<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
    <link rel="stylesheet" href="./public/css/resetting.css">
    <title>Login</title>

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
        nav{
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
            gap: 30px;
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

        small {
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
                <h1>Login</h1>
            </nav>
            <form action="authenticate.php" method="post" autocomplete="off">
                <div class="username-box">
                    <label for="username">
                        <i class="fas fa-user"></i>
                    </label>
                    <input type="text" name="username" placeholder="Username" id="username" required>
                </div>
                <div class="password-box">
                    <label for="password">
                        <i class="fas fa-lock"></i>
                    </label>
                    <input type="password" name="password" placeholder="Password" id="password" required>
                </div>
                <input type="submit" value="Login" name="submit">
                <?php if (isset($_GET['res'])) : ?>
                    <small> <?= $_GET['res'] ?> </small>
                <?php endif; ?>
            </form>
        </div>
    </main>

</body>

</html>