

<?php
session_start();
if(isset($_SESSION['login'])){
 header("location:dash.php");
   }
   $conn = mysqli_connect('localhost', 'root', 'root', 'task2');
   if (!$conn) {
       die("Connection failed: " . mysqli_connect_error());
   }
   if ($_POST['login']) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $sql = "SELECT user.*, accessType.name AS access_type_name 
            FROM `user` 
            JOIN userType ON user.id = userType.user_id 
            JOIN accessType ON userType.access_type_id = accessType.id 
            WHERE username='$username' AND password = '$password'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['login'] = $username;
        $_SESSION['access_type'] = $row['access_type_name'];
        header("Location: dash.php");
        exit();
    } else {
        $error = "Invalid username or password.";
    }
}
?>


<!DOCTYPE html>
<html>

<head>
    <title>Login Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
            margin-top: 100px;
        }

        h2 {
            text-align: center;
            color: #333;
        }

        .error-message {
            color: red;
            margin-bottom: 10px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            color: #333;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            margin-bottom: 10px;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        .register-link {
            display: block;
            text-align: center;
            margin-top: 10px;
        }

        .register-link a {
            color: #333;
            text-decoration: none;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Login</h2>
        <?php if (isset($error)) { ?>
            <p class="error-message"><?php echo $error; ?></p>
        <?php } ?>
        <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <label for="username">Username:</label>
            <input type="text" name="username" required>

            <label for="password">Password:</label>
            <input type="password" name="password" required>

            <input type="submit" value="Login" name="login">
        </form>
        <div class="register-link">
            Don't have an account? <a href="register.php">Register</a>
        </div>
    </div>
</body>

</html>
