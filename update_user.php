
<?php
session_start();
include 'db.php';
$id=$_GET['id'];
if(isset($_POST['update'])){
    $username = $_POST['username'];
    $tel=$_POST['tel'];
    $email=$_POST['email'];
    $address = $_POST['address'];

    

    $sql = "UPDATE `users` SET `username`='$username',`tel`='$tel',`email`='$email',`address`='$address' WHERE user_id='$id'";
    $result = mysqli_query($conn,$sql);
    if($result){
        header('location:index.php');
    }

}
$sql = "SELECT * from users where user_id = '$id'";
$result = mysqli_query($conn,$sql);
if($result -> num_rows > 0){
    while($row = $result -> fetch_assoc()){
        $username = $row['username'];
        $tel=$row['tel'];
        $email=$row['email'];
        $address = $row['address'];
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="logo">
    <h4>E-TIMETABLE</h4>
    </div>
    <div class="nav">
        <ul>
            <a href="index.php">Add user</a>
            <a href="course.php">Add course</a>
            <a href="period.php">Add period</a>
            <a href="classroom.php" >Add class</a>
            <a href="timetable.php">Add timetable</a>
            
        </ul>
    </div>
    <div class="container">
    <div class="form">
        <h3>UPDATE USER</h3>
    <form action="" method="post">
        <label for="">username</label>
        <input type="text" name="username"required value="<?php echo $username;?>">

        <label for="">telephone</label>
        <input type="number" name="tel"required value="<?php echo $tel;?>">
        <label for="">email</label>
        <input type="email" name="email"required value="<?php echo $email;?>">

        <label for="">address</label>
        <input type="text" name="address"required value="<?php echo $address;?>">
        <input type="submit" value="update" name="update">

    </form>

    </div>
</html>