<?php
    include '../dbconnect.php';
    include 'logout-com.php';

    $jobposting = "SELECT *, GROUP_CONCAT(jc.category_name SEPARATOR ', ') AS categories FROM jobposting jp join companies c ON jp.company_id = c.company_id join job_categories jc on jc.jobposting_id = jp.jobposting_id GROUP BY jp.jobposting_id limit 3";

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Job-Able</title>
<link rel="stylesheet" href="home.css"> <!-- pachange ako kung ano man ilagay nyo css name-->

<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Mohave:ital,wght@0,300..700;1,300..700" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Onest:wght@100..900&display=swap" rel="stylesheet">

</head>
<body>
    <?php include 'header-com.php' ?>


<br><br><br><br><br><br>
<div class="action-buttons-container">
    <div class="action-buttons">
        <button>Upload New Job Posting</button>
    </div>
</div>

<?php $r = $connect->query($jobposting); 

    while($jobpost = $r -> fetch_assoc()){?>

<div class="job-card">
    <div class="job-header">
        <div class="left-section">
            <div class="company-icon"></div>
            <div>
                <div class="job-title"><?php echo $jobpost['company_name'] ?></div>
                <div class="job-time"><?php echo $jobpost['date_posted'] ?></div>
            </div>
        </div>
        <button class="edit-button">Edit</button>
    </div>
    <div class="job-title">JOB POSTING 1#</div>
    <div class="job-description">Job Description... <a href="../JOBABLE posting view pages/job-posting-view-com.html">see more.</a></div>
    <div class="job-categories">
        <span class="job-category">Category 1</span>
        <span class="job-category">Category 2</span>
    </div>
</div>

<<<<<<< Updated upstream
<?php } ?>

<div class="job-card">
    <div class="job-header">
        <div class="left-section">
            <div class="company-icon"></div>
            <div>
                <div class="job-title">Company Name</div>
                <div class="job-time">2 hr</div>
            </div>
        </div>
        <button class="edit-button">Edit</button>
    </div>
    <div class="job-title">JOB POSTING 2#</div>
    <div class="job-description">Job Description... <a href="#">see more.</a></div>
    <div class="job-categories">
        <span class="job-category">Category 1</span>
        <span class="job-category">Category 2</span>
    </div>
</div>
=======
</body>
>>>>>>> Stashed changes
