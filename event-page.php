<?php

session_start();
$mysqli = require __DIR__ . "/includes/db.php";



if (isset($_GET["event-id"])) {

    $sql = "SELECT * FROM event_details WHERE event_id = {$_GET["event-id"]}";
    $result = $mysqli->query($sql);
    $event = $result->fetch_assoc();

}


else {
    header("Location: 404.php");
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="preconnect" href="https://fonts.googleapis.com"/>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin/>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet"/>
    <link rel="stylesheet" href="./styles/scss/main.css"/>
    <script src="./scripts/events.js" defer></script>
    <title>My Event</title>
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
<main>
    <div class="event-header">
        <a class="event-category"><span>#</span><?php echo $event["event_category"] ?></a>

        <h4 class="event-title"><?php echo $event["event_name"] ?></h4>
        <div class="event-author-details">
            <img src="./assets/images/abdallah_dahmou_avatar.jpg" alt="The author Abdallah Dahmou" srcset="">
            <div class="date-and-author">

                <p class="event-author-name">
                    <?php  $sql = "SELECT * FROM users WHERE user_id = {$event["user_id"]}";
                    $result = $mysqli->query($sql);
                    $user = $result->fetch_assoc(); ?>
                    By <?php echo $user["first_name"] ?> <?php echo $user["last_name"] ?></p>

                <p class="post-date">16 JAN 2023</p>
            </div>
        </div>
        <div class="event-body">
            <div>

                <img src="<?php echo $event["image_url"] ?>" alt="SIST activity" srcset="">
                <div class="event-keywords">
                    <?php foreach (explode(",", $event["keywords"]) as $keyword) { ?>
                        <a href="#"><span>#</span><?php echo $keyword ?></a>

                    <?php } ?>
                </div>
                <div class="event-description">
                    <p>
                        <?php echo $event["event_description"] ?>
                    </p>
                </div>
            </div>
        </div>

    </div>
</main>
<footer>
    <div class="footer-details-container">
        <div class="footer-details">
            <div class="sist-footer"></div>
            <div class="sist-contact-info"></div>
        </div>
    </div>
    <div class="footer-nav-container">
        <div class="footer-nav">
            <p>SIST © 2022 All Rights Reserved</p>
            <div class="links">
                <a href="index.php">Home</a>
                <a href="about.php">About</a>
                <a href="events.php">Events</a>
            </div>
        </div>
    </div>

</footer>
</body>
</html>