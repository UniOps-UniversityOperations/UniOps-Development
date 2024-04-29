<!-------------------------- Academic Tab Semester 1 Form ---------------------------->
<div class="side-link-content">
    <div class="form-tab-content active">
        <div class="form-title-courses">
            <h2>Semester 1</h2>
            <h3>Added Date : 04/12/2023</h3>
        </div>

        
        <form action="<?=ROOT?>/admin/timetables/add" method="post">
            
            <div class="form-inputs-courses">

                <!--------- Semester Inputs ------->
                <div class="form-first">
                    <div class="form-first-title">
                        <h3>Semester</h3>
                        <div class="form-line"></div>
                    </div>
                    <div class="course">
                        <div class="course-code-name">
                            <div class="input-fields">
                                <label for="sem_start_date">Semester Start Date</label>
                                <input type="date">
                            </div>
                            <div class="input-fields">
                                <label for="sem_end_date">Semester End Date</label>
                                <input type="date">
                            </div>
                            <div class="input-fields">
                                <label for="students">Semester Weeks</label>
                                <input name="students" type="text" id="students">
                            </div>
                        </div>
                        <div class="course-add">

                        </div>
                    </div>
                
                </div>
                
                <!-------------------- Academic and vacation inputs -------------->
                <div class="form-bottom">
                    <!--  Academics -->
                    <div class="form-lecturers">
                        <div class="form-lecturers-title">
                            <div>
                                <h3>Academics</h3>
                                <button class="new">Add</button>
                            </div>
                            <div class="form-line"></div>
                        </div>
                        <div class="course-code-name">
                            <div class="input-fields">
                                <label for="lecturer_code">Duration</label>
                                <input type="date">
                            </div>
                            <div class="input-fields">
                                <label for="lecturer_name">Number of Weeks</label>
                                <input type="text">
                            </div>
                            <div class="input-fields">
                                <label for="instructor_code">Year</label>
                                <select for="lecturer_code">
                                    <option value="">1st year</option>
                                    <option value="">1st year</option>
                                    <option value="">1st year</option>
                                    <option value="">1st year</option>
                                    <option value="">All</option>
                                </select>
                            </div>
                            <div class="input-fields">
                                <label for="lecturer_name">Purpose</label>
                                <input type="text">
                            </div>
                            <div class="delete-lecturer">
                                <i></i>
                                <i></i>
                            </div>
                        </div>

                        <div class="label input2">
                            <div class="delete-lecturer">
                                <i></i>
                                <i></i>
                            </div>
                        </div>
                    </div>


                    <!-- Vacation -->
                    <div class="form-instructors">
                        <div class="form-instructors-title">
                            <h3>Vacation</h3>
                            <div class="form-line"></div>
                        </div>
                        <div class="course-code-name">
                            <div class="input-fields">
                                <label for="instructor_code">Duration</label>
                                <input type="date">
                            </div>
                            <div class="input-fields">
                                <label for="instructor_name">Number of Weeks</label>
                                <input type="text">
                            </div>
                            <div class="delete-instructor">
                                <i></i>
                                <i></i>
                            </div>
                            <button>Delete</button>
                        </div>
                    
                    </div>

                    <!-- Study Leave -->
                    <div class="form-instructors">
                        <div class="form-instructors-title">
                            <h3>Study Leave</h3>
                            <div class="form-line"></div>
                        </div>
                        <div class="course-code-name">
                            <div class="input-fields">
                                <label for="instructor_code">Duration</label>
                                <input type="date">
                            </div>
                            <div class="input-fields">
                                <label for="instructor_name">Number of Weeks</label>
                                <input type="text">
                            </div>
                            <div class="delete-instructor">
                                <i></i>
                                <i></i>
                            </div>
                            <button>Delete</button>
                        </div>
                    
                    </div>
                </div>
            </div>
            
            <div class="submit-inputs">
                <button type="submit" class="fill-inside-color save_content2">Save</button>
                <a class="outline-inside-color" href="<?=ROOT?>/admin/timetables">
                    <button class="cancel" type="button">Cancel</button>
                </a>
            </div>
        </form>
    </div>
</div>



<!-------------------------- Academic Tab Semester 2 Form ---------------------------->
<div class="side-link-content">
    <div class="form-tab-content active">
        <div class="form-title-courses">
            <h2>Semester 2</h2>
            <h3>Added Date : 04/12/2023</h3>
        </div>

        
        <form action="<?=ROOT?>/admin/timetables/add" method="post">
            
            <div class="form-inputs-courses">

                <!--------- Semester Inputs ------->
                <div class="form-first">
                    <div class="form-first-title">
                        <h3>Semester</h3>
                        <div class="form-line"></div>
                    </div>
                    <div class="course">
                        <div class="course-code-name">
                            <div class="input-fields">
                                <label for="sem_start_date">Semester Start Date</label>
                                <input type="date">
                            </div>
                            <div class="input-fields">
                                <label for="sem_end_date">Semester End Date</label>
                                <input type="date">
                            </div>
                            <div class="input-fields">
                                <label for="students">Semester Weeks</label>
                                <input name="students" type="text" id="students">
                            </div>
                        </div>
                        <div class="course-add">

                        </div>
                    </div>
                
                </div>
                
                <!-------------------- Academic and vacation inputs -------------->
                <div class="form-bottom">
                    <!--  Academics -->
                    <div class="form-lecturers">
                        <div class="form-lecturers-title">
                            <div>
                                <h3>Academics</h3>
                                <button class="new">Add</button>
                            </div>
                            <div class="form-line"></div>
                        </div>
                        <div class="course-code-name">
                            <div class="input-fields">
                                <label for="lecturer_code">Duration</label>
                                <input type="date">
                            </div>
                            <div class="input-fields">
                                <label for="lecturer_name">Number of Weeks</label>
                                <input type="text">
                            </div>
                            <div class="input-fields">
                                <label for="instructor_code">Year</label>
                                <select for="lecturer_code">
                                    <option value="">1st year</option>
                                    <option value="">1st year</option>
                                    <option value="">1st year</option>
                                    <option value="">1st year</option>
                                    <option value="">All</option>
                                </select>
                            </div>
                            <div class="input-fields">
                                <label for="lecturer_name">Purpose</label>
                                <input type="text">
                            </div>
                            <div class="delete-lecturer">
                                <i></i>
                                <i></i>
                            </div>
                        </div>

                        <div class="label input2">
                            <div class="delete-lecturer">
                                <i></i>
                                <i></i>
                            </div>
                        </div>
                    </div>


                    <!-- Vacation -->
                    <div class="form-instructors">
                        <div class="form-instructors-title">
                            <h3>Vacation</h3>
                            <div class="form-line"></div>
                        </div>
                        <div class="course-code-name">
                            <div class="input-fields">
                                <label for="instructor_code">Duration</label>
                                <input type="date">
                            </div>
                            <div class="input-fields">
                                <label for="instructor_name">Number of Weeks</label>
                                <input type="text">
                            </div>
                            <div class="delete-instructor">
                                <i></i>
                                <i></i>
                            </div>
                            <button>Delete</button>
                        </div>
                    
                    </div>

                    <!-- Study Leave -->
                    <div class="form-instructors">
                        <div class="form-instructors-title">
                            <h3>Study Leave</h3>
                            <div class="form-line"></div>
                        </div>
                        <div class="course-code-name">
                            <div class="input-fields">
                                <label for="instructor_code">Duration</label>
                                <input type="date">
                            </div>
                            <div class="input-fields">
                                <label for="instructor_name">Number of Weeks</label>
                                <input type="text">
                            </div>
                            <div class="delete-instructor">
                                <i></i>
                                <i></i>
                            </div>
                            <button>Delete</button>
                        </div>
                    
                    </div>
                </div>
            </div>
            
            <div class="submit-inputs">
                <button type="submit" class="fill-inside-color save_content2">Save</button>
                <a class="outline-inside-color" href="<?=ROOT?>/admin/timetables">
                    <button class="cancel" type="button">Cancel</button>
                </a>
            </div>
        </form>
    </div>
</div>
