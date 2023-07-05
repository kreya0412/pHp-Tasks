<?php
$conn = mysqli_connect('localhost', 'root', 'root', 'task2');

$query1 = "SELECT * FROM user";
$result = mysqli_query($conn, $query1);

if (mysqli_num_rows($result) > 0) {
    echo "<table border='2' align='center' style='border-collapse: collapse; width: 100%;'>";
    echo "<thead>
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Email</th>
            <th>Full Name</th>
            <th>City</th>
            <th>Update Data</th>
            <th>Delete Data</th>
            <th>View Data</th>
        </tr>
    </thead>
    <tbody>";

    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
            <td style='padding: 10px;'>".$row['id']."</td>
            <td style='padding: 10px;'>".$row['username']."</td>
            <td style='padding: 10px;'>".$row['email']."</td>
            <td style='padding: 10px;'>".$row['fullname']."</td>
            <td style='padding: 10px;'>".$row['city']."</td>
            <td style='padding: 10px; text-align: center;'><a href='update.php?id=".$row['id']."' style='text-decoration: none; color: #fff; background-color: #007bff; padding: 5px 10px; border-radius: 3px;'>Edit</a></td>
            <td style='padding: 10px; text-align: center;'><a href='delete.php?id=".$row['id']."' style='text-decoration: none; color: #fff; background-color: #dc3545; padding: 5px 10px; border-radius: 3px;'>Delete</a></td>
            <td style='padding: 10px; text-align: center;'><a href='profile.php?id=".$row['id']."' style='text-decoration: none; color: #fff; background-color: #28a745; padding: 5px 10px; border-radius: 3px;'>View</a></td>
        </tr>";
    }

    echo "</tbody>
    </table>";

    echo "<div class='back_btn' style='text-align: center; margin-top: 20px;'>
        <button><a href='dash.php' style='text-decoration: none; color: #fff; background-color: #333; padding: 5px 10px; border-radius: 3px;'>Back</a></button>
    </div>";
}

mysqli_close($conn);
?>
