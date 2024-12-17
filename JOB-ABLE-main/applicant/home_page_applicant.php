<?php
    include '../dbconnect.php';

    $jobposting = "SELECT *, GROUP_CONCAT(jc.category_name SEPARATOR ', ') AS categories FROM jobposting jp join companies c ON jp.company_id = c.company_id join job_categories jc on jc.jobposting_id = jp.jobposting_id GROUP BY jp.jobposting_id DESC limit 3";

    $category = "SELECT category_name FROM `job_categories` LIMIT 4";
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Job-Able</title>
<link rel="stylesheet" href="styles.css">
<link rel="stylesheet" href="applyjob.css">
<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Mohave:ital,wght@0,300..700;1,300..700" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Onest:wght@100..900&display=swap" rel="stylesheet">
<style>
    a{
        text-decoration: none;
    }
</style>

</head>
<body>
<?php include 'logout-app.php' ?>
<?php include 'header-app.php' ?>

<br><br><br><br><br>

<!-- Search Section -->
<div class="search-section" id="search-selection">
    <div class="search-bar">
        <span class="search-icon">&#128269;</span>
        <input type="text" placeholder="Enter keyword/s">
    </div>
    <p>or search through Categories...</p>
    
    <div class="categories">
    <?php $r = $connect->query($category); 
    while($categories = $r->fetch_assoc()){ ?>
        <a href="browse_page_applicant.php?category=<?php echo urlencode($categories['category_name']); ?>">
            <div class="category">
                <div class="category-icon"></div>
                <span class="name"><?php echo $categories['category_name']; ?></span>
            </div>
        </a>
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
        <a href="job-posting-view-app.php?id=<?php echo $jobpost['jobposting_id'] ?>"><div class="job-title"><?php echo $jobpost['posting_title'] ?></div></a>
        <div class="job-description">
            <?php
                $post_desc = $jobpost['posting_description'];
                $max_len = 170;
                echo strlen($post_desc) > $max_len? substr($post_desc, 0, $max_len) . "..." : $post_desc;
            ?>
            <a class="link" href="javascript:void(0);" onclick="showPopup('<?php echo $jobpost['company_name']; ?>', '<?php echo $jobpost['posting_title']; ?>')">see more</a>
        </div>
        <div class="job-categories">
            <?php foreach (explode(', ', $jobpost['categories']) as $category): ?>
                <span class="job-category"><?php echo htmlspecialchars($category); ?></span>
            <?php endforeach; ?>
        </div>
    </div>
    <?php } ?>
    <br>
</div>

<!-- Pop-up for Job Application -->
<div class="popup" id="apply-job-popup">
    <div class="overlay" onclick="closePopup()"></div>
    <div class="content">
        <h1 class="applicant-name" id="popup-header">You're applying for...</h1>
        <div class="message-container">
            <p>Provide a brief description of why you want to apply for this position:</p>
            <textarea id="application-reason" placeholder="Enter your reason here..." rows="5"></textarea>
        </div>
        <div class="actions">
            <button class="btn apply-btn" onclick="submitApplication()">Apply</button>
            <button class="btn cancel-btn" onclick="closePopup()">Cancel</button>
        </div>
    </div>
</div>
<script>
function showPopup(companyName, jobTitle) {
    document.getElementById('popup-header').innerText = `You're applying for ${jobTitle} at ${companyName}`;
    document.getElementById('apply-job-popup').classList.add('active');
}

function closePopup() {
    document.getElementById('apply-job-popup').classList.remove('active');
}

function submitApplication() {
    const reason = document.getElementById('application-reason').value.trim();
    if (!reason) {
        alert('Please provide a reason for your application.');
        return;
    }
    // Add logic to handle form submission
    alert('Application submitted successfully!');
    closePopup();
}
</script>

</body>
</html>
