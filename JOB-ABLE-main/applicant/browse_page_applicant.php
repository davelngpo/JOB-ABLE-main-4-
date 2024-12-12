<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job-Able</title>
    <link rel="stylesheet" href="browse_page_applicant.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Mohave:ital,wght@0,300..700;1,300..700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Onest:wght@100..900&display=swap" rel="stylesheet">
</head>
<body>

<!-- Header -->
<?php include 'header-app.php' ?>

<br><br><br><br><br>

<!-- Main Content -->
<div class="main-content">
    
    <!-- Sidebar -->
    <aside>
    <div class="sidebar">
        <div class="search-bar">
            <!--<span class="search-icon">&#128269;</span>-->
            <input type="text" placeholder="Enter keyword/s">
        </div>
        <p>BROWSE BY...</p>
        <ul class="category-list">
            <li><input type="checkbox"> Arts (21)</li>
            <li><input type="checkbox"> Business (12)</li>
            <li><input type="checkbox"> Social (34)</li>
            <li><input type="checkbox"> Healthcare (14)</li>
            <li><input type="checkbox"> Technology (41)</li>
            <li><input type="checkbox"> Marketing (18)</li>
            <li><input type="checkbox"> Education (22)</li>
            <li><input type="checkbox"> Finance (20)</li>
            <li><input type="checkbox"> Food (39)</li>
            <li><input type="checkbox"> Hospitality (23)</li>
            <li><input type="checkbox"> Sales (9)</li>
            <li>More</li>
        </ul>
    </div>
    </aside>

    <!-- Recommendations Section -->
    <div class="recommendations">
        <h2>Recommended Jobs</h2>
        
        <div class="job-card">
            <div class="job-header">
                <span class="job-title">JOB POSTING 1#</span>
                <span class="company-name">Company Name</span>
            </div>
            <div class="job-description">Job Description... <a href="#">see more.</a></div>
            <div class="job-categories">
                <span class="job-category">Category 1</span>
                <span class="job-category">Category 2</span>
            </div>
        </div>

        <div class="job-card">
            <div class="job-header">
                <span class="job-title">JOB POSTING 2#</span>
                <span class="company-name">Company Name</span>
            </div>
            <div class="job-description">Job Description... <a href="#">see more.</a></div>
            <div class="job-categories">
                <span class="job-category">Category 1</span>
                <span class="job-category">Category 2</span>
            </div>
        </div>

        <div class="job-card">
            <div class="job-header">
                <span class="job-title">JOB POSTING 3#</span>
                <span class="company-name">Company Name</span>
            </div>
            <div class="job-description">Job Description... <a href="#">see more.</a></div>
            <div class="job-categories">
                <span class="job-category">Category 1</span>
                <span class="job-category">Category 2</span>
            </div>
        </div>
    </div>

</div>

</body>
</html>
