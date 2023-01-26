import {emailValidation} from "./validation.js";

function $(id, selectAll = false) {
    return selectAll ? document.querySelectorAll(id) : document.querySelector(id);
}

const email = $("#email")
const password = $("#password")
const submitBtn = $(".login-btn-main")
const secondBtn = $(".tertiary-btn")

submitBtn.addEventListener("click", function (e) {


    if (!emailValidation(email.value)) return;
    if (!password.value) {
        alert("Please enter a password!")
        password.value = ""
        return
    }

    console.table({password: password.value, username: email.value})
})
secondBtn.addEventListener("click", function (e){
    e.preventDefault()
    window.location.href = "./register.php";

})