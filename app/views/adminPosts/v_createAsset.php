<?php $style = "createAssets"; ?>

<?php require APPROOT . '/views/includes/adminHeader.php'; ?>

<h1>Create New Lecturer</h1>

<div class="content">
    <form action="<?php echo URLROOT;?>/adminPosts/createAsset/" method="post">

        <!-- input feilds -->

        <fieldset>
            <label class="lable" for="a_code">Asset Code:
            <input type="text" id="a_code" name="a_code" placeholder="a_code" value="<?php $data["a_code"];?>" required>
            </label>

            <label class="lable" for="a_type">Asset Type:
            <input type="text" id="a_type" name="a_type" placeholder="a_type" value="<?php $data["a_type"];?>" required>
            </label>

            <label class="lable" for="a_addedDate">Added Date:
            <input type="date" id="a_addedDate" name="a_addedDate" placeholder="a_addedDate" value="<?php $data["a_addedDate"];?>" required>
            </label>

        </fieldset>

        <!-- Checkeck boxes -->

        <fieldset>
            
            <label>
            <input type="checkbox" class="inline"  id="a_isInUse" name="a_isInUse" value="true">
            Is in use</label>

        </fieldset>

        <!-- Buttons -->
        <button type="submit" class="create_button">Create Lecturer</button>


    </form>
</div>



<!-- Footer Section -->
<?php require APPROOT . '/views/includes/adminFooter.php'; ?>


<!--
    the structure of the assets table

            a_id
            a_code
            a_type
            a_addedDate
            a_isInUse
            a_isDeleted

-->