<?php
    include '../../dbconnect.php';

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
<?php include 'header-app.php' ?>
    
    <br><br><br><br><br><br>

    <section class="applicant-section">
        <div class="profile-container">
            <!-- Left Column (Profile Section) -->
            <div class="left-column">
                <!-- Profile Section -->
                <div class="profile-header">
                    <div class="profile-picture">
                        <img src="applicant-photo.jpg" alt="Applicant Picture">
                    </div>
                    <div class="applicant-details">
                        <br>
                        <h1>Applicant Name <span class="age-gender">| Age | Gender</span></h1>
                        <div class="button-container"> <!-- Button container for right alignment -->
                            <button class="edit-profile-bttn">Edit Profile</button>
                            <a href="../../JobAbleMain.html"><button class="logout-bttn">Logout</button></a>
                        </div>
                        <br>
                        <p>Applicant Biography lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque sit amet sem velit. Vestibulum purus urna, sagittis id faucibus ac, convallis et nunc.</p>
                    </div>
                </div>
    
                <!-- Recently Applied Jobs Section -->
                <div class="recently-applied">
                    <h2>Recently Applied In...</h2>
                    <div class="job-listings">
                        <div class="job-posting">
                            <p><strong>Job Posting 1#</strong></p>
                            <p>Company Name</p>
                        </div>
                        <div class="job-posting">
                            <p><strong>Job Posting 2#</strong></p>
                            <p>Company Name</p>
                        </div>
                        <div class="job-posting">
                            <p><strong>Job Posting 3#</strong></p>
                            <p>Company Name</p>
                        </div>
                    </div>
                    <div class="pagination">
                        <a href="#">1</a>
                        <a href="#">...</a>
                        <a href="#">3</a>
                    </div>
                </div>
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
    </section>
    
    
</body>
</html>