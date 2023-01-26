<?php

$today = new DateTime();

session_start();

$mysqli = require __DIR__ . "/includes/db.php";

$eventsSQL = "SELECT * FROM event_details";


$res = $mysqli->query($eventsSQL);


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
    <script src="./scripts/index.js" defer></script>
    <title>SIST Student Union</title>
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
<header>
    <h1>Experience the Excitement of Student Union Life at SIST</h1>
    <p>
        SIST Student Union is a student portal within the SIST official website
        which concerns with Student Union’s activities and events.
    </p>
    <div class="head-cta">
        <a href="./register.php">
            <button>Get Started</button>
        </a>
        <a href="#recent-events">See recent events</a>
    </div>
</header>
<main>
    <div id="recent-events" class="events-container">
        <article>
            <img
                    class="article-img"
                 src="./assets/images/SIST Outside Activity.jpg"
                 alt="SIST outside activity"
            />
            <div class="event-keywords">
                <a href="#"><span>#</span>Party</a>
                <a href="#"><span>#</span>Food and Drinks</a>
                <a href="#"><span>#</span>Vocation</a>

            </div>

            <div class="article-body">
                <h6 class="article-body-title">SIST Outdoor Activity</h6>
                <div class="event-details"></div>
                <p class="event-body-text">
                    Join us for a fun-filled day of outdoor adventure at our school's annual camping trip! We'll be
                    hiking through the beautiful woods, learning about nature and wildlife, and even trying our hand at
                    fishing. After a day of exploration, we'll gather around the campfire to roast marshmallows and
                    share stories. Don't forget to bring your camping gear and a sense of adventure! This is an event
                    you won't want to miss..
                </p>
            </div>
        </article>
        <div class="events-menu-container">
            <div class="event-btn event-btn-reshape">
                <p>Show Events</p>
                <img class="rotate" src="./assets/icons/chevron-down.svg" alt="chevron-down">
            </div>
            <div class="events-menu hidden">

                <div class="upcoming-events">
                    <h4>Upcoming Events</h4>
                    <?php while ($row = $res->fetch_assoc()) { ?>
                    <?php if ($today > new DateTime($row["start_date"])) { ?> <?php ?>
                    <div id="<?php echo $row["event_id"]?>" class="event">
                        <p><?php echo $row["start_date"] ?></p>
                        <h6><?php echo $row["event_name"]?> </h6>
                        <img class="hide img" style="display: none"
                             src="<?php echo $row["image_url"]?>"
                             alt="SIST outside activity"
                        />
                        <p  class=" hide content">
                            <?php echo $row["event_description"]?>
                        </p>
                    </div>

                    <?php } ?>
                    <?php } ?>
                </div>
                <div class="previous-events">
                    <h4>Previous Events</h4>

                    <?php while ($row = $res->fetch_assoc()) { ?>
                    <?php if ($today < new DateTime($row["start_date"])) { ?> <?php ?>
                    <div id="<?php echo $row["event_id"]?>" class="event">
                        <p><?php echo $row["start_date"] ?></p>
                        <h6><?php echo $row["event_name"]?> </h6>
                        <img class="hide img" style="display: none"
                             src="<?php echo $row["image_url"]?>"
                             alt="SIST outside activity"
                        />
                        <p  class=" hide content">
                            <?php echo $row["event_description"]?>
                        </p>
                    </div>

                        <?php } ?>
                    <?php } ?>





                    <div id="3" class="event">
                        <p>Yesterday</p>
                        <h6>Halloween Party</h6>
                    </div>
                    <div id="2" class="event">
                        <p>Two days ago</p>
                        <h6>Football Game</h6>
                    </div>
                    <div id="1" class="event">
                        <p>Last Week</p>
                        <h6>Bared Al Maghrib Museum Visit</h6>
                    </div>
                    <div id="0" class="event">
                        <p>Two weeks ago</p>
                        <h6>Ping Pong Tournament</h6>
                    </div>
                </div>
                <a href="events.php">
                    <button>Show more events <img src="./assets/icons/arrow-up-right.svg" alt="Arrow Up Right Icon">
                    </button>
                </a>
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
