<!DOCTYPE html>
<html>
<head>
    <title>Success Page</title>
</head>
<body>
    <h2>Welcome, <?php echo $_SESSION['username']; ?>!</h2>
    <p>You have successfully logged in.</p>
        
    <a href="logout.php">Logout</a> 
</body>
</html>
