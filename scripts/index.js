function $(id, selectAll = false) {
    return selectAll ? document.querySelectorAll(id) : document.querySelector(id);
}

const eventsMenu = $(".events-menu")
const showEventsBtn = $(".event-btn")
const events = $(".event", true)
// const articleBody = $(".article-body")
const articleTitle = $(".article-body-title")
const eventController = $(".events-controller")

const currentPage = window.location.href.split("/")[4]

window.onload = function () {
    if (currentPage !== "index.html") return
    const eventId = window.location.hash.split("-").at(-1)
    if (eventId !== "") {
        const linkedEvent = document.getElementById(eventId)
        return setEventsMenu(linkedEvent)

    }
    events[0].setAttribute("is-active", "")
}

showEventsBtn.addEventListener("click", function () {
    if (currentPage == "events.html") return
    this.classList.toggle("event-btn-reshape")
    eventsMenu.classList.toggle("hidden")
    showEventsBtn.querySelector("img").classList.toggle("rotate")
})


function setEventsMenu(target) {
    articleTitle.textContent = target.querySelector("h6").textContent

    const eventTitle = target.querySelector("h6").textContent.replaceAll(" ", "-").toLowerCase()
    window.location.hash = eventTitle + "-" + target.id;
    events.forEach(el => {
        if (el.hasAttribute("is-active")) el.removeAttribute("is-active")
    })
    target.setAttribute("is-active", "")
}

eventsMenu.addEventListener("click", function (e) {
    if (currentPage == "events.html") return
    const selectedEvent = e.target.closest(".event");
    if (!selectedEvent || selectedEvent.hasAttribute("is-active")) return;
    articleTitle.textContent = selectedEvent.querySelector("h6").textContent

    const eventTitle = selectedEvent.querySelector("h6").textContent.replaceAll(" ", "-").toLowerCase()
    window.location.hash = eventTitle + "-" + selectedEvent.id;
    events.forEach(el => {
        if (el.hasAttribute("is-active")) el.removeAttribute("is-active")
    })
    selectedEvent.setAttribute("is-active", "")
})

eventController.addEventListener("click", function (e) {
    if (currentPage !== "events.html") return
    if (e.target.closest("button")) {
        eventController.querySelectorAll("button").forEach(el => el.classList.toggle("secondary-btn"))


    }
})