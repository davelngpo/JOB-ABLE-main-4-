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
        
                                <!-- dito ko lapag-->
            <!--COMPANY PROFILE-->
    <section class="company-section">
        <div class="profile-container">
            <!-- Left Column (Company Profile Section) -->
            <div class="left-column">
                <div class="profile-header">
                    <div class="profile-picture">
                        <img src="applicant-photo.jpg" alt="Applicant Picture">
                    </div>
                    <div class="company-details">
                        <br>
                        <h1>Company Name</h1>
                        <div class="button-container"> 
                            <button class="edit-profile-bttn">Edit Profile</button>
                            <a href="../../JobAbleMain.html"><button class="logout-bttn">Logout</button></a>
                        </div>
                        <br>
                        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ullam maxime porro expedita natus cupiditate earum voluptatibus voluptas, non perspiciatis, obcaecati, totam provident repudiandae asperiores voluptates laboriosam. Eaque dolore autem quod?</p>
                    </div>
                </div>
            
                <!-- Buttons for uploading job postings and making announcements -->
                <div class="action-buttons">
                    <button class="upload-job-btn" onclick="toggleJobPostingPopup()">Upload New Job Posting</button>
                    <button class="announcement-btn" onclick="toggleJobAnnouncementPopup()">Make an Announcement</button>
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
                
                <div class="other-job-listings">
                    <div class="job-posting">

                        <?php
include '../../dbconnect.php';

if (isset($_GET['jobposting_id'])) {
    $jobposting_id = $_GET['jobposting_id']; // Get the jobposting_id from the URL

    $sql = "SELECT jp.posting_title, jp.posting_description, GROUP_CONCAT(jc.category_name SEPARATOR ', ') AS categories
            FROM jobposting jp
            LEFT JOIN job_categories jc ON jp.jobposting_id = jc.jobposting_id
            WHERE jp.jobposting_id = '$jobposting_id'
            GROUP BY jp.jobposting_id";

    $result = $connect->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo "<h1>" . $row['posting_title'] . "</h1>";
        echo "<p>" . $row['posting_description'] . "</p>";
        echo "<button>" . "<h3>Categories: " . ($row['categories'] ? $row['categories'] : 'None') . "</h3>". "</button>";
    } else {
        echo "Job posting not found.";
    }
} else {
    echo "No job posting ID provided.";
}

$connect->close();
?> 
                    <a href="Profile-Company-Views.php?jobposting_id=2">
                    <p>Job Description</p></a>
                    </div>
                </div>

                <div class="other-job-listings">
                    <div class="job-posting">
                    <a href="Profile-Company-Views.php?jobposting_id=32">
                            <p>Job Description</p></a>
                            <?php
include '../../dbconnect.php';

if (isset($_GET['jobposting_id'])) {
    $jobposting_id = $_GET['jobposting_id']; // Get the jobposting_id from the URL

    $sql = "SELECT jp.posting_title, jp.posting_description, GROUP_CONCAT(jc.category_name SEPARATOR ', ') AS categories
            FROM jobposting jp
            LEFT JOIN job_categories jc ON jp.jobposting_id = jc.jobposting_id
            WHERE jp.jobposting_id = '$jobposting_id'
            GROUP BY jp.jobposting_id";

    $result = $connect->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo "<h1>" . $row['posting_title'] . "</h1>";
        echo "<p>" . $row['posting_description'] . "</p>";
        echo "<h3>Categories: " . ($row['categories'] ? $row['categories'] : 'None') . "</h3>";
    } else {
        echo "Job posting not found.";
    }
} else {
    echo "No job posting ID provided.";
}

$connect->close();
?>        
                    </div>
                </div>

</div>

<!-- wait lang  -->

            
</div>

                    </div>
                    
                    </div>
            </div>
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
            </div><!-- Pop-up for New Job Posting -->
<div class="popup" id="job-posting-popup">
    <div class="overlay" onclick="toggleJobPostingPopup()"></div>
    <div class="content">
        <h1>Upload New Job Posting</h1>
        <form action="upload_job.php" method="POST">
            <!-- Job Title and Description -->
            <textarea name="job_title" placeholder="Job Title" required></textarea>
            <textarea name="job_description" placeholder="Job Description" required></textarea>

            <!-- Dropdown for Categories -->
            <div id="categories-dropdown-container" style="display: none;">
                <label for="categories" class="dropdown-label">Select Categories:</label>
                <select id="categories" name="categories[]" multiple required class="categories-dropdown" onchange="displaySelectedCategories()">
                    <option value="Administration and Office Support">Administration and Office Support</option>
                    <option value="Information Technology (IT)">Information Technology (IT)</option>
                    <option value="Healthcare and Medicine">Healthcare and Medicine</option>
                    <option value="Education and Training">Education and Training</option>
                    <option value="Finance and Accounting">Finance and Accounting</option>
                    <option value="Sales and Marketing">Sales and Marketing</option>
                    <option value="Engineering and Architecture">Engineering and Architecture</option>
                    <option value="Creative Arts and Design">Creative Arts and Design</option>
                    <option value="Manufacturing and Production">Manufacturing and Production</option>
                    <option value="Retail and Customer Service">Retail and Customer Service</option>
                    <option value="Trades and Construction">Trades and Construction</option>
                    <option value="Transportation and Logistics">Transportation and Logistics</option>
                    <option value="Science and Research">Science and Research</option>
                    <option value="Hospitality and Tourism">Hospitality and Tourism</option>
                    <option value="Law and Legal Services">Law and Legal Services</option>
                    <option value="Public Service and Government">Public Service and Government</option>
                    <option value="Energy and Environment">Energy and Environment</option>
                    <option value="Media and Communication">Media and Communication</option>
                    <option value="Agriculture">Agriculture</option>
                    <option value="Food">Food</option>
                    <option value="Entertainment and Performing Arts">Entertainment and Performing Arts</option>
                </select>
            </div>

            <!-- Display Selected Categories -->
            <div id="selected-categories-container">
                <h4>Selected Categories:</h4>
                <ul id="selected-categories-list"></ul>
            </div>

            <!-- Actions container with buttons -->
            <div class="actions">
                <button class="btn" type="button" onclick="showCategoriesDropdown()">Add Category</button>
                <button class="btn" type="submit">Upload Job Posting</button>
                <button class="btn cancel-btn" type="button" onclick="toggleJobPostingPopup()">Cancel</button>
            </div>
        </form>
    </div>
</div>

<!-- JavaScript for Dropdown and Display -->
<script>
    // Function to show the categories dropdown
    function showCategoriesDropdown() {
        document.getElementById('categories-dropdown-container').style.display = 'block';
    }

    // Function to display selected categories
    function displaySelectedCategories() {
        const dropdown = document.getElementById('categories');
        const selectedCategoriesList = document.getElementById('selected-categories-list');
        
        selectedCategoriesList.innerHTML = ''; // Clear previous list
        
        // Loop through options and find selected ones
        for (const option of dropdown.options) {
            if (option.selected) {
                const listItem = document.createElement('li');
                listItem.textContent = option.value;
                selectedCategoriesList.appendChild(listItem);
            }
        }
    }

    // Function to toggle the job posting pop-up
    function toggleJobPostingPopup() {
        const popup = document.getElementById('job-posting-popup');
        popup.style.display = popup.style.display === 'block' ? 'none' : 'block';
    }
</script>


<!-- here-->
 <!--Pop-up for Adding a Category 
    <div class="popup" id="add-category-popup" style="display: none;">
    <div class="overlay" onclick="toggleAddCategoryPopup()"></div>
    <div class="content">
        <h1>Add New Category</h1>
        <form action="add_category.php" method="POST">
            <input type="text" name="category_name" placeholder="Category Name" required>
            <div class="actions">
                <button class="btn" type="submit">Add Category</button>
                <button class="btn cancel-btn" type="button" onclick="toggleAddCategoryPopup()">Cancel</button>
            </div>
        </form>
    </div>
</div> -->
    

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
