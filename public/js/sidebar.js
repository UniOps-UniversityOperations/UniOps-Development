const sidebar = document.querySelector('.sidebar');
const main = document.querySelector('.main');
let nav = document.querySelector(".navcontainer");


function toggleSidebar() {
    sidebar.classList.toggle('sidebar-open');
    main.classList.toggle('content-shifted');
    nav.classList.toggle("navclose");
  }

const toggleButtons = document.querySelectorAll('.timeslot');

toggleButtons.forEach(toggleButton => {
    toggleButton.addEventListener('click', toggleSidebar);
  });

