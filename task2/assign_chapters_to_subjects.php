<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $subjectId = $_POST['subject_name'];
    $chapterIds = $_POST['chapter_name'];

    $host = 'localhost';
    $username = 'root';
    $password = 'root';
    $database = 'task2';

    $conn = mysqli_connect($host, $username, $password, $database);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    foreach ($chapterIds as $chapterId) {
        $query = "UPDATE chapters SET subject_id = '$subjectId' WHERE id = '$chapterId'";
        mysqli_query($conn, $query);
    }

    mysqli_close($conn);

    echo "Chapters assigned successfully!";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assign Chapters to Subjects</title>
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
        <h1>Assign Chapters to Subjects</h1>

        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <label for="subject">Select Subject:</label>
            <select name="subject_name" id="subject">
                <?php
                $host = 'localhost';
                $username = 'root';
                $password = 'root';
                $database = 'task2';

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

            <label for="chapters">Select Chapters:</label>
            <select name="chapter_name[]" id="chapters" multiple>
                <?php
                $conn = mysqli_connect($host, $username, $password, $database);
                if (!$conn) {
                    die("Connection failed: " . mysqli_connect_error());
                }

                $query = "SELECT * FROM chapters";
                $result = mysqli_query($conn, $query);

                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<option value="' . $row['id'] . '">' . $row['chapter_name'] . '</option>';
                }

                mysqli_close($conn);
                ?>
            </select>

            <button type="submit">Assign Chapters</button>
        </form>
    </div>
</body>
</html>
