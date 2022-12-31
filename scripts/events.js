function $(id, selectAll = false) {
    return selectAll ? document.querySelectorAll(id) : document.querySelector(id);
}

const eventController = $(".events-controller")

eventController.addEventListener("click", function (e) {
    if (e.target.closest("button")) {
        eventController.querySelectorAll("button").forEach(el => el.classList.toggle("secondary-btn"))
        $(".upcoming").classList.toggle("hide")
        $(".previous").classList.toggle("hide")
    }

})