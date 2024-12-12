<?php
    include '../../dbconnect.php';


    if(isset($_POST['email']) && isset($_POST['password'])){
        function validate($data){
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        $email = validate($_POST['email']);
        $password = validate($_POST['password']);

        
        $sql = "SELECT * FROM applicants WHERE email = ?";
        $stmt = mysqli_prepare($connect, $sql);
        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt); 
    
        $result = mysqli_stmt_get_result($stmt);
    
        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);

            if (password_verify($password, $row['password'])) {
                session_start();
                $_SESSION['applicant_id'] = $row['applicant_id'];
                header("location: ../../applicant/JOBABLE-homepage/home_page_applicant.html");
                exit();
                
            } else {
                header("location: Sign-in-Applicant.html"); //incorrect password
                exit();
            }

        } else {
            header("location: Sign-in-Applicant.html"); //user not found
            exit();
        }
    
    }else{
        header("location: Sign-in-Applicant.html");
    }

    
?>
