const openPopupBtns = document.querySelectorAll('[data-modal-target]');
const closePopupBtns = document.querySelectorAll('[data-close-button]');
const overlay = document.getElementById('overlay');


openPopupBtns.forEach(button => {
    button.addEventListener('click', () => {
        const popup = document.querySelector(button.dataset.modalTarget);
        openPopup(popup);
    })
})

overlay.addEventListener('click', () => {
    const popups = document.querySelectorAll('.pop-up.active');
    popups.forEach(popup => {
        closePopup(popup);
    })
})

closePopupBtns.forEach((button) => {
  button.addEventListener("click", () => {
    const popup = button.closest('.pop-up');
    closePopup(popup);
  });
});

function openPopup(popup) {
    if(popup == null) return;
    popup.classList.add('active');
    overlay.classList.add('active');
}

function closePopup(popup) {
    if(popup == null) return;
    popup.classList.remove('active');
    overlay.classList.remove('active');
}

