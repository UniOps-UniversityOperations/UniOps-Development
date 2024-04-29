
<!-- ---------------- The list of timetables ------------------ -->

<!-- header -->
<?php $this->view('includes/adminHeader', $data); ?>

    <!-- <div class="main"> -->

    <!-- <div class="side-panel-container"> -->

        <div class="content">
            <div class="summary">
                <h1>Timetables</h1>
            </div>
            <div class="timetable-list">
                <div class="title">
                    <h2>Timetables</h2>
                    <!-- <button data-modal-target="#pop-up" class="save-btn">Add Timetables</button> -->
                    <a href="<?=URLROOT?>/timetable/addTimetableDetails">
                        <button class="save-btn">Add Timetable</button>
                    </a>
                </div>

                <!-- <div class="pop-up" id="pop-up">
                    <div class="pop-up-close">
                        <button data-close-button class="pop-up-close-btn">&times;</button>
                    </div>
                    <div class="pop-up-links">
                        <a class="tabs-links" href="<?=URLROOT?>/timetable/timetable/add/1"><button>Add Academic Calendar</button></a>
                        <a class="tabs-links" href="<?=URLROOT?>/timetable/timetable/add/2"><button>Add Lecture Timetable</button></a>
                        <a class="tabs-links" href="<?=URLROOT?>/timetable/timetable/add/3"><button>Add Exam Timetable</button></a>
                    </div>
                </div>
                <div id="overlay"></div> -->

                <div class="bar">
                    <div class="selected">

                    </div>
                    <div class="icons">
                        
                    </div>
                </div>
                <div class="list">
                    <table id="timetable-index">
                        <tr class="header-row">
                            <th class="first-column">Academic Year</th>
                            <th class="second-column">Degree</th>
                            <th class="third-column">Year</th>
                            <th class="fourth-column">Semester</th>
                        </tr>
                        <?php if(!empty($data['rows'])):?>
                            <?php foreach(($data['rows']) as $row):?>
                                <tr onclick="viewTimetable(this)" class="row" id="<?=esc($row->id)?>" type="button">
                                    <td class="first-column"><?=esc($row->academic_year?? '')?></td>
                                    <td class="second-column"><?=esc($row->degree_name ?? '')?></td>
                                    <td class="third-column"><?=esc($row->year ?? '')?></td>
                                    <td class="fourth-column"><?=esc($row->semester ?? '')?></td>
                                </tr>
                            <?php endforeach;?>
                        <?php else:?>
                            <tr><td class="no-records">No records found</td></tr>
                        <?php endif;?>
                    </table>
                </div>
            </div>
        </div>

        <!-- side panel -->
        <?php $this->view('timetables/includes/side_panel.view'); ?>
        
    <!-- </div> -->
    <!-- </div> -->

    

<!-- footer -->
<?php $this->view('timetables/includes/footer.view', $data); ?>
