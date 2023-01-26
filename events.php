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


<div class="events-page-container">
    <h2>Events</h2>
    <div class="events-controller">
        <button>Upcoming</button>
        <button class="secondary-btn">Previous</button>
    </div>


    <div class="upcoming">
        <?php
        $res = $mysqli->query($eventsSQL);

        while ($row = $res->fetch_assoc()) { ?>


            <?php if ($today < new DateTime($row["start_date"])) { ?>


                <a href="event-page.php?event-id=<?php echo $row['event_id'] ?>">
                    <div class="event">
                        <div class="event-date">
                            <?php $dateObj = DateTime::createFromFormat('!m', explode("-", $row["start_date"])[1]);
                            $monthName = $dateObj->format('M'); ?>
                            <p class="day"><?php echo explode("-", $row["start_date"])[2] ?></p>
                            <p class="month"><?php echo $monthName ?></p>
                        </div>
                        <div class="event-details">
                            <p class="event-title">
                                <?php echo $row["event_name"] ?>
                            </p>
                            <p class="event-author">
                                <?php  $sql = "SELECT * FROM users WHERE user_id = {$row["user_id"]}";
                                $result = $mysqli->query($sql);
                                $user = $result->fetch_assoc(); ?>
                                By <?php echo $user["first_name"] ?> <?php echo $user["last_name"] ?></p>
                        </div>
                    </div>
                </a>

            <?php } ?>

            <?php
        }; ?>
    </div>

    <div class="previous hide">
        <?php
        $res = $mysqli->query($eventsSQL);

        while ($row = $res->fetch_assoc()) { ?>
            <?php if ($today > new DateTime($row["start_date"])) { ?>
                <a href="event-page.php?event-id=<?php echo $row['event_id'] ?>">
                    <div class="event">
                        <div class="event-date">
                            <?php $dateObj = DateTime::createFromFormat('!m', explode("-", $row["start_date"])[1]);
                            $monthName = $dateObj->format('M'); ?>
                            <p class="day"><?php echo explode("-", $row["start_date"])[2] ?></p>
                            <p class="month"><?php echo $monthName ?> </p>
                        </div>
                        <div class="event-details">
                            <p class="event-title">
                                <?php echo $row["event_name"] ?>
                            </p>
                            <p class="event-author">
                                By <?php echo $user["first_name"] ?> <?php echo $user["last_name"] ?></p>
                        </div>
                    </div>
                </a>


                <?php
            }; ?>
            <?php
        }; ?>
    </div>
</div>


</body>
</html>