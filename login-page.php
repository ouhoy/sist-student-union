<?php
$is_valid = false;
$errorText = "something went wrong! Please try again";

if (isset($_POST['submit'])) {

// Getting SignUp Information

    $email = $_POST["email"];
    $password = $_POST["password"];

    $mysqli = require __DIR__ . "/includes/db.php";

    $sql = sprintf("SELECT * FROM users WHERE email = '%s'", $mysqli->real_escape_string($email));

    $result = $mysqli->query($sql);

    $user = $result->fetch_assoc();


    if ($user) {


        if ($_POST["password"] == $user["password"]) {

            session_start();

            session_regenerate_id();

            $_SESSION["user_id"] = $user["user_id"];

            header("Location: dashboard.php");
            exit;

        } else {
            $errorText = "Wrong password!";
            $is_valid = true;
        }

    } else {
        if ($_POST["email"] == "") {
            $errorText = "Invalid login";
            $is_valid = true;


        } else {

            $is_valid = true;
            $errorText = "Email does not exist!";

        }
    }


};

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
    <script src="./scripts/login-validation.js" type="module" defer></script>
    <title>Login</title>
</head>
<body>

<div class="form-page-container login-page">

    <div class="form-container">

        <a href="index.php" title="Navigate to the home page."><img src="./assets/icons/SIST%20logo.svg" alt=""></a>
        <form action="./login-page.php" method="post">
            <?php if ($is_valid): ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo $errorText ?>
                </div>
            <?php endif; ?>

            <div class="form-title">
                <h4>Sign in</h4>

            </div>
            <label for="email">Email</label>
            <input id="email" name="email" name="email" type="email" aria-autocomplete="none" autocomplete="off"
                   placeholder="example@email.com">
            <label for="password">Password</label>
            <input id="password" name="password" name="password" type="password" autocomplete="off"
                   placeholder="password">
            <div class="form-section">
                <div class="form-check-container">
                    <input class="form-check-input" type="checkbox" name="keep-login" id="keep-login">
                    <label for="keep-login">Keep me signed in</label>
                </div>
                <a class="forgot-password" href="#">Forgot password?</a>

            </div>
            <button name="submit" class="submit login-btn-main" type="submit">Sign in</button>
            <div class="create-account">
                <p>Don’t have an account?</p>
                <!--            <a style="width: 100%" href="./register.php">-->
                <button class="tertiary-btn">Create Account</button>
                <!--            </a>-->
            </div>
        </form>
    </div>
</div>
</body>
</html>