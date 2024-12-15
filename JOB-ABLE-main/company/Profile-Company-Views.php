<?php
    include '../dbconnect.php';
    include 'logout-com.php';


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Company View</title>

    <link rel="stylesheet" href="Profile-Company-Views.css">
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
    
    <br><br><br><br><br><br>
    <!-- <header>
        <div class="logo">
            <span class="circle">🟡</span>JOB-<span>ABLE</span>
        </div>
        <nav>
            <a href="../JOBABLE-homepage/home.html">Home</a>
            <a href="#">More</a>
            <div class="icons">
                <span class="bell">🔔</span>
                <span class="profile">👤</span>
            </div>
        </nav>
    </header> -->

    <!--COMPANY PROFILE-->
<section class="company-section">
    <div class="profile-container">
        <!-- Left Column (Company Profile Section) -->
        <div class="left-column">
            <!-- Company Profile Section -->
            <div class="profile-header">
                <div class="profile-picture">
                    <img src="applicant-photo.jpg" alt="Applicant Picture">
                </div>
                <div class="company-details">
                    <br>
                    <h1>Company Name</h1>
                    <div class="button-container"> 
                        <button class="edit-profile-bttn">Edit Profile</button>
                        <a href="logout.php"><button class="logout-bttn">Logout</button></a>
                    </div>
                    <br>
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ullam maxime porro expedita natus cupiditate earum voluptatibus voluptas, non perspiciatis, obcaecati, totam provident repudiandae asperiores voluptates laboriosam. Eaque dolore autem quod?</p>
                </div>
            </div>

           
             <!-- Buttons for uploading job postings and making announcements -->
            <div class="action-buttons">
                <button class="upload-job-btn">Upload New Job Posting</button>
                <button class="announcement-btn">Make an Announcement</button>
            </div> 
             <!-- Company Jobs Posting -->
            <div class="job-listing">
                <h2>COMPANY JOB LISTING</h2>

                <div class="job-listings">
                    <div class="job-posting">
                        <h1>COMPANY NAME</h1>
                        <br>
                        <p><strong>Job Posting 1#</strong></p>
                        <br>
                        <a href="../JOBABLE posting view pages/job-posting-view-com.html"><p>Job Description</p></a>
                        <br>
                        <button class="category-btn">Category 1</button>
                        <button class="category-btn">Category 2</button>
                    </div>
                </div>

                <!-- New Job Listings -->
                <div class="other-job-listings">
                    <div class="job-posting">
                        <h1>COMPANY NAME</h1>
                        <br>
                        <p><strong>Job Posting 2#</strong></p>
                        <br>
                        <p>New Job Description</p>
                        <br>
                        <button class="category-btn">Category 1</button>
                        <button class="category-btn">Category 2</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Sidebar Section -->
    <aside class="sidebar">
        <div class="contact-info">
            <h4>📧 Company Email</h4>
            <p>Company@gmail.com</p>
            <h4>📍 Company Location</h4>
            <p>Details</p>
            <h4>🌐 Website</h4>
            <p>www.Companywebsite.com</p>
            <h4>🔗 LinkedIn</h4>
            <p>linkedin.com/in/applicant</p>
        </div>
    </aside>
</section>
                  
</body>
</html>