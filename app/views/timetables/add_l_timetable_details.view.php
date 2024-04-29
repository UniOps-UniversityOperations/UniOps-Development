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

            <!-- <div id="tabs-content"> -->


                <!------------------------------------ Lecture Tab ----------------------------------------->
                <!-- <div class="tab-content active tab-content-2" id="lecture-div"> -->

                    <!-- Lecture Tab Sidebar -->
                    <!-- <div class="side">
                        <ul class="list1">
                            <li><a id="side-link-one" class="side-link">Details</a></li>
                            <li><a id="side-link-two" class="side-link">Courses</a></li>
                            <li><a id="side-link-three" class="side-link">Lecturers</a></li>
                            <li><a id="side-link-four" class="side-link">Instructors</a></li>
                            <li><a id="side-link-five" class="side-link">Timeslots</a></li>
                        </ul>
                        <div class="divider-side"></div>
                    </div> -->
                    
                    <!--------------- Lecture tab Details, Courses, Day timetable container ------------->
                    <div class="form-content">
                        
                        <!--------------------------- Lecture Tab Details Form ------------------------->
                        <!-- <div class="side-link-content"> -->
                            <div class="form-title">
                                <h2>Timetable Details</h2>
                                <h3>Added Date : <?=date("j M, Y")?></h3>
                            </div>
                            <form action="<?=URLROOT?>/timetable/addTimetableDetails" method="post" id="form4">
                                <div class="form-inputs">
                                    <div class="form-left">
                                        <div class="labels">
                                            <label for="academic_year">Academic Year</label>
                                            <label for="degree_name">Stream</label>
                                            <label for="year">Year</label>
                                            <label for="semester">Semester</label>
                                            <!-- <label for="num_of_students">Number of students</label> -->
                                        </div>
                                        <div class="input-field">

                                                <select name="academic_year_id" id="academic_year" class="add-data">
                                                    <option hidden value="<?=$data['current_academic_year']?>" selected=""><?=$data['current_academic_year']?></option>
                                                    <?php if(!empty($academic_years)): ?>
                                                        <?php foreach($academic_years as $ay): ?>
                                                            <option <?=set_select('academic_year_id',$ay->id,)?> value="<?=$ay->academic_year?>"><?=esc($ay->academic_year) ?></option>
                                                        <?php endforeach; ?>
                                                    <?php endif; ?>
                                                </select>

                                                <select name="degree_name_id" id="degree_name" class="add-data">
                                                    <option hidden value="" selected="">Stream</option>
                                                    <option value="CS">CS</option>
                                                    <option value="IS">IS</option>
                                                </select>
                                                

                                                <select name="year_id" id="year" class="add-data">
                                                    <option hidden value="" selected="">Year</option>
                                                    <option value="1">1st year</option>
                                                    <option value="2">2nd year</option>
                                                    <option value="3">3rd year</option>
                                                    <option value="4">4th year</option>
                                                </select>
                                                

                                                <select name="semester_id" id="semester" class="add-data">
                                                    <option hidden value="" selected="">Semester</option>
                                                    <option value="1">1st semester</option>
                                                    <option value="2">2nd semester</option>
                                                </select>
                                                
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
                            
                        <!-- </div> -->

                    </div>
                <!-- </div> -->

            <!-- </div> -->

        </div>

    </div>

<!-- </div> -->


<!-- footer -->
<?php $this->view('timetables/includes/footer.view', $data); ?>
