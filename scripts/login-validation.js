import {emailValidation} from "./validation.js";
function $(id, selectAll = false) {
    return selectAll ? document.querySelectorAll(id) : document.querySelector(id);
}

const email = document.getElementById("email")
const password = document.getElementById("password")
const submitBtn = $("form button")


submitBtn.addEventListener("click", function (e) {
    e.preventDefault()
    if (!emailValidation(email.value)) {
        console.log(email.value)
        console.log("Please enter a valid email")

        return
    }
    if (!password.value) {
        console.log("Please enter a password!")
        password.value = ""
        return
    }

    console.table({password: password.value, username: email.value})
})