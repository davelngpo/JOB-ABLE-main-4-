<?php
    include '../dbconnect.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Applicant View</title>
    <link rel="stylesheet" href="Profile-Applicant-View.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Mohave:ital,wght@0,300..700;1,300..700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Onest:wght@100..900&display=swap" rel="stylesheet">
</head>
<body>
    <?php
        include 'logout-app.php';

        $user = $_SESSION['applicant_id'];
        
        $applicant = "SELECT
                        a.*
                        from applicants a
                        where a.applicant_id = $user
                        ";
        
        include 'header-app.php';
    ?>

    <br><br><br><br><br><br>
    
    <section class="applicant-section">
        <div class="profile-container">
            <!-- Left Column (Profile Section) -->
            <div class="top-column">
                <!-- Profile Section -->
                <div class="profile-header">
                    <div class="profile-picture">
                        <img src="applicant-photo.jpg" alt="Applicant Picture">
                    </div>
                     
                    <div class="applicant-details">
                        <div class="applicant">
                            <?php
                                $r = $connect->query($applicant);
                                while($app_details = $r -> fetch_assoc()){
                            ?>
                            <h1><?php echo $app_details['first_name'] ?> <?php echo $app_details['middle_name'] != NULL ? $app_details['middle_name'] : '' ?> <?php echo $app_details['last_name'] ?>  <span class="age-gender"> <?php echo $app_details['age'] ?> | <?php echo $app_details['gender'] ?></span></h1>
                            <?php } ?>
                        </div>
                        
                        <div class="button-container"> <!-- Button container for right alignment -->
                            <button class="edit-profile-bttn">Edit Profile</button>
                            <a href="logout.php"><button class="logout-bttn" onclick="alert('Are you sure?')">Logout</button></a>
                        </div>
                        <br>
                    
                    </div>
                </div>
            </div>

            <div class="bottom-column">
                <!-- Recently Applied Jobs Section -->
                <div class="recently-applied">
                    <h1>Recently Applied In...</h1>
                    <?php
                        $app_job = "SELECT
                                    a.*, 
                                    al.*, 
                                    j.*,
                                    c.*
                                    from applicants a 
                                    join applicant_list al on al.applicant_id = a.applicant_id 
                                    join jobposting j on j.jobposting_id = al.jobposting_id 
                                    join companies c on c.company_id = j.company_id
                                    where a.applicant_id = $user";

                        $r = $connect->query($app_job);
                        while($job_postings = $r -> fetch_assoc()){            
                    ?>
                    
                    <div class="job-listings">
                        <div class="job-posting">
                            <p><strong><?php echo $job_postings['posting_title'] ?></strong></p>
                            <p class="company-name"><?php echo $job_postings['company_name'] ?></p>
                        </div>
                    </div>
                    <?php } ?>
                    <!-- <div class="pagination">
                        <a href="#">1</a>
                        <a href="#">...</a>
                        <a href="#">3</a>
                    </div> -->
                </div>
                <!-- Sidebar Section -->
                <aside class="sidebar">
                    <div class="contact-info">
                        <h4>📞 Phone Number</h4>
                        <p>+63 912 345 6789</p>
                        <h4>📧 Email</h4>
                        <p>applicantemail@gmail.com</p>
                        <h4>🔗 LinkedIn</h4>
                        <p>linkedin.com/in/applicant</p>
                    </div>
                    <div class="personal-documents">
                        <h4>📂 Personal Documents</h4>
                        <p><a href="#">Resume.pdf</a></p>
                        <p><a href="#">Portfolio.pdf</a></p>
                    </div>
                </aside>
            </div>
        </div>
    </section>
    
    
</body>
</html>