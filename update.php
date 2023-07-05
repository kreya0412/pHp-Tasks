
<?php
$conn = mysqli_connect('localhost', 'root', 'root', 'task2');


$id = $_GET['id'];
   
$query1 = "SELECT * FROM user WHERE id= '$id'";
$result = mysqli_query($conn,$query1);

$row = mysqli_fetch_assoc($result);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }

        form {
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

        input[type="number"],
        input[type="text"],
        input[type="email"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        input[type="submit"] {
            display: block;
            width: 100%;
            padding: 10px;
            margin-top: 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }

        .back_btn {
            text-align: center;
            margin-top: 20px;
        }

        .back_btn a {
            color: #007bff;
            text-decoration: none;
        }
    </style>
</head>
<style>
    
</style>
<body>
    
<form action="" method="post" enctype="multipart/form-data">

<h1>Update Information</h1>

<label>ID :</label>
<input type="number" value="<?php echo $row['id'] ?>" name="id" readonly> <br> <br>

<label>Username :</label>
<input type="text" value="<?php echo $row['username']?>" name="username"> <br> <br>

<label>Email :</label>
<input type="email" value="<?php echo $row['email']?>" name="email"> <br> <br>

<label>Full Name :</label>
<input type="text" value="<?php echo $row['fullname']?>" name="fullname"> <br> <br>

<label>City :</label>
<input type="text" value="<?php echo $row['city']?>" name="city"> <br> <br>


<input type="submit" value="Save changes" name="submit">

<?php

echo "<div class='back_btn'>";
echo "<a href='dash.php'>Back</a>";
echo "</div>";

?>

</form>

</body>
</html>

<?php
$conn = mysqli_connect('localhost','root','root','task2');

if(isset($_POST['submit'])){

    $id = $_POST['id'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $city = $_POST['city'];
    $fullname = $_POST['fullname'];
    
    
    $query3 = "UPDATE user SET id='$id',username='$username',email='$email',city='$city',fullname='$fullname' WHERE id ='$id'";
    $result = mysqli_query($conn,$query3);

    if($result){
        echo "Data has been Updated";
    }
    else{
        echo "Something went wrong".mysqli_error($conn);
    }
}
?>