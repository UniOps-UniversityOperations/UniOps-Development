<<<<<<< HEAD
let menuicn = document.querySelector(".menuicn");
=======
let menuicn = document.querySelector("#menuicn");
>>>>>>> dev
let nav = document.querySelector(".navcontainer");

menuicn.addEventListener("click", () => {
	nav.classList.toggle("navclose");
})