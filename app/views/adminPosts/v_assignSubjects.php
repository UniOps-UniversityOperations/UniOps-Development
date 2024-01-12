<?php $style = "assignSubjects"; ?> 

<?php require APPROOT . '/views/includes/adminHeader.php'; ?>

<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

<div class="main">
    <div class="top">
            <h1 class="topic">Adminitsrator / Lecturer / Assign Subjects </h1>
            <h2 class="topic2">Lcturer Code: <?php echo $data['postsRS'][0]->lecturer_code; ?></h2>
    </div>        

    <div class="container">
        <div class="column">
            <!-- Content for the first column -->
            <h2 style='color: #010127'>Requeted Subjects by the lecturer</h2>

            <div class="title_bar">
                <p style="padding-left: 30px;" class="title_item"><b>Subject Code</b></p>
                <p class="title_item"><b>Year</b></p>
                <p class="title_item"><b>Stream</b></p>
            </div>

            <?php 
            $i = 1;
            foreach($data['postsRS'] as $post) : ?>
                <div class="lecture_room">
                    <div class="lecture_room_header">
                        <p class="row_num"><?php echo $i++; ?></p>
                        <p class="header_title"><?php echo $post->subject_code; ?></p>
                        <p class="header_title"><?php echo $post->sub_year; ?></p>
                        <p class="header_title"><?php echo $post->sub_stream; ?></p>
                    </div>
                </div>
            <?php endforeach; ?>

            <!-- horizontal line -->
            <hr class="hr">

            <h2 style='color: #010127'>Assign Subjects</h2>

            <div class="title_bar">
                <p style="padding-left: 30px;" class="title_item"><b>Subject Code</b></p>
                <p class="title_item"><b>Year</b></p>
                <p class="title_item"><b>Stream</b></p>
            </div>

            <?php 
            $i = 1;
            foreach($data['postsAS'] as $post) : ?>
                <div class="lecture_room">
                    <div class="lecture_room_header">
                        <p class="row_num"><?php echo $i++; ?></p>
                        <p class="header_title"><?php echo $post->subject_code; ?></p>
                        <p class="header_title"><?php echo $post->sub_year; ?></p>
                        <p class="header_title"><?php echo $post->sub_stream; ?></p>

                        <a href="<?php echo URLROOT; ?>/AdminPosts/deleteRowAS/<?php echo $data['postsRS'][0]->lecturer_code; ?>/<?php echo $post->subject_code; ?>" title="Delete">
                            <button class="delete_button">
                                <img src="<?php echo URLROOT;?>/images/delete_icon.svg" alt="Delete Icon" class="delete_icon">
                            </button>
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>

            <a href="" title="Add Row">
                <button class="add_button">
                    <img src="<?php echo URLROOT;?>/images/update_icon.svg" alt="Add Icon" class="add_icon">
                </button>
            </a>

        </div>

        <div class="column">
            <!-- Content for the second column -->
            <h2>Column 2</h2>
            <p>This is the content of the second column.</p>
        </div>
  </div>

    <div class="popup-form">


        <div class="filters">
            <label for="streamFilter">Stream:</label>
            <select id="streamFilter">
                <option value="">All</option>
                <option value="CS">CS</option>
                <option value="IS">IS</option>
                <?php foreach ($data['streams'] as $stream) : ?>
                    <option value="<?php echo $stream; ?>"><?php echo $stream; ?></option>
                <?php endforeach; ?>
            </select>

            <label for="yearFilter">Year:</label>
            <select id="yearFilter">
                <option value="">All</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <?php foreach ($data['years'] as $year) : ?>
                    <option value="<?php echo $year; ?>"><?php echo $year; ?></option>
                <?php endforeach; ?>
            </select>

            <label for="semesterFilter">Semester:</label>
            <select id="semesterFilter">
                <option value="">All</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <?php foreach ($data['semesters'] as $semester) : ?>
                    <option value="<?php echo $semester; ?>"><?php echo $semester; ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <table class="styled-table">
            <thead>
                <tr>
                    <th>Code</th>
                    <th>Name</th>
                    <th>Year</th>
                    <th>Semester</th>
                    <th>Credits</th>
                    <th>Stream</th>
                    <th></th>
                </tr>
            </thead>
            <!-- Code	Name	Year	Semester	Credits	Stream -->
            <tbody>        
                <?php $i = 0;
                foreach($data['subjects'] as $subject) : ?>
                    <tr>
                        <td><?php echo $subject->sub_code; ?></td>
                        <td><?php echo $subject->sub_name; ?></td>
                        <td><?php echo $subject->sub_year; ?></td>
                        <td><?php echo $subject->sub_semester; ?></td>
                        <td><?php echo $subject->sub_credits; ?></td>
                        <td><?php echo $subject->sub_stream; ?></td>
                        <td>
                        <!-- send 2 prameters (sub_code, lecturer_code) -->
                        <form action="<?php echo URLROOT;?>/AdminPosts/addToAssignSubjects/<?php echo $subject->sub_code; ?>/<?php echo $data['postsRS'][0]->lecturer_code; ?>" method="POST">
                            <input type="submit" value="SELECT">
                        </form> 

                        </td>
                    </tr>
                <?php endforeach; ?>
        </table> 
    <!-- submitbutton toa url -->
    <form action="">
        <input type="submit" value="CANCEL">
    </form>
    </div>

</div>

<script src="<?php echo URLROOT;?>/js/administrator/assignSubjects.js"></script>

<?php require APPROOT . '/views/includes/adminFooter.php'; ?>