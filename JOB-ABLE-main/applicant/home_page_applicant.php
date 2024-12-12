<?php
    include '../dbconnect.php';

    $jobposting = "SELECT *, GROUP_CONCAT(jc.category_name SEPARATOR ', ') AS categories FROM jobposting jp join companies c ON jp.company_id = c.company_id join job_categories jc on jc.jobposting_id = jp.jobposting_id GROUP BY jp.jobposting_id limit 3";

    $category = "SELECT category_name FROM `job_categories` LIMIT 4";
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Job-Able</title>
<link rel="stylesheet" href="styles.css">
<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Mohave:ital,wght@0,300..700;1,300..700" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Onest:wght@100..900&display=swap" rel="stylesheet">
</head>
<body>

<!-- Header -->
<?php include 'header-app.php' ?>

<br><br><br><br><br>

<!-- Search Section -->
<div class="search-section">
    <div class="search-bar">
        <span class="search-icon">&#128269;</span>
        <input type="text" placeholder="Enter keyword/s">
    </div>
    <p>or search through Categories...</p>
    
    <div class="categories">
        <?php $r = $connect->query($category); 
        while($categories = $r -> fetch_assoc()){?>
        <div class="category">
            <div class="category-icon"></div>
            <span class="name"><?php echo $categories['category_name'] ?></span>
        </div>
        <?php } ?>
    </div>
    
</div>



<!-- Recommendations Section -->
<div class="recommendations">
    <h2 class="head">Recommended <span class="small">based on skills inputted</span></h2>
    <?php $r = $connect->query($jobposting); 

    while($jobpost = $r -> fetch_assoc()){?>
    <div class="job-card">
        <div class="job-header">
            <div class="company-icon"></div>
            <div class="job-company"><?php echo $jobpost['company_name'] ?></div>
            <span style="color: rgba(9, 22, 78, 0.5);"><?php echo $jobpost['date_posted'] ?></span>
        </div>
        <div class="job-title"><?php echo $jobpost['posting_title'] ?></div>
        <div class="job-description">
            <?php
                $post_desc = $jobpost['posting_description'];
                $max_len = 170;
                echo strlen($post_desc) > $max_len? substr($post_desc, 0, $max_len) . "..." : $post_desc;
            ?>
            <a class="link" href="job-posting-view-app.php?id=<?php echo $jobpost['jobposting_id'] ?>">see more</a>
        </div>
        <div class="job-categories">
            <?php foreach (explode(', ', $jobpost['categories']) as $category): ?>
                <span class="job-category"><?php echo htmlspecialchars($category); ?></span>
            <?php endforeach; ?>
        </div>
    </div>
    <?php } ?>

</div>

</body>
</html>
