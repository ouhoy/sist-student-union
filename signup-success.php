<?php

header("refresh:4;url=login-page.php");


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="preconnect" href="https://fonts.googleapis.com"/>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin/>
    <link
            href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap"
            rel="stylesheet"
    />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <link rel="stylesheet" href="./styles/scss/main.css"/>


    <title>Welcome on board!!</title>
</head>
<body>
<div class="nav-container">
    <nav>
        <div class="logo">
            <a href="index.php">
                <img
                        src="./assets/icons/SIST Events Logo.svg"
                        alt="SIST Events Logo"
                />
                <h6 class="logo-title">SIST events</h6>
            </a>
        </div>
        <div class="links-holder">
            <div class="links hide-for-tablet">
                <a href="index.php">Home</a>
                <a href="./about.php">About</a>
                <a href="events.php">Events</a>
            </div>
            <div class="nav-cta">
                <a href="login-page.php">Login</a>
                <button onclick="window.location.href = 'register.php'">Get Started</button>
            </div>
            <div class="ham-menu show-for-tablet">
                <img src="assets/icons/ham-menu.svg" alt="menu icon">
            </div>
        </div>
    </nav>
</div>

<div class="form-page-container register-page">

    <div class="form-container">

        <!-- REGISTER STEPS -->
        <div class="register-steps">
            <div is-done class="step">
                <div class="step-number">
                    <p>1</p>
                </div>
                <p>
                    User details
                </p>
            </div>
            <hr>
            <div is-done class="step">
                <div class="step-number">
                    <p>2</p>
                </div>
                <p>
                    Extra information
                </p>
            </div>
            <hr>
            <div is-done class="step">
                <div class="step-number">
                    <p>3</p>
                </div>
                <p>
                    Address
                </p>
            </div>
            <hr>

            <div is-done class="step">
                <div class="step-number">
                    <p>4</p>
                </div>
                <p>
                    Done!
                </p>
            </div>
        </div>

        <form action="./register.php" method="post">


            <!-- DONE -->
            <div class="done">
                <p style="text-align: center">You have created an account successfully.</p>
                <p style="text-align: center">You will be redirected to the login page after 5 seconds </p>

            </div>
        </form>

    </div>
</div>
</body>
</html>

