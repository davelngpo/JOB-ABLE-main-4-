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

    $sql = "INSERT INTO
    companies   (company_name, company_email, representative_name, representative_email, representative_contact_number, company_contact_number, postal_address, industry_type, branch,    company_description, company_website, agreed_terms_and_conditions, created_at, updated_at)
    VALUES      ('$name',      '$email',      '$r_name',           '$r_email',           $r_number,                     $contactnumber,         '$address',     '$industry',   '$branch', '$description',      '$website',      '$tcpp',                     CURDATE(),  )";



}
?>