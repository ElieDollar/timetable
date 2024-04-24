<?php
include 'db.php';
$id=$_GET['id'];
mysqli_query($conn,"DELETE FROM `courses` WHERE `course_id`='$id'"); 
header('location:course.php');

?>