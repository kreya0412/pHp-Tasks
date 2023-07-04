<?php 
session_start();
if (empty($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}
$accessTypeName = $_SESSION['access_type'];
?>
<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DASHBOARD</title>
</head>
<body>
  
<div class="dashboard">
<form action="" method="post" enctype="multipart/form-data">
<h1>User Dashboard</h1>

<h2>Welcome, <?php echo $_SESSION['login']; ?></h2>
    <p>Your access type: <?php echo $accessTypeName; ?></p>

    <h1>Education Dashboard</h1>
    <a href="redirect.php">Go to Education Dashboard</a>
<br><br>
<label>To Add User :</label>
<button><a href="newuser.php"> Add User</a></button>
<br> <br>

<label>To list all Data :</label>
<button type="submit" name="view">View Data</button>
<br>
<br> 
</div>
<div class="logout">
<input type="submit" name="logout" value="Log Out">
</div>
</form>
</body>
</html> -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DASHBOARD</title>
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
                <!-- Add other admin-specific buttons or features -->
            <?php elseif ($accessTypeName === "teacher"): ?>
                <p>Welcome, Teacher! You can manage your classes and assignments.</p>
                <button type="submit" name="education_dashboard">Education Dashboard</button>
                <!-- Add other teacher-specific buttons or features -->
            <?php elseif ($accessTypeName === "student"): ?>
                <p>Welcome, Student! Access your courses and assignments here.</p>
                <button type="submit" name="education_dashboard">Education Dashboard</button>
                <!-- Add other student-specific buttons or features -->
            <?php elseif ($accessTypeName === "librarian"): ?>
                <p>Welcome, Librarian! Access your courses and assignments here.</p>
                <button type="submit" name="education_dashboard">Education Dashboard</button>
                <!-- Add other librarian-specific buttons or features -->
            <?php else: ?>
                <p>Welcome! Please contact the administrator for further instructions.</p>
            <?php endif; ?>

            <br><br>

            <label>To Add User:</label>
            <button><a href="newuser.php">Add User</a></button>
            <br><br>

            <label>To list all Data:</label>
            <button type="submit" name="view">View Data</button>
            <br>
            <br>
        </form>
    </div>
    <div class="logout">
        <form action="redirect.php" method="post">
            <input type="submit" name="logout" value="Log Out">
        </form>
    </div>
</body>
</html>

<?php
if(isset($_POST['view'])){
$conn = mysqli_connect('localhost', 'root', 'root', 'task2');

$query1 = "Select * from user";
$result = mysqli_query($conn,$query1);

if(mysqli_num_rows($result)>0){
   echo "<table border=2 align=center>
        <thead>
        <tr>        
        <th>ID</th>
        <th>Username</th>
        <th>Email</th>
        <th>Full name</th>
        <th>City</th>
       
        <th>Update_Data</th>
        <th>Delete_Data</th>
        <th>View_Data</th>
        </tr>
    </thead> <tbody>";
    while($row = mysqli_fetch_assoc($result)){
       echo "<tr>
            <td>".$row['id']."</td>
            <td>".$row['username']."</td>
            <td>".$row['email']."</td>
            <td>".$row['fullname']."</td>

            <td>".$row['city']."</td>
            
            <td> <a href=update.php?id=$row[id]>Edit</a></td>
            <td> <a href=delete.php?id=$row[id]>Delete</a></td>
            <td> <a href=profile.php?id=$row[id]>View</a></td>
            
             </tr>";
    }
    echo "</tbody>
            </table>";

            echo "<div class='back_btn'>";
            echo "<button><a href='dash.php'>Back</a></button>";
            echo "</div>";
}
}
?>
<?php 

if(isset($_POST['logout'])){

session_start(); 
session_unset(); 
session_destroy(); 

header("Location: login.php");
exit();
 }
?>

