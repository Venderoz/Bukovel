const body = document.querySelector("body");
const closeBtn = document.getElementById("close-btn");
const showBtn = document.getElementById("show-sidebar-btn");

closeBtn.addEventListener("click", () => {
    const sidebarEl = document.getElementById("sidebar-menu-container");
    
    body.style.overflowY = "visible";
    sidebarEl.classList.remove("sidebar-showing-animation");
    sidebarEl.classList.add("sidebar-hiding-animation");
    setTimeout(() => {sidebarEl.classList.remove("sidebar-enabled")}, 300);
});
showBtn.addEventListener("click", () => {
    const sidebarEl = document.getElementById("sidebar-menu-container");

    body.style.overflowY = "hidden";
    sidebarEl.classList.add("sidebar-showing-animation");
    sidebarEl.classList.remove("sidebar-hiding-animation");
    sidebarEl.classList.add("sidebar-enabled");
})