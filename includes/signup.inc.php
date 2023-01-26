<?php

if (isset($_POST["submit"])) {


    include "./db.php";

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



    print_r( $_POST);


}