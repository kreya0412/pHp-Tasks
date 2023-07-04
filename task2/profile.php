<?php
$id = $_GET['id'];

$conn = mysqli_connect('localhost', 'root', 'root', 'task2');
if ($conn) {
    $sql = "SELECT * FROM `user` WHERE id='$id'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        echo "<h2>User Profile</h2>";
        echo "<p>Username: " . $row['username'] . "</p>";
        echo "<p>Email: " . $row['email'] . "</p>";
        echo "<p>Full Name: " . $row['fullname'] . "</p>";
        echo "<p>City: " . $row['city'] . "</p>";
    } else {
        echo "User data not found.";
    }
} else {
    echo "Failed to connect to the database.";
}
?>