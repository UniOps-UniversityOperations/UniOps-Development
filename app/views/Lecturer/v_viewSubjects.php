<?php $style = "lecturecss/viewSubjects"; ?> 
<?php require APPROOT . '/views/includes/LecturerHeader.php'; ?>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<?php 

// Convert the associative array into a simple indexed array for JavaScript
$days = array_keys($data['numofLecHours']);
$totalHours = array_values($data['numofLecHours']);

?>

<script>
 let days = <?php echo json_encode($days); ?>;
 let totalHours = <?php echo json_encode($totalHours); ?>;
</script>

<div id="workload">
    <canvas id="Chart"></canvas>
</div>

<hr>

<div id="assigned">
    <h2>Assigned Subjects</h2>

    <?php if(is_string($data['assignedSubjects'])):?>

        <p>No subjects has still been assigned to you.</p>
        
    <?php else : ?> 
    
    <table class="styled-table">
        <thead>
            <tr>
                <th>Subject Code</th>
                <th>Subject Name</th>
                <th>CS/IS</th>
                <th>Year</th>
                <th>Semester</th>
                <th>Num of Credits</th>
            </tr>
        </thead>
        <tbody id="tbody">
            <?php foreach($data['assignedSubjects'] as $subject):?>
                
                <tr>
                    <td><?php echo $subject->subject_code; ?></td>
                    <td><?php echo $subject->sub_name; ?></td>
                    <td><?php echo $subject->sub_stream; ?></td>
                    <td><?php echo $subject->sub_year; ?></td>
                    <td><?php echo $subject->sub_semester; ?></td>
                    <td><?php echo $subject->sub_credits; ?></td>
                </tr>

            <?php endforeach; ?>
        </tbody>
    </table>
<?php //print_r($data); ?>

<?php endif; ?>
</div>

<hr>

<div id="preferred">
<h2>Requested Subjects</h2>

<?php if(is_string($data['PrefferedSubjects'])):?>

    <p>You have not yet set your preferrences.</p>
    
<?php else : ?> 

<table class="styled-table">
    <thead>
        <tr>
            <th>Subject Code</th>
            <th>Subject Name</th>
            <th>CS/IS</th>
            <th>Year</th>
            <th>Semester</th>
            <th>Num of Credits</th>
        </tr>
    </thead>
    <tbody id="tbody">
        <?php foreach($data['PrefferedSubjects'] as $subject):?>
            
            <tr>
                <td><?php echo $subject->subject_code; ?></td>
                <td><?php echo $subject->sub_name; ?></td>
                <td><?php echo $subject->sub_stream; ?></td>
                <td><?php echo $subject->sub_year; ?></td>
                <td><?php echo $subject->sub_semester; ?></td>
                <td><?php echo $subject->sub_credits; ?></td>
            </tr>

        <?php endforeach; ?>
    </tbody>
</table>

<?php endif; ?>

</div>

<div title="Add Row">
    <button class="add_button">
        <img src="<?php echo URLROOT;?>/images/plus_icon.svg" alt="Add Icon" class="add_icon">
    </button>
</div>

<div id="requestSubjects">
    <table id="subjects">
        <thead>
            <tr>
                <th>Code</th>
                <th>Name</th>
                <th>Year</th>
                <th>Semester</th>
                <th>Credits</th>
                <th>Stream</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($data['subjects'] as $subject): ?>
                <tr>
                    <td><?php echo $subject->sub_code; ?></td>
                    <td><?php echo $subject->sub_name; ?></td>
                    <td><?php echo $subject->sub_year; ?></td>
                    <td><?php echo $subject->sub_semester; ?></td>
                    <td><?php echo $subject->sub_credits; ?></td>
                    <td><?php echo $subject->sub_stream; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>


<script src="<?php echo URLROOT;?>/js/lecturerjs/viewSubjects.js"></script>

<?php require APPROOT . '/views/includes/LecturerFooter.php'; ?>
