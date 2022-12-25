function $(id, selectAll = false) {
    return selectAll ? document.querySelectorAll(id) : document.querySelector(id);
}

const eventsMenu = $(".events-menu")
const showEventsBtn = $(".event-btn")

showEventsBtn.addEventListener("click", function () {
    this.classList.toggle("event-btn-reshape")
    eventsMenu.classList.toggle("hidden")
    showEventsBtn.querySelector("img").classList.toggle("rotate")
})
