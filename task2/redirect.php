<?php
session_start();

if (isset($_POST['education_dashboard'])) {
    $accessTypeName = $_SESSION['access_type'];

    if ($accessTypeName === "admin") {
        header("Location: admin_dashboard.php");
        exit;
    } elseif ($accessTypeName === "teacher") {
        header("Location: teacher_dashboard.php");
        exit;
    } elseif ($accessTypeName === "student") {
        header("Location: student_dashboard.php");
        exit;
    } elseif ($accessTypeName === "librarian") {
        header("Location: librarian_dashboard.php");
        exit;
    } else {
        // Handle unrecognized access type
        header("Location: error.php");
        exit;
    }
}

if (isset($_POST['logout'])) {
    // Perform logout actions and redirect to login page
    session_unset();
    session_destroy();
    header("Location: login.php");
    exit();
}
?>