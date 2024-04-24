
<?php
session_start();
include 'db.php';
$id=$_GET['id'];
if(isset($_POST['update'])){
    $classname = $_POST['class_name'];
    $details = $_POST['details'];

   

    $sql = "UPDATE `classroom` SET `class_name`='$classname',`details`='$details' WHERE class_id='$id'";
    $result = mysqli_query($conn,$sql);
    if($result){
        header('location:classroom.php');
    }

}
$sql = "SELECT * from classroom where class_id = '$id'";
$result = mysqli_query($conn,$sql);
if($result -> num_rows > 0){
    while($row = $result -> fetch_assoc()){
        $classname = $row['class_name'];
        $details = $row['details'];
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>classroom</title>
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
        <h3>ADD NEW CLASS</h3>
    <form action="" method="post">

        <label for="">class name</label>
        <input type="text" name="class_name" required  value="<?php echo $classname; ?>">

        <label for="">details</label>
        <input type="text" name="details" required value="<?php echo $details; ?>">

        <input type="submit" value="update" name="update">

    </form>
   
    </div>
   
    </div>
</body>
</html>