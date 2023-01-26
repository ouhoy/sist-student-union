<?php

class SignupContr
{

    private $firstName;
    private $lastName;
    private $email;
    private $username;
    private $password;
    private $gender;
    private $userTitle;
    private $description;
    private $profileUrl;
    private $phoneNumber;
    private $addressOne;
    private $addressTwo;
    private $city;
    private $postCode;

    public function __construct($firstName, $lastName, $email, $username, $password, $gender, $userTitle, $description, $profileUrl, $phoneNumber, $addressOne, $addressTwo, $city, $postCode)
    {
        $this->$firstName = $firstName;
        $this->$lastName = $lastName;
        $this->$email = $email;
        $this->$username = $username;
        $this->$password = $password;
        $this->$gender = $gender;
        $this->$userTitle = $userTitle;
        $this->$description = $description;
        $this->$profileUrl = $profileUrl;
        $this->$phoneNumber = $phoneNumber;
        $this->$addressOne = $addressOne;
        $this->$addressTwo = $addressTwo;
        $this->$city = $city;
        $this->$postCode = $postCode;


    }

    private function emptyInput()
    {
        $result ="";
        $result;


        if (empty($this->$firstName) || empty($this->$lastName) || empty($this->$email)
            || empty($this->$username) || empty($this->$password) || empty($this->$gender)
            || empty($this->$userTitle) || empty($this->$description) || empty($this->$profileUrl)
            || empty($this->$phoneNumber) || empty($this->$addressOne) || empty($this->$addressTwo)
            || empty($this->$city) || empty($this->$postCode)) {
            $result = false;
        } else{
            $result = true;
        }

        return $result;

    }
    private function checkSimilar() {
        $result = false;
        if(!this-> checkUser($this->$email, $thi)) {

        }

    }


}