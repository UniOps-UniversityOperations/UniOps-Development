<!------------------------------------ Exam Tab -------------------------------------------->
                
<div class="tab-content tab-content-3" id="exam-div">

    <!-- Exam Tab Sidebar -->
    <div class="side">
        <ul class="list1">
            <li><a class="side-link active">Details</a></li>
            <li><a class="side-link">Courses</a></li>
            <li><ul class="list2">
                <li>Timetable</li>
                <li class="day"><a class="side-link">Monday</a></li>
                <li class="day"><a class="side-link">Tuesday</a></li>
                <li class="day"><a class="side-link">Wednesday</a></li>
                <li class="day"><a class="side-link">Thursday</a></li>
                <li class="day"><a class="side-link">Friday</a></li>
            </ul></li>
        </ul>
        <div class="divider-side"></div>
    </div>

    <!--------------- Lecture tab Details, Courses, Day timetable container ------------->
    <div class="form-content">
        
        <?php $this->view('layouts/timetables/add_lecture_details'); ?>
        <?php $this->view('layouts/timetables/add_lecture_courses'); ?>
        <?php $this->view('layouts/timetables/add_lecture_timeslots'); ?>
        
    </div>
</div>
