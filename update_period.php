
<?php
session_start();
include 'db.php';

$id=$_GET['id'];
if(isset($_POST['update'])){
    $date = $_POST['date'];
    $start=$_POST['start'];
    $end=$_POST['end'];
    $details = $_POST['details'];

   

    $sql = "UPDATE `periods` SET `date`='$date',`start`='$start',`end`='$end',`details`='$details'
    WHERE period_id='$id'";

    $result = mysqli_query($conn,$sql);
    if($result){
        header('location:period.php');
    }

}
$sql = "SELECT * from periods where period_id = '$id'";
$result = mysqli_query($conn,$sql);
if($result -> num_rows > 0){
    while($row = $result -> fetch_assoc()){
        $date = $row['date'];
        $start=$row['start'];
        $end=$row['end'];
        $details = $row['details'];
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>update_period</title>
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
        <h3>UPDATE PERIOD</h3>
    <form action="" method="post">
        <label for="">date</label>
        <input type="date" name="date"required value="<?php echo  $date ?>">

        <label for="">start</label>
        <input type="time" name="start"required value="<?php echo  $start ?>">
        <label for="">end</label>
        <input type="time" name="end"required value="<?php echo  $end ?>">

        <label for="">details</label>
        <input type="text" name="details"required value="<?php echo  $details ?>">

        <input type="submit" value="update" name="update">

    </form>
    
    </div>
    
      
    </div>
</body>
</html>