<?php
    include '../dbconnect.php';
    include 'logout-app.php';

    $id = $_GET['id'];

    $user = $app_user;

    $jobposting = "SELECT *,
                GROUP_CONCAT(jc.category_name SEPARATOR ', ') AS categories
                FROM jobposting jp
                join companies c ON jp.company_id = c.company_id
                join job_categories jc on jc.jobposting_id = jp.jobposting_id
                join applicant_list al on al.jobposting_id = jp.jobposting_id
                WHERE jp.jobposting_id = $id
                GROUP BY jp.jobposting_id ";

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $applicant = $_POST['applicant_id'];
        $jobposting_id = $_POST['jobposting_id'];

        $stmt = $connect->prepare("INSERT INTO applicant_list (applicant_id, jobposting_id) VALUES (?, ?)");
        $stmt->bind_param("ii", $applicant, $jobposting_id);

        if ($stmt->execute()) {
            echo "New record created successfully!";
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    }
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
                
                <form method="post">
                    <input type="hidden" name="jobposting_id" value="<?php echo $id ?>">
                    <input type="hidden" name="applicant_id" value="<?php echo $user ?>">
                    <button class="apply" name="apply" type="submit">Apply for Job</button>
                </form>
                
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