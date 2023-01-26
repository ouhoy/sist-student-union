<?php
$is_valid = false;
$errorText = "something went wrong! Please try again";
function inputValidation($inputVal, $charLimit, $inputType)
{
    global $is_valid, $errorText;

    if (strlen($inputVal) > $charLimit) {
        $is_valid = true;
        $errorText = "Please make sure the {$inputType} does not exceed 100 character";
        return false;
    }
    if ($inputVal == "") {
        $is_valid = true;
        $errorText = "{$inputType} field is required";
        return false;
    }
    return true;
}


session_start();
$mysqli = require __DIR__ . "/includes/db.php";


if (isset($_SESSION["user_id"])) {


    $sql = "SELECT * FROM users WHERE user_id = {$_SESSION["user_id"]}";

    $result = $mysqli->query($sql);

    $user = $result->fetch_assoc();

}


if (isset($_POST['submit'])) {

    $eventName = $_POST["event-name"];
    $eventDescription = $_POST["event-description"];
    $eventCategory = $_POST["event-category"];
    $eventKeywords = $_POST["event-keywords"];
    $imageUrl = $_POST["image-url"];
    $videoUrl = $_POST["video-url"];
    $startDate = $_POST["start-date"];
    $endDate = $_POST["end-date"];

    if (inputValidation($eventName, 100, "Event name") &&
        inputValidation($eventDescription, 500, "Event description") &&
        inputValidation($eventCategory, 50, "Event category") &&
        inputValidation($eventKeywords, 100, "Event keywords") &&
        inputValidation($imageUrl, 100, "Image url") &&
        inputValidation($videoUrl, 100, "Video url") &&
        inputValidation($startDate, 10, "Start date") &&
        inputValidation($endDate, 10, "End date")) {

        $sql = "INSERT INTO event_details (user_id,event_name, event_description, event_category,keywords, video_url ,image_url, start_date, end_date)
        VALUES ({$user["user_id"]},'$eventName', '$eventDescription', '$eventCategory', '$eventKeywords', '$videoUrl','$imageUrl',  '$startDate', '$endDate')";


        $stmt = $mysqli->stmt_init();

        if (!$stmt->prepare($sql)) {
            die("SQL error: " . $mysqli->error);
        }

        if ($stmt->execute()) {
            header("Location: dashboard.php");

            exit;
        } else {
            echo "Error, something went wrong please try again!";
        }


    }


}


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
                <a href="./dashboard.php">
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

    <div class="dashboard-header">
        <div class="page-form-title">
            <h4>Add an Event</h4>
        </div>
        <div></div>
    </div>
    <form action="./add-event.php" method="post">
        <?php if ($is_valid): ?>
            <div style="width: 100%" class="alert alert-danger" role="alert">
                <?php echo $errorText ?>
            </div>
        <?php endif; ?>

        <label for="event-name">Event name</label>
        <input value="<?= htmlspecialchars($_POST["event-name"] ?? "") ?>" name="event-name" id="event-name" type="text"
               aria-autocomplete="none" autocomplete="off"
               placeholder="event name">

        <label for="event-description">Event description</label>
        <textarea value="<?= htmlspecialchars($_POST["event-description"] ?? "") ?>" name="event-description"
                  id="event-description" placeholder="event description"></textarea>

        <label for="event-category">Event category</label>
        <input value="<?= htmlspecialchars($_POST["event-category"] ?? "") ?>" name="event-category" id="event-category"
               type="text" aria-autocomplete="none" autocomplete="off"
               placeholder="event category">

        <label for="event-keywords">Event keywords</label>
        <input value="<?= htmlspecialchars($_POST["event-keywords"] ?? "") ?>" name="event-keywords" id="event-keywords"
               type="text" aria-autocomplete="none" autocomplete="off"
               placeholder="e.g. football, outdoor, food, etc.">

        <label for="image-url">Image url</label>
        <input value="<?= htmlspecialchars($_POST["image-url"] ?? "") ?>" name="image-url" id="image-url" type="text"
               aria-autocomplete="none" autocomplete="off"
               placeholder="image url">

        <label for="video-url">Video url</label>
        <input value="<?= htmlspecialchars($_POST["video-url"] ?? "") ?>" name="video-url" id="video-url" type="text"
               aria-autocomplete="none" autocomplete="off"
               placeholder="video url">

        <label for="start-date">Start date</label>
        <input type="date" name="start-date" id="start-date">

        <label for="end-date">End date</label>
        <input type="date" name="end-date" id="end-date">

        <button name="submit" class="submit" type="submit">Publish new event</button>

    </form>
<?php else: ?>

    <?php header("Location: index.php"); ?>

<?php endif; ?>

</body>
</html>