const side_links = document.querySelectorAll(".side-link");
const all_side_link_content = document.querySelectorAll(".side-link-content");

side_links.forEach((side_link, index) => {
  side_link.addEventListener("click", (e) => {
    side_links.forEach((side_link) => {
      side_link.classList.remove("active");
    });
    side_link.classList.add("active");
    window.addEventListener("beforeunload", () => {
      const dataToSave = side_link ? side_link.id : null;
      sessionStorage.setItem("savedData", dataToSave);
    });

    all_side_link_content.forEach((content) => {
      content.classList.remove("active");
    });
    all_side_link_content[index].classList.add("active");
  });
});


const savedData = sessionStorage.getItem("savedData");

window.addEventListener("load", (e) => {
  if (savedData) {
    const tabLink = document.querySelector("#" + savedData);
    if (tabLink) {
      var links = document.querySelectorAll(".side-link");
      links.forEach((link) => {
        if (link.classList.contains("active")) {
          link.classList.remove("active");
        }
      });
      tabLink.classList.add("active");

      // Create and dispatch a click event
      const clickEvent = new MouseEvent("click", {
        bubbles: true,
        cancelable: true,
      });
      tabLink.dispatchEvent(clickEvent);
    }
    // console.log('Saved Data:', savedData);
  }
});

// const tabs = document.querySelectorAll(".tab-link");
// const tab_content = document.querySelectorAll(".tab-content");

// tabs.forEach((tab, index) => {
//     tab.addEventListener("click", (e) => {
//         tabs.forEach((tab) => {
//             tab.classList.remove("active");
//         });
//         tab.classList.add("active");

//         var tab_focus = document.querySelector(".short-line");
//         tab_focus.style.width = e.target.offsetWidth + "px";
//         tab_focus.style.left = e.target.offsetLeft + "px";

//         tab_content.forEach((content) => {
//             content.classList.remove("active");
//         });
//         tab_content[index].classList.add("active");

//         console.log(tab.id);
//         set_tab(tab);
//     });
// });
