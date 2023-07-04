<?php
// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Process the form data
    $standardId = $_POST['standard_id'];
    $subjectIds = $_POST['subject_ids'];

    // Connect to the database
    $host = 'localhost';
    $username = 'root';
    $password = 'root';
    $database = 'task2';

    $conn = mysqli_connect($host, $username, $password, $database);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Assign subjects to the standard
    foreach ($subjectIds as $subjectId) {
        $query = "INSERT INTO standard_subjects (standard_id, subject_id) VALUES ('$standardId', '$subjectId')";
        mysqli_query($conn, $query);
    }

    // Close the database connection
    mysqli_close($conn);

    // Display a success message or redirect to another page
    echo "Subjects assigned successfully!";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assign Subjects to Standards</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }

        .container {
            max-width: 500px;
            margin: 50px auto;
            padding: 20px;
            background-color: #f5f5f5;
            border-radius: 5px;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
        }

        select,
        button {
            display: block;
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        button {
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
        }

        .success-message {
            text-align: center;
            font-weight: bold;
            color: green;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Assign Subjects to Standards</h1>

        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <label for="standard">Select Standard:</label>
            <select name="standard_id" id="standard">
                <?php
                $host = 'localhost';
                $username = 'root';
                $password = 'root';
                $database = 'task2';

                $conn = mysqli_connect($host, $username, $password, $database);
                if (!$conn) {
                    die("Connection failed: " . mysqli_connect_error());
                }

                $query = "SELECT * FROM standards";
                $result = mysqli_query($conn, $query);

                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<option value="' . $row['id'] . '">' . $row['standard_name'] . '</option>';
                }

                mysqli_close($conn);
                ?>
            </select>

            <label for="subjects">Select Subjects:</label>
            <select name="subject_ids[]" id="subjects" multiple>
                <?php
                $conn = mysqli_connect($host, $username, $password, $database);
                if (!$conn) {
                    die("Connection failed: " . mysqli_connect_error());
                }

                $query = "SELECT * FROM subjects";
                $result = mysqli_query($conn, $query);

                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<option value="' . $row['id'] . '">' . $row['subject_name'] . '</option>';
                }

                mysqli_close($conn);
                ?>
            </select>

            <button type="submit">Assign Subjects</button>
        </form>
    </div>
</body>
</html>
