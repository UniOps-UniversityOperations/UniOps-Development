<?php $this->view('includes/adminHeader'); ?>

<!-- header -->
<!-- <div class="main"> -->

    <!-- <div class="contents"> -->

        <div class="inputs">

            <div class="title">
                <h1>Add Lecture Timetable</h1>
            </div>
                    
             <div class="form-content">
                        
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

                                    <select name="academic_year" id="academic_year" class="add-data">
                                        <option hidden value="<?=$data['current_academic_year']?>" selected=""><?=$data['current_academic_year'];?></option>
                                        <?php if(!empty($data['academic_years'])): ?>
                                            <?php foreach($data['academic_years'] as $ay): ?>
                                                <option <?=set_select('academic_year_id',$ay->id,)?> value="<?=$ay->academic_year?>"><?=esc($ay->academic_year) ?></option>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </select>

                                    <select name="stream" id="stream" class="add-data">
                                        <option hidden value="" selected="">Stream</option>
                                        <option value="CS">CS</option>
                                        <option value="IS">IS</option>
                                    </select>
                                    

                                    <select name="year" id="year" class="add-data">
                                        <option hidden value="" selected="">Year</option>
                                        <option value="1">1st year</option>
                                        <option value="2">2nd year</option>
                                        <option value="3">3rd year</option>
                                        <option value="4">4th year</option>
                                    </select>
                                    

                                    <select name="semester" id="semester" class="add-data">
                                        <option hidden value="" selected="">Semester</option>
                                        <option value="1">1st semester</option>
                                        <option value="2">2nd semester</option>
                                    </select>
                                    
                                </div>
                        </div>
                        <div class="form-right">
                            <?php if($data['timetable_error']):?>
                                <?php echo $data['timetable_error']?>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="submit-inputs">
                        <a class="outline-inside-color" href="<?=URLROOT?>/timetable/timetable">
                            <button class="cancel" type="button">Cancel</button>
                        </a>
                        <button id="btn4" type="submit" class="fill-inside-color">Next</button>
                        
                    </div>
                </form>
            </div>
        </div>

    <!-- </div> -->

<!-- </div> -->


<!-- footer -->
<?php $this->view('timetables/includes/footer.view', $data); ?>
