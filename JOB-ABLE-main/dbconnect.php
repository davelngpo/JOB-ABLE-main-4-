<?php

    $localhost = "localhost";
    $username = "root";
    $password = "";
    $database = "jobable";

    $conn = new mysqli($localhost, $username, $password, $database);

    if ($connect->connect_error) {
        die("Connection failed: " . $connect->connect_error);
    }
?>