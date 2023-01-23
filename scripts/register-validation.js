import {nameValidation, emailValidation, passwordValidation} from "./validation.js";

function $(id, selectAll = false) {
    return selectAll ? document.querySelectorAll(id) : document.querySelector(id);
}


const firstName = document.getElementById("firstName")
const lastName = document.getElementById("lastName")
const email = document.getElementById("email")
const password = document.getElementById("password")
const stepOne = $(".step-one")


stepOne.addEventListener("click", function (e) {
    e.preventDefault()

    if (!nameValidation(firstName.value, "first name")) return;
    if (!nameValidation(lastName.value, "last name")) return;
    if (!emailValidation(email.value)) return;
    if (!passwordValidation(password.value)) return;
})