<?php
    include '../../dbconnect.php';


    if(isset($_POST['email']) && isset($_POST['password'])){
        function validate($data) {
            return htmlspecialchars(trim($data));
        }

        $email = validate($_POST['email']);
        $password = validate($_POST['password']);

        
        $sql = "SELECT * FROM companies WHERE company_email = ?";
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
                $_SESSION['company_id'] = $row['company_id'];
                header("location: ../../company/home.php");
                exit();
                
            } else {
                header("location: sign-in-Company.html"); //incorrect password
                echo "<script>alert('PHP incorrect pass')</script>";
                exit();
            }

        } else {
            header("location: sign-in-Company.html"); //user not found
            echo "<script>alert('PHP user not found')</script>";
            exit();
        }
    
    }else{
        header("location: sign-in-Company.html");
    }

    
?>
