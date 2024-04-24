
<?php
session_start();
include 'db.php';
$id=$_GET['id'];
if(isset($_POST['update'])){
    $coursename = $_POST['coursename'];
    $details = $_POST['details'];

    

    $sql = "UPDATE `courses` SET `coursename`='$coursename',`details`='$details' WHERE course_id='$id'";
    $result = mysqli_query($conn,$sql);
    if($result){
        header('location:course.php');
    }

}
$sql = "SELECT * from courses where course_id = '$id'";
$result = mysqli_query($conn,$sql);
if($result -> num_rows > 0){
    while($row = $result -> fetch_assoc()){
        $coursename = $row['coursename'];
        $details = $row['details'];
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>course</title>
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
    <div class="form">
        <h3>ADD NEW COURSE</h3>
    <form action="" method="post">
        <label for="">course name</label>
        <input type="text" name="coursename"required value="<?php echo  $coursename ?>"><br><br>

        <label for="">details</label>
        <input type="text" name="details"required value=" <?php echo $details; ?> "><br>

        <input type="submit" value="update" name="update">

    </form>

    </div>
</body>
</html>