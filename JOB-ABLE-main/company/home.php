<?php
    include '../dbconnect.php';
    include 'logout-com.php';

    $jobposting = "SELECT *, GROUP_CONCAT(jc.category_name SEPARATOR ', ') AS categories FROM jobposting jp join companies c ON jp.company_id = c.company_id join job_categories jc on jc.jobposting_id = jp.jobposting_id GROUP BY jp.jobposting_id DESC limit 3";

    $category = "SELECT category_name FROM `job_categories` LIMIT 4";
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
                <div class="job-company"><?php echo $jobpost['company_name'] ?></div>
                <div class="job-time"><?php echo $jobpost['date_posted'] ?></div>
            </div>
        </div>
    </div>
    <div class="job-title"><?php echo $jobpost['posting_title'] ?></div>
    <div class="job-description">
        <?php
            $post_desc = $jobpost['posting_description'];
            $max_len = 160;
            echo strlen($post_desc) > $max_len? substr($post_desc, 0, $max_len) . "..." : $post_desc;
        ?>
        <a href="../JOBABLE posting view pages/job-posting-view-com.html">see more.</a>
    </div>
    <div class="job-categories">
        <?php foreach (explode(', ', $jobpost['categories']) as $category): ?>
            <span class="job-category"><?php echo htmlspecialchars($category); ?></span>
        <?php endforeach; ?>
    </div>
</div>

<?php } ?>

</body>
