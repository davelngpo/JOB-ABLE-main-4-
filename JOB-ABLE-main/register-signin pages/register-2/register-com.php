<?php
include '../../dbconnect.php';

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $r_name = $_POST['r_name'];
    $r_email = $_POST['r_email'];
    $r_number = $_POST['r_number'];
    $contactnumber = $_POST['contactnumber'];
    $address = $_POST['add'];
    $industry = $_POST['industry'];
    $branch = $_POST['branch'];
    $description = $_POST['description'];
    $website = $_POST['website'];
    $tcpp = $_POST['tcpp'];

    $confirm_password = $_POST['confirm_password'];

    if($password !== $confirm_password){
        header("location: register-page-com.php?error=Passwords do not match!");
        exit();
    }

    $stmt = $connect->prepare("SELECT company_id FROM companies WHERE company_email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        header("Location: register-page-com.php?error=Email is taken");
        $stmt->close();
        $conn->close();
        exit;
    }
    $stmt->close();

    $hash_password = password_hash($password, PASSWORD_BCRYPT);

    $stmt = mysqli_prepare($connect, "INSERT INTO companies(company_name, company_email, password, representative_name, representative_email, representative_contact_number, company_contact_number, postal_address, industry_type, branch, company_description, company_website, agreed_terms_and_conditions) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

    mysqli_stmt_bind_param( $stmt, 'ssssssssssssi', $name, $email, $hash_password, $r_name, $r_email, $r_number, $contactnumber, $address, $industry, $branch, $description, $website, $tcpp);


    if (mysqli_stmt_execute($stmt)) {
        header("Location: ../Sign-in.html");
    } else {
        echo "<h3>Error: " . $stmt->error . "</h3>";
    }

    $stmt->close();
}

$connect->close();
?>