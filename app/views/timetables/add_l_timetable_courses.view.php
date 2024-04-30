<?php $this->view('includes/adminHeader', $data); ?>

<!-- header -->
<!-- <div class="main"> -->

    <div class="inputs">
            <div class="title">
                <h3><?=esc($data['timetable_name'] ?? '')?></h3>
                <h4>Added Date : <?=date("j M, Y")?></h4>
            </div>
                
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

                            $end_time = [
                                '10:00:00',
                                '12:00:00',
                                '13:00:00',
                                '15:00:00',
                                '17:00:00'
                            ];
                        ?>

                        <?php for($i = 0; $i < count($day_of_week); $i++) { ?>
                            <div class="column-div">
                            <?php for($j = 0; $j < count($start_time); $j++) { ?>
                                <div day_of_week="<?=$day_of_week[$i]?>" 
                                start_time="<?=$start_time[$j]?>" 
                                end_time="<?=$end_time[$j]?>"
                                id="<?=$day_of_week[$i].$start_time[$j]?>" 
                                class="slot div9">
                                    Add
                                </div>
                            <?php } ?>
                            </div>
                        <?php } ?>

                    </div>
                </div>
                            
    </div>


<!-- </div> -->


<!-- footer -->
<?php $this->view('timetables/includes/footer.view', $data); ?>
