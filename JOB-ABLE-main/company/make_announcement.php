<?php
include '../../dbconnect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $announcement_message = $_POST['announcement_message'];
    $id = 1; // Replace with the actual company ID from the session or other context

    $sql = "INSERT INTO job_announcements (id, announcement_message, post_date) 
            VALUES (?, ?, NOW())";
    $stmt = $connect->prepare($sql);
    $stmt->bind_param("is", $id, $announcement_message);

    if ($stmt->execute()) {
        echo "Announcement posted successfully!";
    } else {
        echo "Error: " . $connect->error;
    }

    $stmt->close();
}
?>
