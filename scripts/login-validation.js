import {emailValidation} from "./validation.js";

function $(id, selectAll = false) {
    return selectAll ? document.querySelectorAll(id) : document.querySelector(id);
}

const email = $("#email")
const password = $("#password")
const submitBtn = $("form button")


submitBtn.addEventListener("click", function (e) {
    e.preventDefault()
    if (!emailValidation(email.value)) return;
    if (!password.value) {
        alert("Please enter a password!")
        password.value = ""
        return
    }

    console.table({password: password.value, username: email.value})
})