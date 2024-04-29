<?php $this->view('includes/adminHeader', $data); ?>

<!-- header -->
<!-- <div class="main"> -->

    <div class="content-container">
            <div class="title">
                <h2><?=esc($data['row']->academic_year_row->academic_year ?? 'Unknown')?></h2>
                <h3>03, December 2023</h3>
            </div>
            <!-- Course, Lecturer, Academic, Exam, Room Tabs -->
            <div class="tabs-container3">
                <!-- <div class="tabs3">
                    <div class="tab3 active">Course</div>
                    <div class="tab3">Lecture</div>
                    <div class="tab3">Academic</div>
                    <div class="tab3">Exam</div>
                    <div class="tab3">Room</div>
                    <div class="tab-focus"></div>
                </div> -->
        
            <!-- Course, Lecturer, Academic, Exam, Room Content -->
            <!-- <div class="tab-content-container3"> -->
                <!-- <div class="tab-content3 active"> -->
                    <!-- Timetable, Details -->
                    <!-- <div class="tabs-container2"> -->
                        <!-- Timetable, Details Tabs -->
                        <!-- <div class="tabs2">
                            <div class="tab2 active">Timetable</div>
                            <div class="tab2">Details</div>
                        </div> -->
                        <!-- Timetable, Details Content -->
                        <!-- <div class="tab-content-container2"> -->
                            <!-- <div class="tab-content2 active"> -->
                                <form action="">
                                    <!-- <div class="select-search">
                                        <select name="degree_name" id="degree_name">
                                            <option hidden value="" selected="">Degree</option>
                                            <?php if(!empty($degree_names)): ?>
                                            <?php foreach($degree_names as $dn): ?>
                                                <option value="<?=$dn->id?>"><?=esc($dn->degree_name) ?></option>
                                            <?php endforeach; ?>
                                            <?php endif; ?>
                                        </select>
                                        <select name="year" id="year">
                                            <option hidden value="" selected="">Year</option>
                                            <?php if(!empty($years)): ?>
                                            <?php foreach($years as $yr): ?>
                                                <option value="<?=$yr->id?>"><?=esc($yr->year) ?></option>
                                            <?php endforeach; ?>
                                            <?php endif; ?>
                                        </select>
                                        <select name="semester" id="semester">
                                            <option hidden value="" selected="">Semester</option>
                                            <?php if(!empty($semesters)): ?>
                                                <?php foreach($semesters as $sem): ?>
                                                    <option value="<?=$sem->id?>"><?=esc($sem->semester) ?></option>
                                                <?php endforeach; ?>
                                            <?php endif; ?>
                                        </select>
                                        <button class="search-btn" type="submit">Search</button>
                                    </div> -->
                                </form>
                                <div class="timetable">
                                    <div class="header-row">
                                        <div>Time</div>
                                        <div>Monday</div>
                                        <div>Tuesday</div>
                                        <div>Wednesday</div>
                                        <div>Thursday</div>
                                        <div>Friday</div>
                                    </div>
                                    <div class="slots-rows">
                                        <div class="column-div">
                                            <div class="div1">8 am - 10 am</div>
                                            <div class="div1">10 am - 12 pm</div>
                                            <div class="div1">12 pm - 1 pm</div>
                                            <div class="div1">1 pm - 3 pm</div>
                                            <div class="div1">3 pm - 5 pm</div>
                                        </div>

                                        <?php
                                            $day_of_week = [
                                                'Monday',
                                                'Tuesday',
                                                'Wednesday',
                                                'Thursday',
                                                'Friday'
                                            ];

                                            $start_time = [
                                                '08:00:00',
                                                '10:00:00',
                                                '12:00:00',
                                                '13:00:00',
                                                '15:00:00'
                                            ];
                                        ?>

                                        <?php for($i = 0; $i < count($day_of_week); $i++) { ?>
                                            <div class="column-div">
                                            <?php for($j = 0; $j < count($start_time); $j++) { ?>
                                                <div day_of_week="<?=$day_of_week[$i]?>" 
                                                start_time="<?=$start_time[$j]?>" 
                                                id="<?=$day_of_week[$i].$start_time[$j]?>" 
                                                class="slot div9">
                                                    Add
                                                </div>
                                            <?php } ?>
                                            </div>
                                        <?php } ?>

                                    </div>
                                </div>
                                <div class="bottom-div">
                                    <div class="legend">
                                        
                                    </div>
                                    <!-- <div class="edit-delete">
                                        <a class="edit-link" href="<?=ROOT?>/admin/timetable/edit">
                                            <button class="edit" type="button">Edit</button>
                                        </a>
                                        <button type="submit" class="fill-inside-color">Delete</button>
                                    </div> -->
                                </div>
                            <!-- </div> -->
                        <!-- </div> -->
                    <!-- </div> -->
                <!-- </div> -->
            <!-- </div> -->
        </div>
    </div>

    <!-- <?php $this->view('includes/components/side_panel'); ?> -->


<!-- </div> -->


<!-- footer -->
<?php $this->view('timetables/includes/footer.view', $data); ?>
