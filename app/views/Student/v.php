<?php $style = "v"; ?> 

<?php require APPROOT . '/views/includes/studentHeader.php'; ?>

<div class="leftsection">

    <img src="<?php echo URLROOT;?>/images/default.jpeg" id="profilepicture">

    <div><h2><?php echo $data->s_fullName ?></h2></div>

    <div id="rank"><h3><?php echo $data->s_indexNumber ?></h3></div>

    
    <button class="updatebutton">Edit Details</button>

</div>

<div class="rightsection">
    <div class="title">
        <h2>User Details</h2>
    </div>

    <div class="content">

        <p>Full name</p>
        <div class="student_room" data-room-name="<?php echo $post->s_fullName; ?>">
        <h3 class="header_title">jhbvjdf</h3>
        </div>

        <p>Index Number</p>
        <div class="student_room" data-room-name="<?php echo $post->s_fullName; ?>">
        <h3 class="header_title">jhbvjdf</h3>
        </div>

        <p>E mail</p>
        <div class="student_room" data-room-name="<?php echo $post->s_fullName; ?>">
        <h3 class="header_title">jhbvjdf</h3>
        </div>

        <p>Registration Number</p>
        <div class="student_room" data-room-name="<?php echo $post->s_fullName; ?>">
        <h3 class="header_title">jhbvjdf</h3>
        </div>
        
    </div>
</div>
