<?php
session_start();
if (empty($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}

$accessTypeName = $_SESSION['access_type'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Dashboard</title>
</head>
<body>
    <div class="dashboard">
        <h1>Teacher Dashboard</h1>
        <h2>Welcome, <?php echo $_SESSION['login']; ?></h2>
        <p>Your access type: <?php echo $accessTypeName; ?></p>

        <?php if ($accessTypeName === "teacher"): ?>
            <h3>Manage Subjects:</h3>
            <ul>
                <li><a href="add_subject.php">Manage</a></li>
            </ul>

            <h3>Manage Chapters:</h3>
            <ul>
                <li><a href="add_chapter.php">Manage</a></li>
            </ul>

            <h3>Assign Subject to Standards:</h3>
            <ul>
                <li><a href="assign_subject.php">Assign Subject to Standards</a></li>
            </ul>

            <h3>Assign Students to Standards:</h3>
            <ul>
                <li><a href="assign_students.php">Assign Students to Standards</a></li>
            </ul>

            <!-- Add other teacher-specific menus or sections -->
        <?php else: ?>
            <p>You do not have sufficient privileges to access the Teacher Dashboard.</p>
        <?php endif; ?>
    </div>

    <div class="logout">
        <form action="redirect.php" method="post">
            <input type="submit" name="logout" value="Log Out">
        </form>
    </div>
</body>
</html>