<?php $style = "createAssets"; ?>

<?php require APPROOT . '/views/includes/admin/adminHeader.php'; ?>

<?php if($data['popup']){ ?>

<div id="popup" 
    style="
    display: none; 
    position: fixed; 
    border-radius: 10px;
    font-size: 19px;
    font-weight: bold;
    color: red;
    top: 10%; 
    left: 78%; 
    transform: 
    translate(50%, -25%); 
    background-color: white; 
    padding: 20px 20px 20px 20px;
    border: 1px red solid; 
    transition: top 0.5s ease;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);">
    <!-- if popup = 1 Request Email Sent | if popup = 2 Status Email Sent -->
    <p>Asset ID already exists! </p>
    
</div>

<script>
    // Function to show the popup message
    function showPopup() {
        var popup = document.getElementById('popup');
        popup.style.display = 'block';

        // Hide the popup after 5 seconds
        setTimeout(function() {
            popup.style.display = 'none';
        }, 3000);
    }

    // Call the showPopup function when the page loads
    window.onload = showPopup;
</script>

<?php } ?>

<h1>Add New Asset</h1>

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