<?php $style = "createAssets"; ?>

<?php require APPROOT . '/views/includes/admin/adminHeader.php'; ?>

<!-- Body -->
    <div class="content">
        <h1>Update Subject Information</h1>

        <form action="<?php echo URLROOT;?>/AdminPosts/updateAsset/<?php echo $data["a_id"];?>" method="POST">

            <fieldset>

                <label class="lable" for="a_id">Asset ID:
                <input type="text" id="a_id" name="a_id" placeholder="a_id" value="<?php echo $data["a_id"];?>" required>
                </label>

                <label class="lable" for="a_code">Asset Code:
                <input type="text" id="a_code" name="a_code" placeholder="a_code" value="<?php echo $data["a_code"];?>" required>
                </label>

                <label class="lable" for="a_type">Asset Type:
                <input type="text" id="a_type" name="a_type" placeholder="a_type" value="<?php echo $data["a_type"];?>" required>
                </label>

                <label class="lable" for="a_addedDate">Asset Added Date:
                <input type="date" id="a_addedDate" name="a_addedDate" placeholder="a_addedDate" value="<?php echo $data["a_addedDate"];?>" required>
                </label>

            </fieldset>

            <fieldset>
                
                <label class="lable" for="a_isInUse">
                <input type="checkbox" class="inline" id="a_isInUse" name="a_isInUse" value="1" <?php echo $data["a_isInUse"] == 1 ? 'checked' : '';?>>
                Is In Use</label>

            </fieldset>

            <button type="submit" class="create_button" >UPDATE</button>
            
        </form>



    </div>


    <!-- Footer Section -->
<?php require APPROOT . '/views/includes/adminFooter.php'; ?>

<!-- the structure of the assets table

            a_id
            a_code
            a_type
            a_addedDate
            a_isInUse
            a_isDeleted
        -->