
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