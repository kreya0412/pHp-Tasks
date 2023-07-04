<?php
if (isset($_GET['id'])) {
    $conn = mysqli_connect('localhost', 'root', 'root', 'task2');

    $id = $_GET['id'];

    $sql = "DELETE FROM user WHERE id = $id";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo "User deleted successfully.";
    } else {
        echo "Error deleting user: " . mysqli_error($conn);
    }
}
?>
