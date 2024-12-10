<?php

    $dblocalhost = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $database = "jobable";

    $connect = new mysqli($dblocalhost, $dbusername, $dbpassword, $database);

    if ($connect->connect_error) {
        die("Connection failed: " . $connect->connect_error);
    }
?>