<?php

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
    <link rel="stylesheet" href="./styles/scss/main.css"/>
    <script src="./scripts/events.js" defer></script>
    <title>SIST Events</title>
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

<div style="margin: 0 auto">

    <h1 style="font-size: 196px; margin-top: 25dvh;text-align: center">404</h1>
    <p style="text-align: center;margin-top: 64px; font-size: 18px">Opps... Page not found!!</p>

</div>

</body>
</html>

