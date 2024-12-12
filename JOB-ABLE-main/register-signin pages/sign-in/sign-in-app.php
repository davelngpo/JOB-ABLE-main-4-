<?php
    include '../../dbconnect.php';


    if(isset($_POST['email']) && isset($_POST['password'])){
        function validate($data) {
            return htmlspecialchars(trim($data));
        }

        $email = validate($_POST['email']);
        $password = validate($_POST['password']);

        
        $sql = "SELECT * FROM applicants WHERE email = ?";
        $stmt = mysqli_prepare($connect, $sql);
        if (!$stmt) {
            die("SQL error: " . mysqli_error($connect));
        }
        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt); 
        $result = mysqli_stmt_get_result($stmt);
    
        if ($result && mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);

            if (password_verify($password, $row['password'])) {
                session_start();
                $_SESSION['applicant_id'] = $row['applicant_id'];
                //header("location: ../../applicant/JOBABLE-homepage/home_page_applicant.html");
                exit();
                
            } else {
                //header("location: Sign-in-Applicant.html"); //incorrect password
                echo "<script>console.log('PHP incorrect pass')</script>";
                exit();
            }

        } else {
            //header("location: Sign-in-Applicant.html"); //user not found
            echo "<script>console.log('PHP user not found')</script>";
            exit();
        }
    
    }else{
        header("location: Sign-in-Applicant.html");
        echo "<script>console.log('PHP uwu')</script>";
    }

    
?>
