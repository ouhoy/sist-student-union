<?php

session_start();

$mysqli = require __DIR__ . "/includes/db.php";

$today = new DateTime();


if (isset($_SESSION["user_id"])) {

    $sql = "SELECT * FROM users WHERE user_id = {$_SESSION["user_id"]}";
    $result = $mysqli->query($sql);
    $user = $result->fetch_assoc();

}

$eventsSQL = "SELECT * FROM event_details";

$res = $mysqli->query($eventsSQL);


//print_r($result)

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com"/>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin/>
    <link
            href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap"
            rel="stylesheet"
    />

    <link rel="stylesheet" href="./styles/scss/main.css"/>
    <script src="./scripts/dashboard.js" type="module" defer></script>
    <title>Dashboard</title>
</head>

<body class="border-dashboard">

<?php if (isset($user)): ?>

    <div class="nav-container">
        <nav>
            <div class="logo">
                <a href="#">
                    <img
                            src="./assets/icons/SIST Events Logo.svg"
                            alt="SIST Events Logo"
                    />
                    <h6 class="logo-title">SIST events</h6>
                </a>
            </div>
            <div class="user">
                <p><?= htmlspecialchars($user["first_name"][0]) ?> <?= htmlspecialchars($user["last_name"][0]) ?></p>
                <div class="avatar-menu hide">

                    <a href="./logout.php"> <img src="./assets/icons/arrow-right-from-arc.svg" alt="logout icon">
                        Logout</a>

                </div>
            </div>


        </nav>
    </div>


    <div class="dashboard-container">

        <div class="dashboard-header">

            <div>
                <h4>Events</h4>
                <p>A list of all events</p>
            </div>
            <button onclick="window.location.href = 'add-event.php'">Add Event</button>
        </div>

        <div class="table">
            <table class="table">
                <thead class="table-light">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Event</th>
                    <th scope="col">State</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>
                <?php
                $res = $mysqli->query($eventsSQL);
                while ($row = $res->fetch_assoc()) { ?>
                    <tr>

                        <th scope="row"><p style="margin-top:8px "
                                           class="event-title-dash"><?php echo $row["event_id"] ?></p></th>
                        <td style="width: 645px; "><p style="margin-top:16px "
                                                      class="event-title-dash"><?php echo $row["event_name"] ?></p></td>
                        <td><p <?php if ($today < new DateTime($row["start_date"])) {
                                echo "is-pending";
                            } ?> class="event-status"><?php if ($today < new DateTime($row["start_date"])) {
                                    echo "Pending";
                                } else {
                                    echo "Done";
                                } ?></>
                        </td>
                        <td></td>
                        <td class="edit-event"><a style="color: #366CE2;"
                                                  href="./edit-event.php?event-id=<?php echo $row['event_id'] ?>"><p
                                        class="event-status edit">Edit</p></a></td>
                        <td class="edit-event"><a style="color: #de3232;"
                                                  href="./delete-event.php?event-id=<?php echo $row['event_id'] ?>"><p
                                        class="event-status delete">Delete</p></a></td>
                        <td></td>
                    </tr>


                    <?php
                }
                ?>

                </tbody>
            </table>
        </div>
    </div>

<?php else: ?>

    <?php header("Location: index.php"); ?>

<?php endif; ?>

</body>
</html>