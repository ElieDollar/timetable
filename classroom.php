
<?php
session_start();
include 'db.php';
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
        <input type="text" name="classname"required>

        <label for="">details</label>
        <input type="text" name="details"required>

        <input type="submit" value="add class" name="addclass">

    </form>
    <?php
    if(isset($_POST['addclass'])){
        $classname=$_POST['classname'];
        $details=$_POST['details'];
        $sql="INSERT INTO `classroom`(`class_id`, `class_name`, `details`) 
        VALUES ('','$classname','$details')";
         if(mysqli_query($conn,$sql)){
            echo "new class added successfully!";
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
                        <th>classname</th>
                        <th>details</th>
                        <th>action</th>
                    </tr>
                    <?php
                    $q="select *from classroom";
                    $id=1;
                    $rs=mysqli_query($conn,$q);
                    while ($rows=mysqli_fetch_array($rs)){ ?>
                    <tr>
                            <td><?php echo $id++;?></td>
                            <td><?php echo $rows[1];?></td>
                            <td><?php echo $rows[2];?></td>
                            <td class="actions">
                                <a class="update" href="update_classroom.php?id=<?php echo $rows['class_id']?>">update</a>
                                <a class="delete" href="delete_classroom.php?id=<?php echo $rows['class_id']?>">delete</a>
                        </td>
                            
                        </tr>
                    <?php } ?>
                </table>

    </div>
    </div>
</body>
</html>