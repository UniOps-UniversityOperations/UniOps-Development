<?php $style = "addUser"; ?>

<?php require APPROOT . '/views/includes/adminHeader.php'; ?>

<h1>Add New Administrator</h1>

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
left: 80%; 
transform: 
translate(50%, -25%); 
background-color: white; 
padding: 20px 20px 20px 20px;
border: 1px red solid; 
transition: top 0.5s ease;
box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);">
<!-- if popup = 1 Request Email Sent | if popup = 2 Status Email Sent -->
        <p>User ID already exists! </p>
    
</div>

<script>
    // Function to show the popup message
    function showPopup() {
        var popup = document.getElementById('popup');
        popup.style.display = 'block';

        // Hide the popup after 5 seconds
        setTimeout(function() {
            popup.style.display = 'none';
        }, 30000);
    }

    // Call the showPopup function when the page loads
    window.onload = showPopup;
</script>

<?php } ?>

<div class="content">
    <form action="<?php echo URLROOT;?>/adminPosts/addUser/" method="post">

        <!-- input feilds -->
        <fieldset>
            <label class="lable" for="user_id ">User ID:
            <input type="text" name="user_id" id="user_id" placeholder="user_id" value="<?php $data['user_id']; ?>" required>
            </label>

            <label class="lable" for="username">User Name:
            <input type="text" name="username" id="username" placeholder="username" value="<?php $data['username']; ?>" required>
            </label>

            <label class="lable" for="pwd">Password:
            <input type="pwd" name="pwd" id="pwd" placeholder="pwd" value="<?php $data['pwd']; ?>" required>
            </label>

            <b><label class="label" for="role">Role: Administator</label></b>
           
            
        </fieldset>
        <button type="submit" class="create_button">Add User</button>
    </form>
</div>



<!-- Footer Section -->
<?php require APPROOT . '/views/includes/adminFooter.php'; ?>



