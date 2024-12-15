<?php
include '../../dbconnect.php'; // Database connection

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $job_title = $_POST['job_title'];
    $job_description = $_POST['job_description'];
    $categories = $_POST['categories']; // Array of selected categories
    $company_id = 2; // Replace with dynamic value if needed (e.g., from session)

    // Check if company_id exists
    $sql_check_company = "SELECT company_id FROM companies WHERE company_id = ?";
    $stmt_check = $connect->prepare($sql_check_company);
    $stmt_check->bind_param("i", $company_id);
    $stmt_check->execute();
    $stmt_check->store_result();

    if ($stmt_check->num_rows === 0) {
        die("Error: Company ID $company_id does not exist in the companies table.");
    }

    // Insert job posting into the database
    $sql = "INSERT INTO jobposting (company_id, posting_title, posting_description) VALUES (?, ?, ?)";
    $stmt = $connect->prepare($sql);
    $stmt->bind_param("iss", $company_id, $job_title, $job_description);

    if ($stmt->execute()) {
        $jobposting_id = $stmt->insert_id; // Get the inserted jobposting_id

        // Insert selected categories into the job_categories table
        foreach ($categories as $category) {
            $sql_category = "INSERT INTO job_categories (jobposting_id, category_name) VALUES (?, ?)";
            $stmt_category = $connect->prepare($sql_category);
            $stmt_category->bind_param("is", $jobposting_id, $category);

            if (!$stmt_category->execute()) {
                die("Error inserting job category: " . $stmt_category->error);
            }
        }

        header("Location: Profile-Company-Views.php?message=Job+Posting+Uploaded+Successfully!");
        exit();
    } else {
        die("Error inserting job posting: " . $stmt->error);
    }
} else {
    header("Location: Profile-Company-Views.php");
    exit();
}
?>
