<?php
include 'db.php';
$id=$_GET['id'];
mysqli_query($conn,"DELETE FROM `periods` WHERE `period_id`='$id'"); 
header('location:period.php');

?>