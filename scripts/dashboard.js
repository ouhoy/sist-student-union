import {$} from "./controller.js"

const userIcon = $(".user")
const avatarMenu = $(".avatar-menu")


userIcon.addEventListener("click", () => {
    avatarMenu.classList.toggle("hide")
})

document.body.addEventListener("click", (e) => {

    if (e.target.closest(".user") === userIcon) return;
    if (avatarMenu.classList.contains("hide")) return;
    avatarMenu.classList.toggle("hide")

})