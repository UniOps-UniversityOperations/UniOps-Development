/**
 * ************ Password visibility toggle button ***************
 */

// const password = document.getElementById('password');
// const eye_icon = document.getElementById('eye_icon');

// eye_icon.onclick = function(e) {

//     if(password.type == "password") {
//         password.type = "text";
//         eye_icon.src = "assets/icons/eye_open_icon.svg";
//     } else {
//         password.type = "password";
//         eye_icon.src = "assets/icons/eye_closed_icon.svg";
//     }
// }

/* ----------------------------------------------------------- */


/**
 * ************ Side Panel ***************
 */

// const btn = document.querySelector(".side-panel-toggle-btn");
const slots = document.querySelectorAll('.div9');


// btn.addEventListener('click', (e) => {
//     const root = document.querySelector('.root');
//     root.classList.toggle('side-panel-open');

//     if(root.classList.contains('side-panel-open')) {
//         document.querySelector('.main').style.width = 'calc(100vw - 550px)'
//     }
//     else {
//         document.querySelector('.main').style.width = 'calc(100vw - 200px)'
//     }
// });


// const root = document.querySelector(".side-panel-container");

// if (window.innerWidth > 1200) {
//   if (!root.classList.contains("side-panel-open")) {
//     root.classList.add("side-panel-open");
//     document.querySelector(".content").style.width = "calc(100vw - 550px)";
//     root.style.alignItems = "flex-start";
//     document.querySelector(".content").style.alignSelf = "flex-start";

//     const viewBtn = document.querySelector(".view-btn");

//     viewBtn.addEventListener("click", (e) => {

//       window.location.href =
//         "http://localhost/UniOps/public/timetable/viewTimetable/" + row.id;
//     });
//   } else if (root.classList.contains("side-panel-open")) {
//     root.classList.remove("side-panel-open");
//     document.querySelector(".content").style.width = "100vw";
//   }
// }

// if (window.innerWidth < 1200) {
//   if (root.classList.contains("side-panel-open")) {
//     root.classList.remove("side-panel-open");
//     document.querySelector(".content").style.width = "100vw";
//   }
// }



// function viewTimetable(row) {

//     console.log('hi');

//     const id = row.id;
//     const academicYear = row.querySelector(".first-column").textContent;
//     const degreeName = row.querySelector(".second-column").textContent;
//     const year = row.querySelector(".third-column").textContent;
//     const semester = row.querySelector(".fourth-column").textContent;

//     var request = new XMLHttpRequest();
//     request.open(
//       "POST",
//       "http://localhost/UniOps/public/timetable/viewTimetable",
//       true
//     );
//     request.setRequestHeader(
//       "Content-Type",
//       "application/x-www-form-urlencoded"
//     );

//     request.onreadystatechange = function () {
//       if (request.readyState === 4 && request.status === 200) {
//         const response = JSON.parse(request.responseText);

//         window.location.href = response.redirectUrl;
//       }
//     };

//     const data = [];

//     data.push({key: 'id', value: id});
//     data.push({key: 'academic_year', value: academicYear});
//     data.push({key: 'degree_name', value: degreeName});
//     data.push({key: 'year', value: year});
//     data.push({key: 'semester', value: semester});

//     request.send("timetableDetails=" + JSON.stringify(data));
    
// }



function viewTimetable(row) {
      var form = document.createElement("form");
      form.setAttribute("method", "POST");
      form.setAttribute("action", "viewTimetable");
      // Create an input element for the action parameter
      var timetable_id = document.createElement("input");
      timetable_id.setAttribute("type", "hidden");
      timetable_id.setAttribute("name", "id");
      timetable_id.setAttribute("value", row.id);

    //   var academic_year = document.createElement("input");
    //   academic_year.setAttribute("type", "hidden");
    //   academic_year.setAttribute("name", "academic_year");
    //   academic_year.setAttribute(
    //     "value",
    //     row.querySelector(".first-column").textContent
    //   );


      form.appendChild(timetable_id);
    //   form.appendChild(academic_year);

      document.body.appendChild(form);
      form.submit();
}




// slots.forEach((slot) => {
//     slot.addEventListener("click", (e) => {
//       const root = document.querySelector(".root");

//         if (window.innerWidth > 1350) {
//             if (!root.classList.contains("side-panel-open")) {
//                 root.classList.add("side-panel-open");
//                 document.querySelector(".main").style.width = "calc(100vw - 550px)";
//             const viewBtn = document.querySelector(".view-btn");

//             viewBtn.addEventListener("click", (e) => {
//             //   window.location.href = "timetable/view/" + row.id;
//             });
//             }
//         }
//     });
// });


window.addEventListener("resize", (e) => {
    const root = document.querySelector(".root");

    if(root.classList.contains("side-panel-open")) {
        
        if (window.innerWidth <= 1350) {
            
            if (root.classList.contains("side-panel-open")) {
            root.classList.remove("side-panel-open");
            document.querySelector(".main").style.width = "calc(100vw - 200px)";
            }
        } else {
            
            if (!root.classList.contains("side-panel-open")) {
            root.classList.add("side-panel-open");
            document.querySelector(".main").style.width = "calc(100vw - 550px)";
            }
        }
    }
});


/* ----------------------------------------------------------- */
