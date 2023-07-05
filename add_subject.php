<?php
$conn = new mysqli("localhost", "root", "root", "task2");
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $subject_name = $_POST["subject_name"];

  $sql = "INSERT INTO subjects (subject_name) VALUES ('$subject_name')";
  if ($conn->query($sql) === TRUE) {
    echo "Subject added successfully!";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

  $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add Subject</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f4f4f4;
      margin: 0;
      padding: 20px;
    }
    
    h1 {
      color: #333;
      margin-bottom: 20px;
    }
    
    form {
      background-color: #fff;
      padding: 20px;
      border-radius: 5px;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }
    
    label {
      display: block;
      margin-bottom: 10px;
    }
    
    input[type="text"] {
      padding: 10px;
      width: 100%;
      border: 1px solid #ccc;
      border-radius: 3px;
    }
    
    input[type="submit"] {
      padding: 10px 20px;
      background-color: #4caf50;
      color: #fff;
      border: none;
      border-radius: 3px;
      cursor: pointer;
    }
    
    input[type="submit"]:hover {
      background-color: #45a049;
    }
  </style>
</head>
<body>
<h1>Add Subject</h1>
<form method="POST" action="">
  <label for="subject_name">Subject Name:</label>
  <input type="text" name="subject_name" required><br><br>
  <input type="submit" value="Add Subject"><br>
</form>
<br>
<h1>Edit Subject</h1>
<form method="POST" action="edit_subject.php">
  <label for="subjectName">Subject Id:</label>
  <input type="text" name="id" value="<?php echo $id; ?>"><br><br>
  <label for="subjectName">Subject Name:</label>
  <input type="text" name="subject_name" value="<?php echo $subject_name; ?>" required><br><br>
  <input type="submit" value="Update Subject">
</form>
<br>
<h1>Delete Subject</h1>
<form method="POST" action="delete_subject.php">
  <label for="subjectName">Subject Id:</label>
  <input type="text" name="id" value="<?php echo $id; ?>"><br><br>
  <label for="subjectName">Subject Name:</label>
  <input type="text" name="subject_name" value="<?php echo $subject_name; ?>" required><br><br>
  <input type="submit" value="Delete Subject">
</form>

</body>
</html>
