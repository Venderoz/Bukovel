const offerTitleBoxes = document.querySelectorAll('#offer-title');
const offerBoxes = document.querySelectorAll('#skipass-offer-box');
const offerInfoBoxes = document.querySelectorAll("#offer-info-box");


document.addEventListener("click", (event) => {
    if (!event.target.closest("#skipass-offer-box")) {
        offerInfoBoxes.forEach(offerInfo => {
            offerInfo.classList.remove("expanding");
            setTimeout(() => {offerInfo.classList.remove("expanding-enabled")}, 300);
        });
    }
})

offerTitleBoxes[0].addEventListener("click", () => {
    offerInfoBoxes[0].classList.add("expanding-enabled");
    offerInfoBoxes[0].classList.add("expanding");
    offerInfoBoxes[1].classList.remove("expanding");
    offerInfoBoxes[2].classList.remove("expanding");
    offerInfoBoxes[3].classList.remove("expanding");
    offerInfoBoxes[1].classList.remove("expanding-enabled");
    offerInfoBoxes[2].classList.remove("expanding-enabled");
    offerInfoBoxes[3].classList.remove("expanding-enabled");
})
offerTitleBoxes[1].addEventListener("click", () => {
    offerInfoBoxes[0].classList.remove("expanding");
    offerInfoBoxes[1].classList.add("expanding");
    offerInfoBoxes[1].classList.add("expanding-enabled");
    offerInfoBoxes[2].classList.remove("expanding");
    offerInfoBoxes[3].classList.remove("expanding");
    offerInfoBoxes[0].classList.remove("expanding-enabled")
    offerInfoBoxes[2].classList.remove("expanding-enabled")
    offerInfoBoxes[3].classList.remove("expanding-enabled")
})
offerTitleBoxes[2].addEventListener("click", () => {
    offerInfoBoxes[0].classList.remove("expanding");
    offerInfoBoxes[1].classList.remove("expanding");
    offerInfoBoxes[2].classList.add("expanding");
    offerInfoBoxes[2].classList.add("expanding-enabled");
    offerInfoBoxes[3].classList.remove("expanding");
    offerInfoBoxes[0].classList.remove("expanding-enabled")
    offerInfoBoxes[1].classList.remove("expanding-enabled")
    offerInfoBoxes[3].classList.remove("expanding-enabled")
})
offerTitleBoxes[3].addEventListener("click", () => {
    offerInfoBoxes[0].classList.remove("expanding");
    offerInfoBoxes[1].classList.remove("expanding");
    offerInfoBoxes[2].classList.remove("expanding");
    offerInfoBoxes[3].classList.add("expanding");
    offerInfoBoxes[3].classList.add("expanding-enabled");
    offerInfoBoxes[0].classList.remove("expanding-enabled")
    offerInfoBoxes[1].classList.remove("expanding-enabled")
    offerInfoBoxes[2].classList.remove("expanding-enabled")
})