<?php $style = "assignSubjects"; ?> 

<?php require APPROOT . '/views/includes/adminHeader.php'; ?>

<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

<div class="main">
    <div class="top">
            <h1 class="topic">Adminitsrator / Lecturer / Assign Subjects </h1>
    </div>        

    <div class="container">
        <div class="column">
            <!-- Content for the first column -->
            <h2>Column 1</h2>
            <p>This is the content of the first column.</p>

            <?php 
            $i = 1;
            foreach($data['posts'] as $post) : ?>
                <div class="lecture_room">
                    <p class="row_num"><?php echo $i++; ?></p>
                    <h3><?php echo $post->lecturer_code; ?></h3>
                    <h3><?php echo $post->subject_code; ?></h3>
                </div>
            <?php endforeach; ?>

        </div>

        <div class="column">
            <!-- Content for the second column -->
            <h2>Column 2</h2>
            <p>This is the content of the second column.</p>
        </div>
  </div>

</div>

<?php require APPROOT . '/views/includes/adminFooter.php'; ?>