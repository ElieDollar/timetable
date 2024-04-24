<?php
include 'db.php';
$id=$_GET['id'];
mysqli_query($conn,"DELETE FROM `classroom` WHERE `class_id`='$id'"); 
header('location:classroom.php');

?>