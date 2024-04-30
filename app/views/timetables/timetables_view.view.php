<!-- header -->
<?php $this->view('includes/adminHeader', $data); ?>

    <!-- <div class="main"> -->

        

            <div class="content-container">
                    <div class="title">
                        <!-- <div class="form-title">
                        <h2><?=$data['timetable_name']?></h2>
                        <h3>Added Date : <?=date("j M, Y")?></h3>
                        <h3>Day of Week : <?=$data['day_of_week']?></h3>
                        <h3>Timeslot : <?=$data['start_time'] . "-" . $data['end_time']?></h3> -->
                        
                    </div>
                    </div>
                    
                    
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
                                                        <div id="<?=$day_of_week[$i].$start_time[$j]?>" class="slot">
                                                        
                                                        <?php foreach ($data['rows'] as $item): ?>
                                                            <?php if($item->day_of_week == $day_of_week[$i]): ?>
                                                                <?php if($item->start_time == $start_time[$j]): ?>
                                                                    <!-- <div  data-modal-target="#pop-up"  onclick="viewTimeslot(this)" class="filled-slot"> -->
                                                                        <p><?php echo $item->sub_code ?></p>
                                                                        <p><?php echo $item->room_code ?></p>
                                                                    <!-- </div> -->

                                                                    <div class="pop-up" id="pop-up">
                                                                        <div class="pop-up-close">
                                                                            <button data-close-button class="pop-up-close-btn">&times;</button>
                                                                        </div>
                                                                        <div class="pop-up-links">
                                                                            <p><?php echo $item->sub_code ?></p>
                                                                            <p><?php echo $item->room_code ?></p>
                                                                            <p><?php echo $item->lecture_type ?></p>
                                                                        </div>
                                                                    </div>
                                                                    <div id="overlay"></div>
                                                                <?php endif; ?>
                                                            <?php endif; ?>
                                                        <?php endforeach; ?>

                                                        </div>
                                                    <?php } ?>
                                                    </div>
                                                <?php } ?>

                                            </div>
                                        </div>
                                        <div class="bottom-div">
                                            <div class="legend">
                                                
                                            </div>
                                            <div class="edit-delete">
                                                <button type="submit" class="fill-inside-color">Delete</button>
                                                <button id="edit-timetable"  class="edit-link edit" type="button">Edit</button>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>

            <!-- side panel -->
            <?php $this->view('timetables/includes/side_panel.view'); ?>
        </div>

        <!-- </div> -->

<!-- footer -->
<?php $this->view('timetables/includes/footer.view', $data); ?>

