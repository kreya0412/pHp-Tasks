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
    <title>DASHBOARD</title>
    <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f4f4f4;
      margin: 0;
      padding: 20px;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    .dashboard {
      background-color: #fff;
      padding: 40px;
      border-radius: 5px;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
      text-align: center;
    }

    h1, h2, p {
      margin: 0;
      color: #333;
    }

    h1 {
      font-size: 32px;
      margin-bottom: 20px;
    }

    h2 {
      font-size: 24px;
      margin-bottom: 20px;
    }

    p {
      font-size: 18px;
      margin-bottom: 20px;
    }

    .logout {
      margin-top: 40px;
    }

    button, a {
      padding: 12px 24px;
      font-size: 16px;
      background-color: #4caf50;
      color: #fff;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      text-decoration: none;
      display: inline-block;
    }

    button:hover, a:hover {
      background-color: #45a049;
    }

    label {
      display: block;
      margin-bottom: 20px;
    }

    input[type="submit"] {
      padding: 12px 24px;
      font-size: 16px;
      background-color: #4caf50;
      color: #fff;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }

    input[type="submit"]:hover {
      background-color: #45a049;
    }
  </style>
</head>
<body>
    <div class="dashboard">
        <form action="redirect.php" method="post">
            <h1>User Dashboard</h1>
            <h2>Welcome, <?php echo $_SESSION['login']; ?></h2>
            <p>Your access type: <?php echo $accessTypeName; ?></p>

            <?php if ($accessTypeName === "admin"): ?>
                <p>Welcome, Admin! You have special privileges.</p>
                <button type="submit" name="education_dashboard">Education Dashboard</button>
            <?php elseif ($accessTypeName === "teacher"): ?>
                <p>Welcome, Teacher! You can manage your classes and assignments.</p>
                <button type="submit" name="education_dashboard">Education Dashboard</button>
            <?php elseif ($accessTypeName === "student"): ?>
                <p>Welcome, Student! Access your courses and assignments here.</p>
                <button type="submit" name="education_dashboard">Education Dashboard</button>
            <?php elseif ($accessTypeName === "librarian"): ?>
                <p>Welcome, Librarian! Access your courses and assignments here.</p>
                <button type="submit" name="education_dashboard">Education Dashboard</button>
            <?php else: ?>
                <p>Welcome! Please contact the administrator for further instructions.</p>
            <?php endif; ?>

            <br><br>
        </form>
        
        <label>To Add User:</label>
        <button style="padding: 10px 20px; font-size: 16px;"><a href="newuser.php">Add User</a></button>
        <br><br>
        
        <form action="" method="POST">
            <label>To list all Data:</label>
            <button style="padding: 10px 20px; font-size: 16px;"><a href="view.php">View Data</a></button>            <br>
            <br>
        </form>
        
        <div class="logout">
            <form action="redirect.php" method="post">
                <input type="submit" name="logout" value="Log Out">
            </form>
        </div>
    </div>
</body>
</html>

<?php 
if(isset($_POST['logout'])){
    session_start(); 
    session_unset(); 
    session_destroy(); 

    header("Location: login.php");
    exit();
}
?>
