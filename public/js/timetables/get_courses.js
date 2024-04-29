
class Course {

    constructor(courseCodesArray, courseNamesArray) {
        this.courseCodes = courseCodesArray;
        this.courseNames = courseNamesArray;
    }

    setCourseName(courseCodeId) {

        const selectedElement = document.querySelector(courseCodeId).value;
        this.courseCodeValue = selectedElement;
        console(this.courseCodeValue);

    }

    setCourseCode(courseNameId) {

    }

}

export default Course
