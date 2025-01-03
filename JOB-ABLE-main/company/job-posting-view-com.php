<?php
    include '../dbconnect.php';
    include 'logout-com.php';
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Viewing Job Posting</title>

    <link rel="stylesheet" href="job-posting.css">

    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Mohave:ital,wght@0,300..700;1,300..700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Onest:wght@100..900&display=swap" rel="stylesheet">
</head>
<body>

<?php include 'header-com.php' ?>
    <!-- <header>
        <div class="web-name">
            <img src="/JOB-ABLE-main/assets/logo placeholder.png" alt="JOB-ABLE"> JOB-<span class="able">ABLE</span>
        </div>

        <div class="nav">
            <div class="options">
                <a href="../JOBABLE-homepage/home.html">HOME</a>
                <a href="http://">MORE</a>
            </div>

            <div class="icons">
                <img class="notif" src="/JOB-ABLE-main/assets/notification icon.png" alt="Notification">
                <a href="../JOBABLE-profile-view/Profile-Company-Views.html"><img class="profile" src="/JOB-ABLE-main/assets/account icon.png" alt="Account"></a>
            </div>
        </div>
    </header> -->
    
    <br><br><br><br><br><br><br>

    <div class="body">
        <div class="job-posting">
            <div class="post-profile">
                <div class="com-profile">
                    <img class="com-profile-pic" src="/JOB-ABLE-main/assets/company profile.png" alt="Company Profile">
                    <div>
                        <div>Company Name</div> <div class="time">1hr</div>
                    </div>
                </div>

                <div style="margin: 20px;">EDIT</div>
            </div>
            
            <br>

            <div class="post-contents">
                <div class="title">JOB POSTING 1#</div>

                <p class="content">Lorem ipsum dolor sit amet consectetur adipisicing elit. Tenetur ab, dolorem eius optio doloremque similique eligendi debitis minus eaque. Natus fugiat vitae in eveniet excepturi, rerum nobis et harum veritatis! Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora blanditiis modi quia voluptas aperiam est delectus suscipit eligendi nulla ipsam adipisci labore dolor mollitia, quaerat iste obcaecati quas pariatur. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Impedit quod nulla perferendis quis, recusandae ipsa eaque suscipit dolores itaque sapiente? Nemo dolorem facere deserunt, officiis sequi quis non voluptatum tempore. Lorem, ipsum dolor sit amet consectetur adipisicing elit. Illum neque iste vitae dolor magnam, repudiandae exercitationem dolore, cumque totam architecto quae saepe possimus consectetur? Magnam placeat pariatur provident aliquam repudiandae. Lorem ipsum, dolor sit amet consectetur adipisicing elit. Distinctio sint velit sapiente atque, ullam vitae totam vero, maxime rem esse voluptas quo ut dolorem adipisci earum animi sequi facilis quae?</p>
            </div>

            <div class="post-category">

            </div>
        </div>
        
        <div class="posting-applicant">
            <div class="applicant">
                <div class="applicant-applied">
                    <img src="/JOB-ABLE-main/assets/applicant profile.png" alt="Applicant Profile">
                    <div class="applied">APPLICANT NAME <span class="applied-position">applied for this position.</span></div>
                </div>
                <div class="check-cancel">
                    <a href="http://"><img src="/JOB-ABLE-main/assets/check.png" alt="Check"></a> <a href="http://"><img src="/JOB-ABLE-main/assets/cancel.png" alt="Cancel"></a>
                </div>
            </div>
        </div>

        <div class="posting-applicant">
            <div class="applicant">
                <div class="applicant-applied">
                    <img src="/JOB-ABLE-main/assets/applicant profile.png" alt="Applicant Profile">
                    <div class="applied">APPLICANT NAME <span class="applied-position">applied for this position.</span></div>
                </div>
                <div class="check-cancel">
                    <a href="http://"><img src="/JOB-ABLE-main/assets/check.png" alt="Check"></a> <a href="http://"><img src="/JOB-ABLE-main/assets/cancel.png" alt="Cancel"></a>
                </div>
            </div>
        </div>

        <div class="posting-applicant">
            <div class="applicant">
                <div class="applicant-applied">
                    <img src="/JOB-ABLE-main/assets/applicant profile.png" alt="Applicant Profile">
                    <div class="applied">APPLICANT NAME <span class="applied-position">applied for this position.</span></div>
                </div>
                <div class="check-cancel">
                    <a href="http://"><img src="/JOB-ABLE-main/assets/check.png" alt="Check"></a> <a href="http://"><img src="/JOB-ABLE-main/assets/cancel.png" alt="Cancel"></a>
                </div>
            </div>
        </div>
    </div>

    
    
</body>
</html>