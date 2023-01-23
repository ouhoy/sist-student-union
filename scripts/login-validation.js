function $(id, selectAll = false) {
    return selectAll ? document.querySelectorAll(id) : document.querySelector(id);
}

const userName = document.getElementById("username")
const password = document.getElementById("password")
const submitBtn = $("form button")


submitBtn.addEventListener("click", function (e) {
    e.preventDefault()
    if (!userName.value) {
        console.log("Please enter a valid Username")
    }
    if (!password.value) {
        console.log("Please enter a Password!")
    }

    console.table({password: password.value, username: userName.value})
})