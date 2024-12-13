<?php
    include '../dbconnect.php';

    $id = $_GET['id'];

    $jobposting = "SELECT *,
                GROUP_CONCAT(jc.category_name SEPARATOR ', ') AS categories
                FROM jobposting jp
                join companies c ON jp.company_id = c.company_id
                join job_categories jc on jc.jobposting_id = jp.jobposting_id
                WHERE jp.jobposting_id = $id
                GROUP BY jp.jobposting_id ";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Viewing Job Posting</title>

    <link rel="stylesheet" href="job-posting-app.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Mohave:ital,wght@0,300..700;1,300..700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Onest:wght@100..900&display=swap" rel="stylesheet">
</head>
<body>
    <?php include 'logout-app.php' ?>
    <?php include 'header-app.php' ?>
    
    <br><br><br><br><br><br><br>

    <div class="body" style="padding: 20px 30px; margin-bottom: 20px;">
        <div class="job-posting" style="padding: 40px;">
        <?php $r = $connect->query($jobposting); 

        while($jobpost = $r -> fetch_assoc()){?>
            <div class="post-profile">
                <div class="com-profile">
                    <img class="com-profile-pic" src="../assets/company profile.png" alt="Company Profile">
                    <div>
                        <div><?php echo $jobpost['company_name'] ?></div> <div class="time"><?php echo $jobpost['date_posted'] ?></div>
                    </div>
                </div>
            </div>
            
            <br>

            <div class="post-contents">
                <div class="title"><?php echo $jobpost['posting_title'] ?></div>

                <pre style="font-size: 1.2em; font-family: 'Onest'; font-weight: 500; text-align: justify; text-wrap:pretty" class="content"><?php echo $jobpost['posting_description'] ?></pre>
            </div>

            <div class="job-categories">
                <?php foreach (explode(', ', $jobpost['categories']) as $category): ?>
                    <span class="job-category"><?php echo htmlspecialchars($category); ?></span>
                <?php endforeach; ?>
            </div>
            <?php } ?>
        </div>
</body>
</html>