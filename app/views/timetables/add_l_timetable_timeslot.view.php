<?php $this->view('includes/adminHeader', $data); ?>

<!-- header -->
<!-- <div class="main"> -->

    <div class="contents">

        <div class="inputs">

            <div class="form-title">
                <h2><?=$data['timetable_name']?></h2>
                <h3>Added Date : <?=date("j M, Y")?></h3>
                <h3>Day of Week : <?=$data['day_of_week']?></h3>
                <h3>Timeslot : <?=$data['start_time'] . "-" . $data['end_time']?></h3>
            </div>
            <form class="fill-time-slot" action="<?=URLROOT?>/timetable/saveTimeslot" method="post">
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
                        
                    </div>
                </div>
                <div class="submit-inputs">
                    <a class="outline-inside-color" href="<?=URLROOT?>/timetable/addTimetableCourse">
                        <button class="cancel" type="button">Cancel</button>
                    </a>
                    <button id="btn6" type="submit" class="fill-inside-color">Next</button>
                    
                </div>
            </form>

        </div>

    </div>

<!-- </div> -->


<!-- footer -->
<?php $this->view('timetables/includes/footer.view', $data); ?>
