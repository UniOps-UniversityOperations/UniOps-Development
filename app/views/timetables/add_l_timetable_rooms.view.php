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
            <form action="<?=URLROOT?>/timetable/saveRoom" method="post">
                <div class="form-inputs">
                    <div class="form-left">
                        <div class="labels">
                            <label for="room">Room</label>
                        </div>
                        <div class="input-field">
                                
                            <select name="room_code" id="room_code" class="add-data">
                                <option hidden value="" selected="">Room Code</option>
                                    <?php if(!empty($data['available_rooms'])): ?>
                                        <?php foreach($data['available_rooms'] as $rc): ?>
                                            <option value="<?=$rc->id?>"><?=esc($rc->id) ?></option>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                            </select>

                                
                        
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
                    <button id="btn8" type="submit" class="fill-inside-color">Save Timeslot</button>
                    <a class="outline-inside-color" href="<?=URLROOT?>/timetable/addTimeslot">
                        <button class="cancel" type="button">Cancel</button>
                    </a>
                </div>
            </form>
                            

        </div>

    </div>

<!-- </div> -->


<!-- footer -->
<?php $this->view('timetables/includes/footer.view', $data); ?>
