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
                            <!-- <li><a id="side-link-two" class="side-link">Courses</a></li>
                            <li><a id="side-link-three" class="side-link">Lecturers</a></li>
                            <li><a id="side-link-four" class="side-link">Instructors</a></li>
                            <li><a id="side-link-five" class="side-link">Timeslots</a></li> -->
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
                            <form action="<?=URLROOT?>/timetable/saveTimeslot" method="post">
                                <div class="form-inputs">
                                    <div class="form-left">
                                        <div class="labels">
                                            <label class="lecture">Lecture Type</label>
                                            <label for="course_code">Course Code</label>
                                            <label for="num_of_students">Number of students</label>
                                        </div>
                                        <div class="input-field">

                                                
                                                    <select name="lecture_type" id="lecture_type">
                                                        <option value="" selected="" hidden>Lecture Type</option>
                                                        <option value="lecture">Lecture</option>
                                                        <option value="practical">Practical</option>
                                                        <option value="tutorial">Tutorial</option>
                                                    </select>
                                                    
                                                

                                                <select name="course_code" id="course_code" class="add-data">
                                                    <option hidden value="" selected="">Course Code</option>
                                                        <?php if(!empty($data['course_codes'])): ?>
                                                            <?php foreach($data['course_codes'] as $cc): ?>
                                                                <option value="<?=$cc->sub_code?>"><?=esc($cc->sub_code) ?></option>
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

                                                <input name="num_of_students" type="text" id="num_of_students" class="add-data">


                                                
                                                
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
                                    <button id="btn6" type="submit" class="fill-inside-color">Next</button>
                                    <a class="outline-inside-color" href="<?=URLROOT?>/timetable/addTimetableCourse">
                                        <button class="cancel" type="button">Cancel</button>
                                    </a>
                                </div>
                            </form>
                            
                        </div>

                    </div>
                </div>

            </div>

        </div>

    </div>

<!-- </div> -->


<!-- footer -->
<?php $this->view('timetables/includes/footer.view', $data); ?>
