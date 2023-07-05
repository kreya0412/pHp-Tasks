<?php
$id = $_GET['id'];

$conn = mysqli_connect('localhost', 'root', 'root', 'task2');
if ($conn) {
    $sql = "SELECT * FROM `user` WHERE id='$id'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        echo "<h2>User Profile</h2>";
        echo "<table class='profile-table'>";
        echo "<tr><th>Field</th><th>Value</th></tr>";
        echo "<tr><td>Username:</td><td>" . $row['username'] . "</td></tr>";
        echo "<tr><td>Email:</td><td>" . $row['email'] . "</td></tr>";
        echo "<tr><td>Full Name:</td><td>" . $row['fullname'] . "</td></tr>";
        echo "<tr><td>City:</td><td>" . $row['city'] . "</td></tr>";
        echo "</table>";
    } else {
        echo "User data not found.";
    }
} else {
    echo "Failed to connect to the database.";
}
?>

<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 20px;
        background-color: #f2f2f2;
    }

    h2 {
        text-align: center;
        margin-bottom: 20px;
        color: #333;
    }

    .profile-table {
        width: 400px;
        margin: 0 auto;
        border-collapse: collapse;
        background-color: #fff;
        border: 1px solid #ccc;
        border-radius: 5px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
    }

    .profile-table th,
    .profile-table td {
        padding: 10px;
        text-align: left;
    }

    .profile-table tr:nth-child(even) {
        background-color: #f9f9f9;
    }

    .profile-table th {
        background-color: #e0e0e0;
        font-weight: bold;
    }
</style>
