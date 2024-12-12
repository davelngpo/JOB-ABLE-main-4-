<?php
include '../../dbconnect.php';

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $firstname = $_POST['firstname'];
    $middlename = $_POST['middlename'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];
    $birth = $_POST['birth'];
    $contactnumber = $_POST['contactnumber'];
    $address = $_POST['address'];
    $edu = $_POST['edu'];
    $highschool = $_POST['highschool'];
    $college = $_POST['college'];
    $tcpp = $_POST['tcpp'];

    $confirm_password = $_POST['confirm_password'];

    if($password !== $confirm_password){
        header("location: register-page-app.html?error=Passwords do not match!");
        exit();
    }

    $stmt = $connect->prepare("SELECT applicant_id FROM applicants WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        header("Location: register-page-app.html?error=Email is taken");
        $stmt->close();
        $conn->close();
        exit;
    }
    $stmt->close();

    $hash_password = password_hash($password, PASSWORD_DEFAULT);

    $stmt = mysqli_prepare($connect, "INSERT INTO applicants(first_name, middle_name, last_name, gender, age, birth_date, contact_number, email, postal_address, highest_educational_attainment, high_school_name, college_name, password_hash, tcpp) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

    mysqli_stmt_bind_param( $stmt, 'ssssissssssssi', $firstname, $middlename, $lastname, $gender, $age, $birth, $contactnumber, $email, $address, $edu, $highschool, $college, $hash_password, $tcpp);


    if (mysqli_stmt_execute($stmt)) {
        header("Location: ../Sign-in.html");
    } else {
        echo "<h3>Error: " . $stmt->error . "</h3>";
    }

    $stmt->close();
}

$connect->close();
?>