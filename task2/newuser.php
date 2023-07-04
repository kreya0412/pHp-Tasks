<?php
$servername = "localhost";
$username_db = "root";
$password_db = "root";
$database = "task2";

$conn = mysqli_connect($servername, $username_db, $password_db, $database);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $email = $_POST["email"];
    $fullname = $_POST["fullname"];
    $city = $_POST["city"];
    $accessTypeId = $_POST["accessType"];

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $userQuery = "INSERT INTO user (username, password, email, fullname, city) VALUES (?, ?, ?, ?, ?)";
    $userStmt = mysqli_prepare($conn, $userQuery);
    mysqli_stmt_bind_param($userStmt, "sssss", $username, $password, $email, $fullname, $city);

    if (!mysqli_stmt_execute($userStmt)) {
        header("Location: error.php");
        exit();
    }

    $userId = mysqli_insert_id($conn);

    $userTypeQuery = "INSERT INTO userType (user_id, access_type_id) VALUES (?, ?)";
    $userTypeStmt = mysqli_prepare($conn, $userTypeQuery);
    mysqli_stmt_bind_param($userTypeStmt, "ii", $userId, $accessTypeId);

    if (!mysqli_stmt_execute($userTypeStmt)) {
        header("Location: error.php");
        exit();
    } 

    header("Location: success.php");
    exit();
}

$accessTypeQuery = "SELECT id, name FROM accessType";
$accessTypeResult = mysqli_query($conn, $accessTypeQuery);
$accessTypes = mysqli_fetch_all($accessTypeResult, MYSQLI_ASSOC);
?>


<!DOCTYPE html>
<html>
<head>
    <title>Registration Page</title>
</head>
<body>
    <h2>New User</h2>
    <form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
        <label for="username">Username:</label>
        <input type="text" name="username"  required><br><br>
                
        <label for="email">Email:</label>
        <input type="email" name="email"  required><br><br>
        
        <label for="fullname">Full Name:</label>
        <input type="text" name="fullname"  required><br><br>
        
        <label for="city">City:</label>
        <input type="text" name="city"  required><br><br>

        <label for="password">Password:</label>
        <input type="password" name="password"  required><br><br>

        <label for="accessType">Access Type:</label>
        <select name="accessType" id="accessType" required>
            <?php foreach ($accessTypes as $accessType): ?>
                <option value="<?php echo $accessType['id']; ?>"><?php echo $accessType['name']; ?></option>
            <?php endforeach; ?>
        </select><br><br>
        
        <input type="submit" value="Register">
    </form>
</body>
</html>
 



