import {nameValidation, emailValidation, passwordValidation, userNameValidation} from "./validation.js";

const checkIcon = `<svg width="16" height="11" viewBox="0 0 16 11" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M1 6.14286L5.05 10L14.5 1" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
</svg>
`

function $(id, selectAll = false) {
    return selectAll ? document.querySelectorAll(id) : document.querySelector(id);
}

const steps = $(".step", true)
const userDetails = $(".user-details")
const extraInformation = $(".extra-information")
const homeAddress = $(".home-address")
const doneRegistering = $(".done")
const firstName = $("#firstName")
const lastName = $("#lastName")
const email = $("#email")
const userName = $("#username")
const password = $("#password")

const gender = document.querySelector('input[name="gender"]:checked').value;
const title = $("#user-title")
const description = $("#description")
const profileUrl = $("#profile-url")

const phoneNumber = $("#phone-number")
const addressOne = $("#address-1")
const addressTwo = $("#address-2")
const city = $("#city")
const postcode = $("#post-code")


const stepOneBtn = $(".step-one")
const stepTwoBtn = $(".step-two")
const stepThreeBtn = $(".step-three")

const backToStepOne = $(".back-to-step-1")
const backToStepTwo = $(".back-to-step-2")

const doneBtn = $(".done-btn");

stepOneBtn.addEventListener("click", function (e) {

    e.preventDefault()

    if (!nameValidation(firstName.value, "first name")) return;
    if (!nameValidation(lastName.value, "last name")) return;
    if (!emailValidation(email.value)) return;
    if (!userNameValidation(userName.value)) return;
    if (!passwordValidation(password.value)) return;


    steps[0].removeAttribute("is-active")
    steps[0].querySelector(".step-number").innerHTML = checkIcon;
    steps[0].setAttribute("is-done", "")
    userDetails.classList.add("hide")


    steps[1].setAttribute("is-active", "")
    extraInformation.classList.remove("hide")


})


// Step 2
stepTwoBtn.addEventListener("click", function (e) {
    e.preventDefault()

    if (gender !== "male" && gender !== "female") {
        console.log(gender)
        return alert("Please enter your gender")
    }

    if (!title.value) {
        return alert("Please enter a title")
    }

    if (title.value.length > 10) {
        return alert("Title too long")
    }

    if (description.value.length > 200) {
        return alert("Description too long")

    }
    if (profileUrl.value.length > 100) {
        profileUrl.value = ""
        return alert("Link too long")

    }

    steps[1].removeAttribute("is-active")
    steps[1].querySelector(".step-number").innerHTML = checkIcon;
    steps[1].setAttribute("is-done", "")
    extraInformation.classList.add("hide")

    steps[2].setAttribute("is-active", "")
    homeAddress.classList.remove("hide")


})

backToStepOne.addEventListener("click", function (e) {
    e.preventDefault()
    steps[2].removeAttribute("is-active")
    steps[0].removeAttribute("is-done", "")
    steps[0].setAttribute("is-active", "")
    steps[0].querySelector(".step-number").innerHTML = `<p>1</p>`;
    userDetails.classList.remove("hide")
    extraInformation.classList.add("hide")
})


// Step 3
stepThreeBtn.addEventListener("click", function (e) {
    e.preventDefault()

    if (phoneNumber.value.length > 15) {
        return alert("The phone is too loong! Should not exceed 15 integers.")
    }

    if (addressOne.value.length > 50) {
        return alert("The address is too long! Should not exceed 50 characters")
    }
    if (addressTwo.value.length > 50) {
        return alert("The address is too long! Should not exceed 50 characters")
    }
    if (city.value.length > 50) {
        return alert("The city name is too long! Should not exceed 50 characters")
    }

    if (postcode.value.length > 10) {
        return alert("The postcode is too long! Should not exceed 10 characters")
    }


    steps[2].removeAttribute("is-active")
    steps[2].querySelector(".step-number").innerHTML = checkIcon;
    steps[2].setAttribute("is-done", "")
    homeAddress.classList.add("hide")

    steps[3].setAttribute("is-active", "")
    doneRegistering.classList.remove("hide")
})

doneBtn.addEventListener("click", function (e) {
    e.preventDefault()
})