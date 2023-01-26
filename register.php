<?php


if (isset($_POST['submit'])) {


// Getting SignUp Information
    $firstName = $_POST["first-name"];
    $lastName = $_POST["last-name"];
    $email = $_POST["email"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $gender = $_POST["gender"];
    $userTitle = $_POST["user-title"];
    $description = $_POST["description"];
    $profileUrl = $_POST["profile-url"];
    $phoneNumber = $_POST["phone-number"];
    $addressOne = $_POST["address-1"];
    $addressTwo = $_POST["address-2"];
    $city = $_POST["city"];
    $postCode = $_POST["post-code"];

    $mysqli = require __DIR__ . "/includes/db.php";


    $sql = "INSERT INTO users (password,username, email, title,first_name, last_name,gender, address1, address2,address3,
                  postcode, description, telephone, profile_url)
        VALUES ( '{$_POST["password"]}', '$username', '$email', '$userTitle', '$firstName', '$lastName', '$gender','$addressOne', '$addressTwo', '$city',
        '$postCode', '$description', '$phoneNumber', '$profileUrl')";

    $stmt = $mysqli->stmt_init();

    if (!$stmt->prepare($sql)) {
        die("SQL error: " . $mysqli->error);
    }


    if ($stmt->execute()) {

        header("Location: signup-success.php");
        exit;
    } else {

        if ($mysqli->errno === 1062) {
            die("email already taken");
            header("refresh:2url=register.php");

        } else {
            die($mysqli->error . " " . $mysqli->errno);
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
    <link rel="preconnect" href="https://fonts.googleapis.com"/>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin/>
    <link
            href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap"
            rel="stylesheet"
    />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <link rel="stylesheet" href="./styles/scss/main.css"/>
    <script src="./scripts/register-validation.js" type="module" defer></script>

    <script src="http://code.jquery.com/jquery-latest.js"></script>


    <title>Get Started</title>
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
            <div is-active class="step">
                <div class="step-number">
                    <p>1</p>
                </div>
                <p>
                    User details
                </p>
            </div>
            <hr>
            <div class="step">
                <div class="step-number">
                    <p>2</p>
                </div>
                <p>
                    Extra information
                </p>
            </div>
            <hr>
            <div class="step">
                <div class="step-number">
                    <p>3</p>
                </div>
                <p>
                    Address
                </p>
            </div>
            <hr>

            <div class="step">
                <div class="step-number">
                    <p>4</p>
                </div>
                <p>
                    Done!
                </p>
            </div>
        </div>

        <form action="./register.php" method="post">

            <!-- USER DETAILS -->
            <div class="user-details">


                <div class="first-last-name">
                    <div>
                        <label for="firstName">First name</label>
                        <input name="first-name" id="firstName" type="text" aria-autocomplete="none" autocomplete="off"
                               placeholder="john">
                    </div>
                    <div>
                        <label for="lastName">Last name</label>
                        <input name="last-name" id="lastName" type="text" aria-autocomplete="none" autocomplete="off"
                               placeholder="doe">
                    </div>
                </div>

                <label for="email">Email</label>
                <input name="email" id="email" type="email" aria-autocomplete="none" autocomplete="off"
                       placeholder="example@email.com">
                <label for="username">Username</label>
                <input name="username" id="username" type="text" aria-autocomplete="none" autocomplete="off"
                       placeholder="username">
                <label for="password">Password</label>
                <input name="password" aria-autocomplete="none" id="password" type="password" autocomplete="off"
                       placeholder="password">
                <button class="step-one">Continue</button>

            </div>

            <!-- EXTRA INFORMATION -->
            <div class="extra-information hide">

                <label>Gender </label>
                <div class="radio-buttons">

                    <div class="form-check">
                        <input class="form-check-input" type="radio" checked name="gender" value="female"
                               id="flexRadioDefault1">
                        <label class="form-check-label" for="flexRadioDefault1">
                            Female
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="gender" value="male" id="flexRadioDefault2">
                        <label class="form-check-label" for="flexRadioDefault2">
                            Male
                        </label>
                    </div>
                </div>


                <label for="user-title">Title</label>
                <input name="user-title" id="user-title" type="text" aria-autocomplete="none" autocomplete="off"
                       placeholder="example web developer">

                <label for="description">Description</label>
                <textarea name="description" id="description" placeholder="description"></textarea>

                <label for="profile-url">Profile link</label>
                <input name="profile-url" id="profile-url" type="text" aria-autocomplete="none" autocomplete="off"
                       placeholder="profile url">

                <button class="step-two">Continue</button>
                <button style="margin-top: 8px" class="tertiary-btn back-to-step-1">Go back</button>

            </div>

            <!-- USER ADDRESS -->
            <div class="home-address hide">

                <label for="phone-number">Telephone</label>
                <input name="phone-number" id="phone-number" type="number" aria-autocomplete="none" autocomplete="off"
                       placeholder="telephone">

                <label for="address-1">Address 1</label>
                <input name="address-1" id="address-1" type="text" aria-autocomplete="none" autocomplete="off"
                       placeholder="street address">
                <label for="address-2">Address 2</label>
                <input name="address-2" id="address-2" type="text" aria-autocomplete="none" autocomplete="off"
                       placeholder="apartment, suite, etc">
                <label for="city">City</label>
                <input name="city" id="city" type="text" aria-autocomplete="none" autocomplete="off" placeholder="city">
                <label for="post-code">Postcode</label>
                <br>
                <input name="post-code" style="width: 190px" id="post-code" type="text" aria-autocomplete="none"
                       autocomplete="off"
                       placeholder="postcode">
                <!--                <input class="step-three" type="submit" name="submit" value="Send" class="btn btn-dark w-100 su-btn">-->
                <button class="step-three" name="submit" type="submit">Continue</button>
                <button style="margin-top: 8px" class="tertiary-btn back-to-step-2">Go back</button>
            </div>

            <!-- DONE -->
            <div class="done hide">
                <p style="text-align: center">You have created an account successfully.</p>
                <p style="text-align: center">Click on this button to log in</p>
                <button class="done-btn" onclick="window.location.href = 'login-page.php'">Login</button>
            </div>
        </form>

    </div>
</div>
</body>
</html>

