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
    <link rel="stylesheet" href="job-announcement.css">
    <link rel="stylesheet" href="Profile-Company-Views.css">
    <link rel="stylesheet" href="new-announcement.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Mohave:ital,wght@0,300..700;1,300..700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Onest:wght@100..900&display=swap" rel="stylesheet">
</head>
<body>
    <?php include 'header-com.php' ;
    $user = $_SESSION['company_id'];
        
    $company = "SELECT
                    a.*
                    from companies a
                    where a.company_id = $user
                    ";

    $jobposting = "SELECT jp.*, c.*, GROUP_CONCAT(jc.category_name SEPARATOR ', ') AS categories FROM jobposting jp JOIN companies c ON c.company_id = jp.company_id JOIN job_categories jc ON jp.jobposting_id = jc.jobposting_id WHERE jp.company_id = 7 GROUP BY jp.jobposting_id";

    ?>
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
<!-- dito ko lapag-->
    <section class="company-section">
        <div class="profile-container">
            <div class="top-column">
                <div class="profile-header">
                    <div class="profile-picture">
                        <img src="company-photo.jpg" alt="Company Picture">
                    </div>
                     
                    <div class="company-details">
                        <div class="company">
                            <?php
                                $r = $connect->query($company);
                                while($com_details = $r -> fetch_assoc()){
                            ?>
                            <h1><?php echo $com_details['company_name'] ?></h1>

                            <p class="desc"><?php echo $com_details['company_description'] ?></p>
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
                <div class="left-column">
                    <!-- Buttons for uploading job postings and making announcements -->
                <div class="action-buttons">
                    <button class="upload-job-btn" onclick="toggleJobPostingPopup()">Upload New Job Posting</button>
                    <button class="announcement-btn" onclick="toggleJobAnnouncementPopup()">Make an Announcement</button>
                </div>
                    
                    <?php $r2 = $connect->query($jobposting); 

                        if($r2->num_rows >= 0):
                    
                        while($jobpost = $r2 -> fetch_assoc()):?>
                        
                        <div class="job-listing">
                            <a href="job-posting-view-app.php?id=<?php echo $jobpost['jobposting_id'] ?>"><h2><?php echo $jobpost['posting_title'] ?></h2></a>
                            <div class="job-description">
                                <?php
                                    $post_desc = $jobpost['posting_description'];
                                    $max_len = 170;
                                    echo strlen($post_desc) > $max_len? substr($post_desc, 0, $max_len) . "..." : $post_desc;
                                ?>
                            </div>
                            <div class="job-categories">
                                <?php foreach (explode(', ', $jobpost['categories']) as $category): ?>
                                    <span class="job-category"><?php echo htmlspecialchars($category); ?></span>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        <?php endwhile;
                    else: ?>
                    <p style="font-size: 2em;">Company does not currently have open job postings right now, come back next time!</p>
                        
                    <?php endif ?>
                </div>
                
                <aside class="sidebar">
                    <h2>Personal Info</h2>
                    <?php
                        $r = $connect->query($company);
                        while($com_details = $r -> fetch_assoc()){
                    ?>
                    <div>
                        <h4>📧 Email</h4>
                        <p><?php echo $com_details['company_email'] ?></p>
                    </div>
                    <div>
                        <h4>📍 Industry</h4 >
                        <p><?php echo $com_details['industry_type'] ?></p>
                    </div>
                    <div>
                        <h4>📍 Location</h4 >
                        <p><?php echo $com_details['branch'] . " Branch, " . $com_details['postal_address'] ?></p>
                    </div>
                    <div>
                        <h4>📂 Website</h4>
                        <p><?php echo $com_details['company_website'] ?></p>
                    </div>
                    

                    <?php } ?>
                </aside>
            </div>
<!-- Pop-up for Job Announcement -->
<div class="popup" id="job-announcement-popup">
        <div class="overlay" onclick="toggleJobAnnouncementPopup()"></div>
        <div class="content">
            <h1>Make an Announcement</h1>
            <form action="make_announcement.php" method="POST">
                <textarea name="announcement_message" placeholder="Write your announcement..." required></textarea>
                <div class="actions">
                    <button class="btn" type="submit">Post Announcement</button>
                    <button class="btn cancel-btn" type="button" onclick="toggleJobAnnouncementPopup()">Cancel</button>
                </div>
            </form>
        </div>
    </div>
    

    <script>
        function toggleJobPostingPopup() {
            document.getElementById("job-posting-popup").classList.toggle("active");
        }

        function toggleJobAnnouncementPopup() {
            document.getElementById("job-announcement-popup").classList.toggle("active");
        }

        
        function showCategoriesDropdown() {
            const dropdownContainer = document.getElementById("categories-dropdown-container");
            dropdownContainer.style.display = dropdownContainer.style.display === "none" ? "block" : "none";
        }


    </script>
                
                        
                
            </div>
         </div>   
</section>
                  
</body>
</html>
