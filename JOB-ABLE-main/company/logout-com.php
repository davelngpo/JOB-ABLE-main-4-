<?php
    session_start();
    
    $uwu = $_SESSION['company_id'];

    if (!isset($uwu)) {
        header("Location: ../register-signin pages/Sign-in.php");
        exit();
    }
    
    $app_user = $_SESSION['company_id'] ?? null;
?>