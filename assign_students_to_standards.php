<?php
if (isset($_POST['assign'])) {
    $connection = mysqli_connect('localhost', 'root', 'root', 'task2');
    $id = $_POST['id']; 
    $standard_id = $_POST['standard_id']; 
    $query = "INSERT INTO standard_students (standard_id, student_id) VALUES ($id, $standard_id)";
    $result3 = mysqli_query($connection, $query);
    if (!$result3) {
        die('Query Failed' . mysqli_error($connection));
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assign Students to Standards</title>
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
        input[type="submit"] {
            display: block;
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Assign Students to Standards</h1>

        <form action="" method="POST">
            <label for="student">Select Student:</label>
            <select name="id" id="student">
                <?php
                $connection = mysqli_connect('localhost', 'root', 'root', 'task2');
                $query1 = "SELECT user.username, user.id FROM user INNER JOIN userType ON 
                user.id = userType.user_id INNER JOIN accessType ON 
                userType.access_type_id = accessType.id WHERE 
                accessType.name = 'student'";

                $result1 = mysqli_query($connection, $query1);

                foreach ($result1 as $user) : ?>
                    <option value="<?php echo $user['id']; ?>"><?php echo $user['username']; ?></option>
                <?php endforeach; ?>
            </select>

            <label for="standard">Select Standard:</label>
            <select name="standard_id" id="standard">
                <?php
                $connection = mysqli_connect('localhost', 'root', 'root', 'task2');
                $query = "SELECT * FROM standards";
                $result2 = mysqli_query($connection, $query);
                foreach ($result2 as $standards) : ?>
                    <option value="<?php echo $standards['id']; ?>"><?php echo $standards['standard_name']; ?></option>
                <?php endforeach; ?>
            </select>

            <input type="submit" name="assign" value="Assign">
        </form>
    </div>
</body>

</html>
