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
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        
        .dashboard {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f2f2f2;
            border-radius: 8px;
        }
        
        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }
        
        h2 {
            text-align: center;
            color: #666;
            margin-bottom: 10px;
        }
        
        p {
            text-align: center;
            color: #888;
            margin-bottom: 20px;
        }
        
        ul {
            list-style-type: none;
            padding-left: 0;
            margin-bottom: 20px;
        }
        
        li {
            margin-bottom: 10px;
        }
        
        a {
            text-decoration: none;
            color: #4CAF50;
        }
        
        .logout {
        display: flex;
        justify-content: center;
        margin-top: 20px;
        }
        
        .logout input[type="submit"] {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            cursor: pointer;
            font-size: 14px;
            border-radius: 4px;
        }
        
        a:hover {
            text-decoration: underline;
        }
        
        .logout input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
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
                <li><a href="assign_subjects_to_standards.php">Assign Subject to Standards</a></li>
            </ul>

            <h3>Assign Students to Standards:</h3>
            <ul>
                <li><a href="assign_students_to_standards.php">Assign Students to Standards</a></li>
            </ul>

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