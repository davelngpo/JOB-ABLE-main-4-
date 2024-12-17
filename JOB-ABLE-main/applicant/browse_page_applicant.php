<?php 
include '../dbconnect.php';

$category = isset($_GET['category']) ? $_GET['category'] : '';
$jobsQuery = "SELECT *, GROUP_CONCAT(jc.category_name SEPARATOR ', ') AS categories 
              FROM jobposting jp 
              JOIN companies c ON jp.company_id = c.company_id 
              JOIN job_categories jc ON jc.jobposting_id = jp.jobposting_id 
              WHERE jc.category_name LIKE ? 
              GROUP BY jp.jobposting_id 
              ORDER BY jp.date_posted DESC";

$stmt = $connect->prepare($jobsQuery);
$param = "%$category%";
$stmt->bind_param('s', $param);
$stmt->execute();
$result = $stmt->get_result();
?>
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

<?php include 'logout-app.php' ?>
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
        </ul>
    </div>
    </aside>

     <!-- Display Recommended Jobs -->
<div class="recommendations">
    <h2>Recommended Jobs in "<?php echo htmlspecialchars($category); ?>"</h2>
    <?php while($job = $result->fetch_assoc()){ ?>
        <div class="job-card">
            <div class="job-header">
                <span class="job-title"><?php echo $job['posting_title']; ?></span>
                <span class="company-name"><?php echo $job['company_name']; ?></span>
            </div>
            <div class="job-description">
                <?php echo substr($job['posting_description'], 0, 170) . '...'; ?>
                <a href="job-posting-view-app.php?id=<?php echo $job['jobposting_id']; ?>">see more</a>
            </div>
            <div class="job-categories">
                <?php foreach (explode(', ', $job['categories']) as $cat): ?>
                    <span class="job-category"><?php echo htmlspecialchars($cat); ?></span>
                <?php endforeach; ?>
            </div>
        </div>
    <?php } ?>
</div>
</div>

</body>
</html>
