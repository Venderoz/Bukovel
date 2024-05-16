<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
    <link rel="shortcut icon" href="./public/assets/icons/favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" href="./public/css/reset.css">
    <title>Sign-up</title>

    <style>
        body {
            width: 100vw;
            height: 100vh;
            position: relative;
        }

        main {
            position: absolute;
            display: flex;
            flex-direction: column;
            width: 100%;
            height: 100%;
            justify-content: center;
            align-items: center;
            z-index: 2;
        }

        .container {
            display: flex;
            flex-direction: column;
            height: 470px;
            width: 350px;
            border-radius: 20px;
            background-color: rgba(250, 250, 250, 0.8);
            box-shadow: 2px 2px 10px 2px #ccc;
        }

        nav {
            flex-basis: 10%;
            display: flex;
            justify-content: center;
            align-items: center;
            border-bottom: 1px solid gray;
        }

        nav h1 a {
            display: block;
            position: absolute;
            left: 20px;
            top: 13px;
        }

        nav h1 {
            position: relative;
            width: 100%;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        form {
            display: flex;
            flex-direction: column;
            flex-basis: 80%;
            justify-content: center;
            align-items: center;
            gap: 20px;
        }

        form div {
            display: flex;
            width: 80%;
            position: relative;
        }

        main a[href="login.php"] {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-basis: 10%;
            border-top: 1px solid gray;
        }

        form div label:not(label[for="birthdate"]) {
            position: absolute;
            top: 0px;
            left: 0px;
            font-size: 16px;
            color: black;
            pointer-events: none;
            transition: all 0.3s;
        }

        label[for="birthdate"] {
            position: absolute;
            top: 0px;
            left: 0px;
            font-size: 16px;
            color: black;
            pointer-events: none;
            top: -12px;
            font-size: 12px;
        }

        form div input {
            border: 0;
            border-bottom: 1px solid rgb(0, 0, 0);
            background: transparent;
            width: 100%;
            padding: 8px 0 5px 0;
            font-size: 16px;
            color: black;
        }

        form div input[name="submit"] {
            cursor: pointer;
            display: flex;
            justify-content: center;
            align-items: center;
            border: none;
            background-color: rgba(50, 91, 195, 1);
            box-shadow: 2px 2px 0px 1px black;
            color: white;
            transition: 0.1s all;
            height: 45px;
            border-radius: 5px;
        }

        form div input[name="submit"]:active {
            box-shadow: none;
            transform: translateY(2px);
        }

        form div input:focus {
            border: none;
            outline: none;
            border-bottom: 1px solid rgba(50, 91, 195, 1)
        }

        form div input:focus~label,
        form div input:valid~label {
            top: -12px;
            font-size: 12px;
        }

        .create-error {
            color: crimson;
        }

        .mountains {
            background-image: url("./public/assets/main-page-waves.svg");
            background-size: cover;
            background-position: center;
            bottom: 0;
            height: 100%;
            z-index: 1;
            position: sticky;
        }

        .bi {
            position: absolute;
            right: 0;
            top: 0;
            font-size: 120%;
            color: black;
            font-weight: bold;
            cursor: pointer;
        }

        input[type="password"]::-ms-reveal,
        input[type="password"]::-ms-clear {
            display: none;
        }
    </style>
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
            <form action="signup_script.php" method="post" autocomplete="off">
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