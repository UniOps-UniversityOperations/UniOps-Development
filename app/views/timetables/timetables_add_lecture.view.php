<?php $this->view('includes/adminHeader', $data); ?>

<!-- header -->
<!-- <div class="main"> -->

    <div class="contents">

        <div class="stick">
            <div class="title">
                <h2>Add Timetable</h2>
            </div>

            <!---------- Lecture, Academic, Exam tab links ------------->
            <div class="tabs">
                <div class="tab-links">
                    <!-- <button id="academic" class="tab-link">Academic</button> -->
                    <!-- <button id="lecture" class="tab-link">Lecture</button> -->
                    <!-- <button id="exam" class="tab-link">Exam</button> -->
                    <h3 class="timetable-name">Lecture Timetable</h3>
                    <!-- <div class="short-line"></div> -->
                    <h3><?=date("j M, Y")?></h3>
                </div>
                
                <div class="tabs-line"></div>
            </div>
            
        </div>


        <!--------------------- Lecture, Academic, Exam tab container ----------------->
        <div class="inputs">

            <div id="tabs-content">


                <!------------------------------------ Lecture Tab ----------------------------------------->
                <div class="tab-content active tab-content-2" id="lecture-div">

                    <!-- Lecture Tab Sidebar -->
                    <div class="side">
                        <ul class="list1">
                            <li><a id="side-link-one" class="side-link">Details</a></li>
                            <li><a id="side-link-two" class="side-link">Courses</a></li>
                            <li><a id="side-link-three" class="side-link">Lecturers</a></li>
                            <li><a id="side-link-four" class="side-link">Instructors</a></li>
                            <li><a id="side-link-five" class="side-link">Timeslots</a></li>
                        </ul>
                        <div class="divider-side"></div>
                    </div>
                    
                    <!--------------- Lecture tab Details, Courses, Day timetable container ------------->
                    <div class="form-content">
                        
                        <!--------------------------- Lecture Tab Details Form ------------------------->
                        <div class="side-link-content">
                            <div class="form-title">
                                <h2>Timetable Details</h2>
                                <!-- <h3>Added Date : <?=date("j M, Y")?></h3> -->
                            </div>
                            <form action="<?=URLROOT?>/timetable/addTimetableDetails" method="post" id="form4">
                                <div class="form-inputs">
                                    <div class="form-left">
                                        <div class="labels">
                                            <label for="academic_year">Academic Year</label>
                                            <label for="degree_name">Degree Name</label>
                                            <label for="year">Year</label>
                                            <label for="semester">Semester</label>
                                            <!-- <label for="num_of_students">Number of students</label> -->
                                        </div>
                                        <div class="input-field">

                                                <select name="academic_year_id" id="academic_year" class="add-data">
                                                    <option hidden value="<?=$data['current_academic_year_id']?>" selected=""><?=$data['current_academic_year']?></option>
                                                    <?php if(!empty($academic_years)): ?>
                                                        <?php foreach($academic_years as $ay): ?>
                                                            <option <?=set_select('academic_year_id',$ay->id,)?> value="<?=$ay->id?>"><?=esc($ay->academic_year) ?></option>
                                                        <?php endforeach; ?>
                                                    <?php endif; ?>
                                                </select>
                                                <!-- <div class="error-div"> -->
                                                    <?php //if(!empty($errors['academic_year_id'])): ?>
                                                        <!-- <div class="error">
                                                            <?php //echo $errors['academic_year_id']?>
                                                        </div> -->
                                                    <?php //endif; ?>
                                                <!-- </div> -->

                                                <select name="degree_name_id" id="degree_name" class="add-data">
                                                    <option hidden value="" selected="">Degree Name</option>
                                                    <?php if(!empty($degree_names)): ?>
                                                        <?php foreach($degree_names as $dn): ?>
                                                            <option <?=set_select('degree_name_id',$dn->id,)?> value="<?=$dn->id?>"><?=esc($dn->degree_name) ?></option>
                                                        <?php endforeach; ?>
                                                    <?php endif; ?>
                                                </select>
                                                

                                                <select name="year_id" id="year" class="add-data">
                                                    <option hidden value="" selected="">Year</option>
                                                    <?php if(!empty($years)): ?>
                                                        <?php foreach($years as $yr): ?>
                                                            <option <?=set_select('year_id',$yr->id,)?> value="<?=$yr->id?>"><?=esc($yr->student_year) ?></option>
                                                        <?php endforeach; ?>
                                                    <?php endif; ?>
                                                </select>
                                                

                                                <select name="semester_id" id="semester" class="add-data">
                                                    <option hidden value="" selected="">Semester</option>
                                                    <?php if(!empty($semesters)): ?>
                                                        <?php foreach($semesters as $sem): ?>
                                                            <option <?=set_select('semester_id',$sem->id,)?> value="<?=$sem->id?>"><?=esc($sem->semester) ?></option>
                                                        <?php endforeach; ?>
                                                    <?php endif; ?>
                                                </select>
                                                

                                                <!-- <input name="num_of_students" type="text" id="num_of_students" class="add-data"> -->
                                                
                                            </div>
                                    </div>
                                    <!-- <div class="divider"></div> -->
                                    <div class="form-right">
                                        <div class="conflicts-div">
                                            <div class="conflicts-content">
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="submit-inputs">
                                    <button id="btn4" type="submit" class="fill-inside-color">Next</button>
                                    <a class="outline-inside-color" href="<?=URLROOT?>/timetable/timetable">
                                        <button class="cancel" type="button">Cancel</button>
                                    </a>
                                </div>
                            </form>
                            
                        </div>

                        <!-------------------------- Lecture Tab Courses Form ---------------------------->
                        <div class="side-link-content">
                            <div class="form-title-courses">
                                <h2>Courses</h2>
                                <!-- <h3>Added Date : 04/12/2023</h3> -->
                            </div>
                            <div class="form-tab-content-courses active">
                                <div class="select-timetable">
                                    <label for="timetable">Select Timetable : </label>
                                    <select name="timetable_id" id="timetable">
                                        <option hidden value="" selected="">Timetable</option>
                                        <?php if(!empty($data['timetables'])): ?>
                                            <?php foreach($timetables as $tt): ?>
                                                <option <?=set_select('timetable_id',$tt->id,)?> value="<?=$tt->id?>"><?=esc($tt->id) ?></option>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </select>
                                </div>
                                <form action="" method="post" id="form5">
                                    <div class="form-lecturers">
                                        <div class="form-lecturers-title">
                                            <h3>Courses</h3>
                                            <!-- <div class="form-line"></div> -->
                                            <button onclick="addCard(event)" class="plus-btn">
                                                <img src="<?=URLROOT?>/images/plus_icon.svg" alt="">
                                            </button>
                                        </div>
                                        <div class="card-container">
                                            
                                        </div>
                                        <div class="amount-container">
                                            
                                        </div>
                                    </div>
                                    <div class="form-right">
                                        <div class="conflicts-div">
                                            <div class="conflicts-content">
                                                
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="submit-inputs">
                                <button id="btn5" type="button" class="fill-inside-color">Save</button>
                                <a class="outline-inside-color" href="<?=URLROOT?>/timetable/timetable">
                                    <button class="cancel" type="button">Cancel</button>
                                </a>
                            </div>
                        </div>

                        <!-------------------------- Lecture Tab Lecturers Form ---------------------------->

                        <div class="side-link-content">
                            <div class="form-title-courses">
                                <h2>Courses</h2>
                                <!-- <h3>Added Date : 04/12/2023</h3> -->
                            </div>
                            <div class="form-tab-content-courses active">
                                <form action="" method="post" id="form5">
                                    <div class="form-lecturers">
                                        <div class="form-lecturers-title">
                                            <h3>Courses</h3>
                                            <!-- <div class="form-line"></div> -->
                                            <button class="plus-btn">
                                                <img src="<?=ROOT?>/assets/icons/plus_icon.svg" alt="">
                                            </button>
                                        </div>
                                        <div class="inputs-container">
                                            <div class="inner-input-container">
                                                <div id="label" class="labels">
                                                    <label for="lecturer_code">Course Code</label>
                                                    <label for="lecturer_name">Course Name</label>
                                                </div>
                                                <div id="inputs" class="input-field">
                                                    <select name="course_code" id="course_code" class="add-data">
                                                        <option hidden value="" selected="">Course Code</option>
                                                            <?php if(!empty($course_codes)): ?>
                                                                <?php foreach($course_codes as $cc): ?>
                                                                    <option value="<?=$cc->id?>"><?=esc($cc->course_code) ?></option>
                                                                <?php endforeach; ?>
                                                            <?php endif; ?>
                                                    </select>
                                                    <select name="course_name" id="course_name" class="add-data">
                                                        <option hidden value="" selected="">Course Name</option>
                                                            <?php if(!empty($course_names)): ?>
                                                                <?php foreach($course_names as $cn): ?>
                                                                    <option value="<?=$cn->id?>"><?=esc($cn->course_name) ?></option>
                                                                <?php endforeach; ?>
                                                            <?php endif; ?>
                                                    </select>
                                                </div>
                                                <div class="delete-lecturer">
                                                    <button type="button">Delete</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="amount-container">
                                            Number of courses : 1
                                        </div>
                                    </div>
                                    <div class="form-right">
                                        <div class="conflicts-div">
                                            <div class="conflicts-content">
                                                
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="submit-inputs">
                                <button id="btn5" type="button" class="fill-inside-color">Save</button>
                                <a class="outline-inside-color" href="<?=ROOT?>/admin/timetable">
                                    <button class="cancel" type="button">Cancel</button>
                                </a>
                            </div>
                        </div>

                        <!-------------------------- Lecture Tab Instructors Form ---------------------------->

                        <div class="side-link-content">
                            <div class="form-title-courses">
                                <h2>Courses</h2>
                                <!-- <h3>Added Date : 04/12/2023</h3> -->
                            </div>
                            <div class="form-tab-content-courses active">
                                <form action="" method="post" id="form5">
                                    <div class="form-lecturers">
                                        <div class="form-lecturers-title">
                                            <h3>Courses</h3>
                                            <!-- <div class="form-line"></div> -->
                                            <button class="plus-btn">
                                                <img src="<?=ROOT?>/assets/icons/plus_icon.svg" alt="">
                                            </button>
                                        </div>
                                        <div class="inputs-container">
                                            <div class="inner-input-container">
                                                <div id="label" class="labels">
                                                    <label for="lecturer_code">Course Code</label>
                                                    <label for="lecturer_name">Course Name</label>
                                                </div>
                                                <div id="inputs" class="input-field">
                                                    <select name="course_code" id="course_code" class="add-data">
                                                        <option hidden value="" selected="">Course Code</option>
                                                            <?php if(!empty($course_codes)): ?>
                                                                <?php foreach($course_codes as $cc): ?>
                                                                    <option value="<?=$cc->id?>"><?=esc($cc->course_code) ?></option>
                                                                <?php endforeach; ?>
                                                            <?php endif; ?>
                                                    </select>
                                                    <select name="course_name" id="course_name" class="add-data">
                                                        <option hidden value="" selected="">Course Name</option>
                                                            <?php if(!empty($course_names)): ?>
                                                                <?php foreach($course_names as $cn): ?>
                                                                    <option value="<?=$cn->id?>"><?=esc($cn->course_name) ?></option>
                                                                <?php endforeach; ?>
                                                            <?php endif; ?>
                                                    </select>
                                                </div>
                                                <div class="delete-lecturer">
                                                    <button type="button">Delete</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="amount-container">
                                            Number of courses : 1
                                        </div>
                                    </div>
                                    <div class="form-right">
                                        <div class="conflicts-div">
                                            <div class="conflicts-content">
                                                
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="submit-inputs">
                                <button id="btn5" type="button" class="fill-inside-color">Save</button>
                                <a class="outline-inside-color" href="<?=URLROOT?>/timetable/timetable">
                                    <button class="cancel" type="button">Cancel</button>
                                </a>
                            </div>
                        </div>
                   
                        <!------------------------- Lecture Tab Timeslots Form ------------------->
                        <div class="side-link-content">
                            <div class="form-title-courses">
                                <h2>Timeslots</h2>
                                <button class="add-timeslots-btn">Add</button>
                                <!-- <h3>Added Date : 04/12/2023</h3> -->
                            </div>
                            
                                <div class="form-tab-content-day">
                                    <form action="" method="post">
                                        <div class="form-lecturers">
                                            <!-- <div class="day"> -->
                                                <div id="monday" class="day timeslot">
                                                    <h3>Monday</h3>
                                                    <p>Plus Button</p>
                                                </div>
                                                <div id="container1" class="timeslot-container">
                                                    <div class="timeslot">
                                                        <div class="timeslot-details">
                                                            <h4>8 am - 10 am</h4>
                                                            <p>Plus Button</p>
                                                        </div>
                                                        <div id="timeslot-inner" class="form-inputs-day">

                                                            <!-- Form Lecture Type Inputs -->
                                                            <div class="form-lecture-type">
                                                                <label class="lecture">Lecture Type</label>
                                                                <div class="lecture-type">
                                                                    <input type="radio" id="lecture" name="lecture-type" value="Lecture">
                                                                    <label for="lecture">Lecture</label>
                                                                    <input type="radio" id="practical" name="lecture-type" value="Practical">
                                                                    <label for="practical">Practical</label>
                                                                    <input type="radio" id="tutorial" name="lecture-type" value="Tutorial">
                                                                    <label for="tutorial">Tutorial</label>
                                                                </div>
                                                            </div>

                                                            <!-- Day Inputs -->
                                                            <div class="day-inputs">
                                                                <div class="first-set">
                                                                    <div class="labels-day">
                                                                        <label for="course_code">Course Code</label>
                                                                        <!-- <label for="num_of_groups">Number of Groups</label> -->
                                                                        <label for="group_number">Group Number</label>
                                                                        <label for="class_size">Class Size</label>
                                                                        <label for="">Room</label>
                                                                    </div>
                                                                    <div class="input-field">
                                                                        <select name="course_code" id="course_code">
                                                                            <option hidden value="" selected="">Course Code</option>
                                                                                <?php if(!empty($course_codes)): ?>
                                                                                    <?php foreach($course_codes as $cc): ?>
                                                                                        <option value="<?=$cc->id?>"><?=esc($cc->course_code) ?></option>
                                                                                    <?php endforeach; ?>
                                                                                <?php endif; ?>
                                                                        </select>
                                                                        <input type="text" id="group_number">
                                                                        <input type="text" id="class_size">
                                                                        <div class="select-btn">
                                                                            <select name="room" id="room">
                                                                                <option hidden value="" selected="">Room</option>
                                                                                    <?php //if(!empty($degree_names)): ?>
                                                                                        <?php //foreach($degree_names as $dn): ?>
                                                                                            <!-- <option value="<?//=$dn->id?>"><?//=esc($dn->degree_name) ?></option> -->
                                                                                        <?php //endforeach; ?>
                                                                                    <?php //endif; ?>
                                                                            </select>
                                                                            
                                                                            <button>Add</button>
                                                                        </div>
                                                                    </div>   
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="timeslot">
                                                        <div class="timeslot-details">
                                                            <h4>Timeslot</h4>
                                                            <p>Plus Button</p>
                                                        </div>
                                                    </div>
                                                    <div class="timeslot">
                                                        <div class="timeslot-details">
                                                            <h4>Timeslot</h4>
                                                            <p>Plus Button</p>
                                                        </div>
                                                    </div>
                                                    <div class="timeslot">
                                                        <div class="timeslot-details">
                                                            <h4>Timeslot</h4>
                                                            <p>Plus Button</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            <!-- </div> -->
                                            <!-- <div class="day"> -->
                                                <div id="tuesday" class="day timeslot">
                                                    <h3>Tuesday</h3>
                                                    <p>Plus Button</p>
                                                </div>
                                                <div id="container2" class="timeslot-container">
                                                    <div class="timeslot">
                                                        <div class="timeslot-details">
                                                            <h4>Timeslot</h4>
                                                            <p>Plus Button</p>
                                                        </div>
                                                        <div class="form-inputs-day">

                                                            <!-- Form Lecture Type Inputs -->
                                                            <div class="form-lecture-type">
                                                                <label class="lecture">Lecture Type</label>
                                                                <div class="lecture-type">
                                                                    <input type="radio" id="lecture" name="lecture-type" value="Lecture">
                                                                    <label for="lecture">Lecture</label>
                                                                    <input type="radio" id="practical" name="lecture-type" value="Practical">
                                                                    <label for="practical">Practical</label>
                                                                    <input type="radio" id="tutorial" name="lecture-type" value="Tutorial">
                                                                    <label for="tutorial">Tutorial</label>
                                                                </div>
                                                            </div>

                                                            <!-- Day Inputs -->
                                                            <div class="day-inputs">
                                                                <div class="first-set">
                                                                    <div class="labels-day">
                                                                        <label for="course_code">Course Code</label>
                                                                        <label for="lecturer_code">Lecturer Code</label>
                                                                        <label for="instructor_code">Instructor Code</label>
                                                                        <label for="">Venue</label>
                                                                        <label for="num_of_groups">Number of Groups</label>
                                                                        <label for="group_number">Group Number</label>
                                                                        <label for="class_size">Class Size</label>
                                                                    </div>
                                                                    <div class="input-field">
                                                                        <select name="course_code" id="course_code">
                                                                            <option hidden value="" selected="">Course Code</option>
                                                                                <?php if(!empty($degree_names)): ?>
                                                                                    <?php foreach($degree_names as $dn): ?>
                                                                                        <option value="<?=$dn->id?>"><?=esc($dn->degree_name) ?></option>
                                                                                    <?php endforeach; ?>
                                                                                <?php endif; ?>
                                                                        </select>
                                                                        <div class="select-btn">
                                                                            <select name="lecturer_code" id="lecturer_code">
                                                                                <option hidden value="" selected="">Course Code</option>
                                                                                    <?php if(!empty($degree_names)): ?>
                                                                                        <?php foreach($degree_names as $dn): ?>
                                                                                            <option value="<?=$dn->id?>"><?=esc($dn->degree_name) ?></option>
                                                                                        <?php endforeach; ?>
                                                                                    <?php endif; ?>
                                                                            </select>
                                                                            <button>Add</button>
                                                                        <div class="select-btn">
                                                                        </div>
                                                                            <select name="instructor_code" id="instructor_code">
                                                                                <option hidden value="" selected="">Course Code</option>
                                                                                    <?php if(!empty($degree_names)): ?>
                                                                                        <?php foreach($degree_names as $dn): ?>
                                                                                            <option value="<?=$dn->id?>"><?=esc($dn->degree_name) ?></option>
                                                                                        <?php endforeach; ?>
                                                                                    <?php endif; ?>
                                                                            </select>
                                                                            <button>Add</button>
                                                                        <div class="select-btn">
                                                                        </div>
                                                                            <select name="venue" id="venue">
                                                                                <option hidden value="" selected="">Course Code</option>
                                                                                    <?php if(!empty($degree_names)): ?>
                                                                                        <?php foreach($degree_names as $dn): ?>
                                                                                            <option value="<?=$dn->id?>"><?=esc($dn->degree_name) ?></option>
                                                                                        <?php endforeach; ?>
                                                                                    <?php endif; ?>
                                                                            </select>
                                                                            
                                                                            <button>Add</button>
                                                                        </div>
                                                                        <input type="text" id="num_of_groups">
                                                                        <select name="venue" id="group_number">
                                                                            <option hidden value="" selected="">Course Code</option>
                                                                                <?php if(!empty($degree_names)): ?>
                                                                                    <?php foreach($degree_names as $dn): ?>
                                                                                        <option value="<?=$dn->id?>"><?=esc($dn->degree_name) ?></option>
                                                                                    <?php endforeach; ?>
                                                                                <?php endif; ?>
                                                                        </select>
                                                                        <input type="text" id="class_size">
                                                                    </div>   
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="timeslot">
                                                        <div class="timeslot-details">
                                                            <h4>Timeslot</h4>
                                                            <p>Plus Button</p>
                                                        </div>
                                                    </div>
                                                    <div class="timeslot">
                                                        <div class="timeslot-details">
                                                            <h4>Timeslot</h4>
                                                            <p>Plus Button</p>
                                                        </div>
                                                    </div>
                                                    <div class="timeslot">
                                                        <div class="timeslot-details">
                                                            <h4>Timeslot</h4>
                                                            <p>Plus Button</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            <!-- </div> -->
                                            <!-- <div class="day"> -->
                                                <div id="wednesday" class="day timeslot">
                                                    <h3>Wednesday</h3>
                                                    <p>Plus Button</p>
                                                </div>
                                                <div id="container3" class="timeslot-container">
                                                    <div class="timeslot">
                                                        <div class="timeslot-details">
                                                            <h4>Timeslot</h4>
                                                            <p>Plus Button</p>
                                                        </div>
                                                        <div class="form-inputs-day">

                                                            <!-- Form Lecture Type Inputs -->
                                                            <div class="form-lecture-type">
                                                                <label class="lecture">Lecture Type</label>
                                                                <div class="lecture-type">
                                                                    <input type="radio" id="lecture" name="lecture-type" value="Lecture">
                                                                    <label for="lecture">Lecture</label>
                                                                    <input type="radio" id="practical" name="lecture-type" value="Practical">
                                                                    <label for="practical">Practical</label>
                                                                    <input type="radio" id="tutorial" name="lecture-type" value="Tutorial">
                                                                    <label for="tutorial">Tutorial</label>
                                                                </div>
                                                            </div>

                                                            <!-- Day Inputs -->
                                                            <div class="day-inputs">
                                                                <div class="first-set">
                                                                    <div class="labels-day">
                                                                        <label for="course_code">Course Code</label>
                                                                        <label for="lecturer_code">Lecturer Code</label>
                                                                        <label for="instructor_code">Instructor Code</label>
                                                                        <label for="">Venue</label>
                                                                        <label for="num_of_groups">Number of Groups</label>
                                                                        <label for="group_number">Group Number</label>
                                                                        <label for="class_size">Class Size</label>
                                                                    </div>
                                                                    <div class="input-field">
                                                                        <select name="course_code" id="course_code">
                                                                            <option hidden value="" selected="">Course Code</option>
                                                                                <?php if(!empty($degree_names)): ?>
                                                                                    <?php foreach($degree_names as $dn): ?>
                                                                                        <option value="<?=$dn->id?>"><?=esc($dn->degree_name) ?></option>
                                                                                    <?php endforeach; ?>
                                                                                <?php endif; ?>
                                                                        </select>
                                                                        <div class="select-btn">
                                                                            <select name="lecturer_code" id="lecturer_code">
                                                                                <option hidden value="" selected="">Course Code</option>
                                                                                    <?php if(!empty($degree_names)): ?>
                                                                                        <?php foreach($degree_names as $dn): ?>
                                                                                            <option value="<?=$dn->id?>"><?=esc($dn->degree_name) ?></option>
                                                                                        <?php endforeach; ?>
                                                                                    <?php endif; ?>
                                                                            </select>
                                                                            <button>Add</button>
                                                                        <div class="select-btn">
                                                                        </div>
                                                                            <select name="instructor_code" id="instructor_code">
                                                                                <option hidden value="" selected="">Course Code</option>
                                                                                    <?php if(!empty($degree_names)): ?>
                                                                                        <?php foreach($degree_names as $dn): ?>
                                                                                            <option value="<?=$dn->id?>"><?=esc($dn->degree_name) ?></option>
                                                                                        <?php endforeach; ?>
                                                                                    <?php endif; ?>
                                                                            </select>
                                                                            <button>Add</button>
                                                                        <div class="select-btn">
                                                                        </div>
                                                                            <select name="venue" id="venue">
                                                                                <option hidden value="" selected="">Course Code</option>
                                                                                    <?php if(!empty($degree_names)): ?>
                                                                                        <?php foreach($degree_names as $dn): ?>
                                                                                            <option value="<?=$dn->id?>"><?=esc($dn->degree_name) ?></option>
                                                                                        <?php endforeach; ?>
                                                                                    <?php endif; ?>
                                                                            </select>
                                                                            
                                                                            <button>Add</button>
                                                                        </div>
                                                                        <input type="text" id="num_of_groups">
                                                                        <select name="venue" id="group_number">
                                                                            <option hidden value="" selected="">Course Code</option>
                                                                                <?php if(!empty($degree_names)): ?>
                                                                                    <?php foreach($degree_names as $dn): ?>
                                                                                        <option value="<?=$dn->id?>"><?=esc($dn->degree_name) ?></option>
                                                                                    <?php endforeach; ?>
                                                                                <?php endif; ?>
                                                                        </select>
                                                                        <input type="text" id="class_size">
                                                                    </div>   
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="timeslot">
                                                        <div class="timeslot-details">
                                                            <h4>Timeslot</h4>
                                                            <p>Plus Button</p>
                                                        </div>
                                                    </div>
                                                    <div class="timeslot">
                                                        <div class="timeslot-details">
                                                            <h4>Timeslot</h4>
                                                            <p>Plus Button</p>
                                                        </div>
                                                    </div>
                                                    <div class="timeslot">
                                                        <div class="timeslot-details">
                                                            <h4>Timeslot</h4>
                                                            <p>Plus Button</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            <!-- </div> -->
                                            <!-- <div class="day"> -->
                                                <div id="thursday" class="day timeslot">
                                                    <h3>Thursday</h3>
                                                    <p>Plus Button</p>
                                                </div>
                                                <div id="container4" class="timeslot-container">
                                                    <div class="timeslot">
                                                        <div class="timeslot-details">
                                                            <h4>Timeslot</h4>
                                                            <p>Plus Button</p>
                                                        </div>
                                                        <div class="form-inputs-day">

                                                            <!-- Form Lecture Type Inputs -->
                                                            <div class="form-lecture-type">
                                                                <label class="lecture">Lecture Type</label>
                                                                <div class="lecture-type">
                                                                    <input type="radio" id="lecture" name="lecture-type" value="Lecture">
                                                                    <label for="lecture">Lecture</label>
                                                                    <input type="radio" id="practical" name="lecture-type" value="Practical">
                                                                    <label for="practical">Practical</label>
                                                                    <input type="radio" id="tutorial" name="lecture-type" value="Tutorial">
                                                                    <label for="tutorial">Tutorial</label>
                                                                </div>
                                                            </div>

                                                            <!-- Day Inputs -->
                                                            <div class="day-inputs">
                                                                <div class="first-set">
                                                                    <div class="labels-day">
                                                                        <label for="course_code">Course Code</label>
                                                                        <label for="lecturer_code">Lecturer Code</label>
                                                                        <label for="instructor_code">Instructor Code</label>
                                                                        <label for="">Venue</label>
                                                                        <label for="num_of_groups">Number of Groups</label>
                                                                        <label for="group_number">Group Number</label>
                                                                        <label for="class_size">Class Size</label>
                                                                    </div>
                                                                    <div class="input-field">
                                                                        <select name="course_code" id="course_code">
                                                                            <option hidden value="" selected="">Course Code</option>
                                                                                <?php if(!empty($degree_names)): ?>
                                                                                    <?php foreach($degree_names as $dn): ?>
                                                                                        <option value="<?=$dn->id?>"><?=esc($dn->degree_name) ?></option>
                                                                                    <?php endforeach; ?>
                                                                                <?php endif; ?>
                                                                        </select>
                                                                        <div class="select-btn">
                                                                            <select name="lecturer_code" id="lecturer_code">
                                                                                <option hidden value="" selected="">Course Code</option>
                                                                                    <?php if(!empty($degree_names)): ?>
                                                                                        <?php foreach($degree_names as $dn): ?>
                                                                                            <option value="<?=$dn->id?>"><?=esc($dn->degree_name) ?></option>
                                                                                        <?php endforeach; ?>
                                                                                    <?php endif; ?>
                                                                            </select>
                                                                            <button>Add</button>
                                                                        <div class="select-btn">
                                                                        </div>
                                                                            <select name="instructor_code" id="instructor_code">
                                                                                <option hidden value="" selected="">Course Code</option>
                                                                                    <?php if(!empty($degree_names)): ?>
                                                                                        <?php foreach($degree_names as $dn): ?>
                                                                                            <option value="<?=$dn->id?>"><?=esc($dn->degree_name) ?></option>
                                                                                        <?php endforeach; ?>
                                                                                    <?php endif; ?>
                                                                            </select>
                                                                            <button>Add</button>
                                                                        <div class="select-btn">
                                                                        </div>
                                                                            <select name="venue" id="venue">
                                                                                <option hidden value="" selected="">Course Code</option>
                                                                                    <?php if(!empty($degree_names)): ?>
                                                                                        <?php foreach($degree_names as $dn): ?>
                                                                                            <option value="<?=$dn->id?>"><?=esc($dn->degree_name) ?></option>
                                                                                        <?php endforeach; ?>
                                                                                    <?php endif; ?>
                                                                            </select>
                                                                            
                                                                            <button>Add</button>
                                                                        </div>
                                                                        <input type="text" id="num_of_groups">
                                                                        <select name="venue" id="group_number">
                                                                            <option hidden value="" selected="">Course Code</option>
                                                                                <?php if(!empty($degree_names)): ?>
                                                                                    <?php foreach($degree_names as $dn): ?>
                                                                                        <option value="<?=$dn->id?>"><?=esc($dn->degree_name) ?></option>
                                                                                    <?php endforeach; ?>
                                                                                <?php endif; ?>
                                                                        </select>
                                                                        <input type="text" id="class_size">
                                                                    </div>   
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="timeslot">
                                                        <div class="timeslot-details">
                                                            <h4>Timeslot</h4>
                                                            <p>Plus Button</p>
                                                        </div>
                                                    </div>
                                                    <div class="timeslot">
                                                        <div class="timeslot-details">
                                                            <h4>Timeslot</h4>
                                                            <p>Plus Button</p>
                                                        </div>
                                                    </div>
                                                    <div class="timeslot">
                                                        <div class="timeslot-details">
                                                            <h4>Timeslot</h4>
                                                            <p>Plus Button</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            <!-- </div> -->
                                            <!-- <div class="day"> -->
                                                <div id="friday" class="day timeslot">
                                                    <h3>Friday</h3>
                                                    <p>Plus Button</p>
                                                </div>
                                                <div id="container5" class="timeslot-container">
                                                    <div class="timeslot">
                                                        <div class="timeslot-details">
                                                            <h4>Timeslot</h4>
                                                            <p>Plus Button</p>
                                                        </div>
                                                        <div class="form-inputs-day">

                                                            <!-- Form Lecture Type Inputs -->
                                                            <div class="form-lecture-type">
                                                                <label class="lecture">Lecture Type</label>
                                                                <div class="lecture-type">
                                                                    <input type="radio" id="lecture" name="lecture-type" value="Lecture">
                                                                    <label for="lecture">Lecture</label>
                                                                    <input type="radio" id="practical" name="lecture-type" value="Practical">
                                                                    <label for="practical">Practical</label>
                                                                    <input type="radio" id="tutorial" name="lecture-type" value="Tutorial">
                                                                    <label for="tutorial">Tutorial</label>
                                                                </div>
                                                            </div>

                                                            <!-- Day Inputs -->
                                                            <div class="day-inputs">
                                                                <div class="first-set">
                                                                    <div class="labels-day">
                                                                        <label for="course_code">Course Code</label>
                                                                        <label for="lecturer_code">Lecturer Code</label>
                                                                        <label for="instructor_code">Instructor Code</label>
                                                                        <label for="">Venue</label>
                                                                        <label for="num_of_groups">Number of Groups</label>
                                                                        <label for="group_number">Group Number</label>
                                                                        <label for="class_size">Class Size</label>
                                                                    </div>
                                                                    <div class="input-field">
                                                                        <select name="course_code" id="course_code">
                                                                            <option hidden value="" selected="">Course Code</option>
                                                                                <?php if(!empty($degree_names)): ?>
                                                                                    <?php foreach($degree_names as $dn): ?>
                                                                                        <option value="<?=$dn->id?>"><?=esc($dn->degree_name) ?></option>
                                                                                    <?php endforeach; ?>
                                                                                <?php endif; ?>
                                                                        </select>
                                                                        <div class="select-btn">
                                                                            <select name="lecturer_code" id="lecturer_code">
                                                                                <option hidden value="" selected="">Course Code</option>
                                                                                    <?php if(!empty($degree_names)): ?>
                                                                                        <?php foreach($degree_names as $dn): ?>
                                                                                            <option value="<?=$dn->id?>"><?=esc($dn->degree_name) ?></option>
                                                                                        <?php endforeach; ?>
                                                                                    <?php endif; ?>
                                                                            </select>
                                                                            <button>Add</button>
                                                                        <div class="select-btn">
                                                                        </div>
                                                                            <select name="instructor_code" id="instructor_code">
                                                                                <option hidden value="" selected="">Course Code</option>
                                                                                    <?php if(!empty($degree_names)): ?>
                                                                                        <?php foreach($degree_names as $dn): ?>
                                                                                            <option value="<?=$dn->id?>"><?=esc($dn->degree_name) ?></option>
                                                                                        <?php endforeach; ?>
                                                                                    <?php endif; ?>
                                                                            </select>
                                                                            <button>Add</button>
                                                                        <div class="select-btn">
                                                                        </div>
                                                                            <select name="venue" id="venue">
                                                                                <option hidden value="" selected="">Course Code</option>
                                                                                    <?php if(!empty($degree_names)): ?>
                                                                                        <?php foreach($degree_names as $dn): ?>
                                                                                            <option value="<?=$dn->id?>"><?=esc($dn->degree_name) ?></option>
                                                                                        <?php endforeach; ?>
                                                                                    <?php endif; ?>
                                                                            </select>
                                                                            
                                                                            <button>Add</button>
                                                                        </div>
                                                                        <input type="text" id="num_of_groups">
                                                                        <select name="venue" id="group_number">
                                                                            <option hidden value="" selected="">Course Code</option>
                                                                                <?php if(!empty($degree_names)): ?>
                                                                                    <?php foreach($degree_names as $dn): ?>
                                                                                        <option value="<?=$dn->id?>"><?=esc($dn->degree_name) ?></option>
                                                                                    <?php endforeach; ?>
                                                                                <?php endif; ?>
                                                                        </select>
                                                                        <input type="text" id="class_size">
                                                                    </div>   
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="timeslot">
                                                        <div class="timeslot-details">
                                                            <h4>Timeslot</h4>
                                                            <p>Plus Button</p>
                                                        </div>
                                                    </div>
                                                    <div class="timeslot">
                                                        <div class="timeslot-details">
                                                            <h4>Timeslot</h4>
                                                            <p>Plus Button</p>
                                                        </div>
                                                    </div>
                                                    <div class="timeslot">
                                                        <div class="timeslot-details">
                                                            <h4>Timeslot</h4>
                                                            <p>Plus Button</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            <!-- </div> -->
                                        </div>
                                        <div class="form-right">
                                            <div class="conflicts-div">
                                                <div class="conflicts-content">
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    <div class="submit-inputs">
                                        <button id="btn5" type="button" class="fill-inside-color">Save</button>
                                        <a class="outline-inside-color" href="<?=ROOT?>/admin/timetable">
                                            <button class="cancel" type="button">Cancel</button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div> 
                    </div>
                </div>

                <!-- -------------------------------------Exam Tab --------------------------------------- -->

            </div>

        </div>

    </div>

<!-- </div> -->


<!-- footer -->
<?php $this->view('timetables/includes/footer.view', $data); ?>
