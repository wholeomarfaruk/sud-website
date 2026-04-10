// Store original state on page load
const header = document.querySelector(".main-header");
const hasOverlayHeader = header && header.classList.contains("overlay-header");

window.addEventListener("resize", function () {
    const width = window.innerWidth;

    if (header) {
        if (width < 1024) {
            header.classList.remove("overlay-header");
        } else if (hasOverlayHeader) {
            header.classList.add("overlay-header");
        }
    }
});