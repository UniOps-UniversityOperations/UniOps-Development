
import Course from './get_courses.js'


const conflictsDiv = document.querySelector(".conflicts-content");






/************************************************************************* */


function setCourse (courseCodeId, courseNameId, courseCodes, courseNames) {

    const course = new Course(courseCodes, courseNames);

    document.getElementById("course_code").onchange = function () {
      course.setCourseName(courseCodeId);
    };

    document.getElementById("course_name").onchange = function () {
      course.setCourseCode(courseNameId);
    };

}


// const semesterId = document.querySelector("#semester");

// semesterId.addEventListener('change', () => {
//     // console.log(semesterId.value);

//     var request = new XMLHttpRequest();
//     request.open(
//       "POST",
//       "http://localhost/URMS/public/admin/timetable/add/2",
//       true
//     );
//     request.setRequestHeader(
//       "Content-Type",
//       "application/x-www-form-urlencoded"
//     );
//     request.onreadystatechange = function () {
//       if (request.readyState === 4 && request.status === 200) {
//         const response = JSON.parse(request.responseText);
//         console.log(response);
//       }
//     };
//     request.send("semesterId=" + semesterId.value);
// })


