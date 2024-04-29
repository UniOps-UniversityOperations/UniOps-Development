/*
******************* Add timetables *****************
*/







// ************************ Add courses ****************************




/*
************************* View timetables **************************
*/


const tabs1 = document.querySelectorAll(".tab");
const all_content1 = document.querySelectorAll(".tab-content");

tabs1.forEach((tab, index) => {
    tab.addEventListener("click", (e) => {
        tabs1.forEach((tab) => {
            tab.classList.remove("active");
        });
        tab.classList.add("active");

        var tab_focus = document.querySelector(".tab-focus");
        tab_focus.style.width = e.target.offsetWidth + "px";
        tab_focus.style.left = e.target.offsetLeft + "px";

        all_content1.forEach((content) => {
            content.classList.remove("active");
        });
        all_content1[index].classList.add("active");
    });
});



const tabs2 = document.querySelectorAll(".tab2");
const all_content2 = document.querySelectorAll(".tab-content2");

tabs2.forEach((tab, index) => {
    tab.addEventListener("click", (e) => {
        tabs2.forEach((tab) => {
            tab.classList.remove("active");
        });
        tab.classList.add("active");

        all_content2.forEach((content) => {
            content.classList.remove("active");
        });
        all_content2[index].classList.add("active");
    });
});


const tabs3 = document.querySelectorAll(".tab3");
const all_content3 = document.querySelectorAll(".tab-content3");

tabs3.forEach((tab, index) => {
    tab.addEventListener("click", (e) => {
        tabs3.forEach((tab) => {
            tab.classList.remove("active");
        });
        tab.classList.add("active");

        var tab_focus = document.querySelector(".tab-focus");
        tab_focus.style.width = e.target.offsetWidth + "px";
        tab_focus.style.left = e.target.offsetLeft + "px";

        all_content3.forEach((content) => {
            content.classList.remove("active");
        });
        all_content3[index].classList.add("active");
    });
});


// -------------------------------------------------------------


