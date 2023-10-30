<?php $style = "createInstructor"; ?>

<?php require APPROOT . '/views/includes/adminHeader.php'; ?>

<h1>Create New Instructor</h1>

<div class="content">
    <form action="<?php echo URLROOT;?>/adminPosts/createInstructor/" method="post">

        <!-- input feilds -->

        <fieldset>
            <label class="lable" for="i_name">Instructor Name:
            <input type="text" id="i_name" name="i_name" placeholder="i_name" value="<?php $data["i_name"];?>" required>
            </label>

            <label class="lable" for="i_email">Instructor Email:
            <input type="email" id="i_email" name="i_email" placeholder="i_email" value="<?php $data["i_email"];?>" required>
            </label>

            <label class="lable" for="i_sub1_code">Instructor Assigned Subject 1 Code:
            <input type="text" id="i_sub1_code" name="i_sub1_code" placeholder="i_sub1_code" value="<?php $data["i_sub1_code"];?>">
            </label>

            <label class="lable" for="i_sub2_code">Instructor Assigned Subject 2 Code:
            <input type="text" id="i_sub2_code" name="i_sub2_code" placeholder="i_sub2_code" value="<?php $data["i_sub2_code"];?>">
            </label>

            <label class="lable" for="i_sub3_code">Instructor Assigned Subject 3 Code:
            <input type="text" id="i_sub3_code" name="i_sub3_code" placeholder="i_sub3_code" value="<?php $data["i_sub3_code"];?>">
            </label>

            <label class="lable" for="i_exp1_code">Instructor Expertise Subject 1 Code:
            <input type="text" id="i_exp1_code" name="i_exp1_code" placeholder="i_exp1_code" value="<?php $data["i_exp1_code"];?>">
            </label>

            <label class="lable" for="i_exp2_code">Instructor Expertise Subject 2 Code:
            <input type="text" id="i_exp2_code" name="i_exp2_code" placeholder="i_exp2_code" value="<?php $data["i_exp2_code"];?>">
            </label>

            <label class="lable" for="i_exp3_code">Instructor Expertise Subject 3 Code:
            <input type="text" id="i_exp3_code" name="i_exp3_code" placeholder="i_exp3_code" value="<?php $data["i_exp3_code"];?>">
            </label>
        </fieldset>

        <button type="submit" class="create_button">Create Instructor</button>


    </form>
</div>



<!-- Footer Section -->
<?php require APPROOT . '/views/includes/adminFooter.php'; ?>