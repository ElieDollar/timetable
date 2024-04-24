
<?php
session_start();
include 'db.php';
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
        <input type="text" name="coursename"required>

        <label for="">details</label>
        <input type="text" name="details"required>

        <input type="submit" value="add course" name="addcourse">

    </form>
    <?php
    if(isset($_POST['addcourse'])){
        $coursename=$_POST['coursename'];
        $details=$_POST['details'];
        $sql="INSERT INTO `courses`(`course_id`, `coursename`, `details`) 
        VALUES ('','$coursename','$details')";
         if(mysqli_query($conn,$sql)){
            echo "new course added successfully!";
         }
         else{
            echo" not added,try again!";
         }
    }
    ?>
    </div>
    <div class="table">
    <table>
                    <tr>
                        <th>#</th>
                        <th>coursename</th>
                        <th>details</th>
                        <th>action</th>
                    </tr>
                    <?php
                    $q="select *from courses";
                    $id=1;
                    $rs=mysqli_query($conn,$q);
                    while ($rows=mysqli_fetch_array($rs)){ ?>
                    <tr>
                            <td><?php echo $id++?></td>
                            <td><?php echo $rows[1];?></td>
                            <td><?php echo $rows[2];?></td>
                            <td class="actions"><a class="update" href="update_course.php?id=<?php echo $rows['course_id']?>">update</a>
                                <a class="delete" href="delete_course.php?id=<?php echo $rows['course_id']?>">delete</a>
                        </td>
                            
                        </tr>
                    <?php } ?>
                </table>

    </div>
</body>
</html>