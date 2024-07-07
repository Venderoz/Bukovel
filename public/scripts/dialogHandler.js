const dialog = document.querySelector("dialog");
const closeDialogBtn = document.querySelector(".close-dialog-btn");

closeDialogBtn.addEventListener("click", () => {
    dialog.close();
    dialog.style.display = "none";
});