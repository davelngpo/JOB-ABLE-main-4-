<?php
    include '../dbconnect.php';
    include 'logout-com.php';

    $jobposting = "SELECT *, GROUP_CONCAT(jc.category_name SEPARATOR ', ') AS categories FROM jobposting jp join companies c ON jp.company_id = c.company_id join job_categories jc on jc.jobposting_id = jp.jobposting_id GROUP BY jp.jobposting_id limit 3";

    $category = "SELECT category_name FROM `job_categories` LIMIT 4";

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
                        
                        <div class="button-container">
                            <a href="logout.php"><button class="logout-bttn" onclick="alert('Are you sure?')">Logout</button></a>
                        </div>
                        <br>
                    
                    </div>
                </div>
            </div>
        <!--dito ko lapag yung sa job posting info-->
        <section class="bottom">
        <div class="btn-container">
            <button class="upload-job-btn" onclick="togglePopup('job-posting-popup')">Upload New Job Posting</button>
        </div>
    </section>
    <div class="division">
        <div class="job-listing">
        
            <?php
            $sql = "SELECT *FROM jobposting jp  join companies c on jp.company_id = c.company_id WHERE jp.company_id = $user;";
            $result = $connect->query($sql);
                while($jobposting = $result -> fetch_assoc()){
            ?>
                <div class="jobposting-container">
                    <h2><?php echo $jobposting['posting_title'] ?></h2>
                    <div class="job-description">
                        <p><?php echo $jobposting['posting_description'] ?></p>
                    </div>
                    <div class="date"><?php echo $jobposting['date_posted'] ?></div>
                </div>
                    
            <?php } ?>
                    
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
                <h4>💼 Industry</h4 >
                <p><?php echo $com_details['industry_type'] ?></p>
            </div>
            <div>
                <h4>📍 Location</h4 >
                <p><?php echo $com_details['branch'] . " Branch, " . $com_details['postal_address'] ?></p>
            </div>
            <div>
                <h4>🖥️ Website</h4>
                <p><?php echo $com_details['company_website'] ?></p>
            </div>
            

            <?php } ?>
        </aside>
    </div>
</div>
        
<!-- Pop-up for New Job Posting -->
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

<!-- Pop-up for Announcement -->
<div class="popup" id="job-announcement-popup">
        <div class="overlay" onclick="togglePopup('job-announcement-popup')"></div>
        <div class="content">
            <h1>Make an Announcement</h1>
            <form action="upload_announcement.php" method="POST">
                <textarea name="announcement" placeholder="Write your announcement here..." required></textarea>
                <div class="actions">
                    <button class="btn" type="submit">Submit Announcement</button>
                    <button class="btn cancel-btn" type="button" onclick="togglePopup('job-announcement-popup')">Cancel</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Function to toggle popups
        function togglePopup(popupId) {
            const popup = document.getElementById(popupId);
            popup.classList.toggle('active');
            document.querySelector('.overlay').classList.toggle('active');
        }

        // Function to close all popups
        function closeAllPopups() {
            document.querySelectorAll('.popup').forEach(popup => popup.classList.remove('active'));
            document.querySelector('.overlay').classList.remove('active');
        }

        // Display selected categories in a list
        function displaySelectedCategories() {
            const selectedOptions = Array.from(document.getElementById('categories').selectedOptions);
            const selectedList = document.getElementById('selected-categories-list');
            selectedList.innerHTML = selectedOptions.map(option => `<li>${option.value}</li>`).join('');
        }
    </script>
                
                        
                
            </div>
         </div>   
</section>
                  
</body>
</html>
