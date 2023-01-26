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
    <title>About</title>
</head>
<body class="about-page">
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

<div class="about-container">
    <div class="about-website">
        <h2>About the website</h2>
        <p>This website is a platform for a school's student union, where events organized by the student union are
            displayed. The website includes a list of upcoming events, with detailed information about the event such as
            the event name, start time, and any other relevant information. The events are organized by the start time
            of the event, so that the users can easily see the events that are coming up next. The website also provides
            a way for students to get involved in the student union and sign up for events.</p>
    </div>
</div>
<div class="about-container">
        <h2>About the developer</h2>
    <div class="about-dev">
        <img  src="./assets/images/nki-Recovered-1%20(1).jpg" alt="Abdallah Dahmou">

        <p>My name is Abdallah Dahmou, a web developer and a software engineering student at SIST British education. I
            have been a web developer for two years now, and during that time, I have gained a wealth of knowledge and
            experience in the field. I am well-versed in various programming languages such as HTML, CSS, JavaScript,
            and Python, and I am confident in my ability to design and develop high-quality websites and web applications.
            In addition to my technical skills, I also possess strong problem-solving and critical thinking abilities,
            which allows me to approach and solve complex challenges in an efficient and effective manner. I am always
            eager to learn new technologies and improve my skills, and I am confident that my expertise in web
            development will help me to excel in my studies and in my future career.</p>
    </div>
    <div class="dev-links">
        <p>Links:</p>
        <a class="git-hub" href="https://github.com/ouhoy">GitHub</a>
        <a class="linked-in" href="https://www.linkedin.com/in/abdallah-dahmou-628490203/">LinkedIn</a>
            </div>
</div>
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