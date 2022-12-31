function $(id, selectAll = false) {
    return selectAll ? document.querySelectorAll(id) : document.querySelector(id);
}

const eventController = $(".events-controller")

eventController.addEventListener("click", function (e) {
    const selectedBtn = e.target.closest("button")
    if (selectedBtn && selectedBtn.classList.contains("secondary-btn")) {
        eventController.querySelectorAll("button").forEach(el => el.classList.toggle("secondary-btn"))
        $(".upcoming").classList.toggle("hide")
        $(".previous").classList.toggle("hide")
    }

})