<!--------------------------- Academic Tab Details Form ------------------------->
<div class="side-link-content details active">
    <div class="form-title">
        <h2>Calendar Details</h2>
        <h3>Added Date : <?=date("j M, Y")?></h3>
    </div>
    
    <div class="form-inputs">
        <div class="form-left">
            <div class="labels">
                <label for="academic_year">Academic Year</label>
                <label for="year_start">Year Start Date</label>
                <label for="year_end">Year End Date</label>
                <label for="num_of_weeks">Number of Weeks</label>
                <label for="issued_date">Issued Date</label>
            </div>
            <div class="input-field">

                    <input name="academic_year" type="text" id="academic_year">
                    <div class="error-div">
                        <?php if(!empty($errors['academic_year'])): ?>
                            <div class="error"><?=$errors['academic_year']?></div>
                        <?php endif; ?>
                    </div>

                    <input name="year_start" type="date" id="year_start">
                    <div class="error-div">
                        <?php if(!empty($errors['year_start'])): ?>
                            <div class="error"><?=$errors['year_start']?></div>
                        <?php endif; ?>
                    </div>

                    <input name="year_end" type="date" id="year_end">
                    <div class="error-div">
                        <?php if(!empty($errors['year_end'])): ?>
                            <div class="error"><?=$errors['year_id']?></div>
                        <?php endif; ?>
                    </div>

                    <input name="num_of_weeks" type="text" id="num_of_weeks">
                    <div class="error-div">
                        <?php if(!empty($errors['num_of_weeks'])): ?>
                            <div class="error"><?=$errors['num_of_weeks']?></div>
                        <?php endif; ?>
                    </div>

                    <input name="issued_date" type="date" id="issued_date">
                    <div class="error-div">
                        <?php if(!empty($errors['issued_date'])): ?>
                            <div class="error"><?=$errors['issued_date']?></div>
                        <?php endif; ?>
                    </div>
                </div>
        </div>
        <!-- <div class="divider"></div>
        <div class="form-right">
            <h3>Facilities</h3>
        </div> -->
    </div>
        
    <div class="submit-inputs">
        <button type="submit" class="fill-inside-color save-content">Save</button>
        <a class="outline-inside-color" href="<?=ROOT?>/admin/timetable">
            <button class="cancel" type="button">Cancel</button>
        </a>
    </div>
    
</div>
