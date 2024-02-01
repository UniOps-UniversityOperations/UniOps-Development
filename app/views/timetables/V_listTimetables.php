<head>
    <link rel="stylesheet" href="/public/css/lists.css">
</head>

<div class="header-name">
    <h1>Timetables</h1>
    <div class="btn-div">
            <button class="btn">Add timetable</button>
    </div>
</div>

<div class="search">
    <form class="filters">
        <label for="type">Type</label>
        <select name="type">
            <option value="exam">Exam</option>
            <option value="lecture">Lecture</option>
        </select>
        <label for="degree">Degree</label>
        <select name="degree">
            <option value="CS">CS</option>
            <option value="IS">IS</option>
        </select>
        <label for="year">Year</label>
        <select name="year">
            <option value="first-year">First Year</option>
            <option value="second-year">Second Year</option>
            <option value="third-year">Third Year</option>
            <option value="fourth-year">Fourth Year</option>
        </select>
        <label for="semester">Semester</label>
        <select name="semester">
            <option value="first-semester">First Semester</option>
            <option value="second-semester">Second Semester</option>
        </select>
        <label for="academic-year">Academic Year</label>
        <select name="academic-year">
            <option value="year-1">2020/2021</option>
            <option value="year-2">2021/2022</option>
        </select>
        <div class="search-btn">
            <input type="submit">
        </div>
    </form>
</div>

<div class="list-div">
    <ul class="heading-row">
        <li>Academic Year</li>
        <li>Type</li>
        <li>Degree</li>
        <li>Year</li>
        <li>Semester</li>
        <li>Last Updated</li>
    </ul>
</div>
