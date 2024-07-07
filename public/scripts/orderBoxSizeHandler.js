const offerTitleBoxes = document.querySelectorAll('#offer-title');
const offerInfoBoxes = document.querySelectorAll("#offer-info-box");


document.addEventListener("click", (event) => {
    if (!event.target.closest("#skipass-offer-box")) {
        offerInfoBoxes.forEach(offerInfo => {
            offerInfo.classList.remove("expanded");
            offerInfo.classList.add("shrinked");
        });
    }
})
offerTitleBoxes.forEach(title => {
    title.addEventListener("click", ()=>{
        title.nextElementSibling.classList.toggle("expanded");
        title.nextElementSibling.classList.toggle("shrinked");
    })
})