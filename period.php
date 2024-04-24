
<?php
session_start();
include 'db.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>period</title>
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
        <h3>ADD NEW PERIOD</h3>
    <form action="" method="post">
        <label for="">date</label>
        <input type="date" name="date"required>

        <label for="">start</label>
        <input type="time" name="start"required>
        <label for="">end</label>
        <input type="time" name="end"required>

        <label for="">details</label>
        <input type="text" name="details"required>

        <input type="submit" value="add period" name="addperiod">

    </form>
    <?php
    if(isset($_POST['addperiod'])){
        $date=$_POST['date'];
        $start=$_POST['start'];
        $end=$_POST['end'];
        $details=$_POST['details'];
        $sql="INSERT INTO `periods`(`period_id`, `date`,`start`,`end`, `details`) 
        VALUES ('','$date','$start','$end','$details')";
         if(mysqli_query($conn,$sql)){
            echo "new period added successfully!";
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
                        <th>date</th>
                        <th>start</th>
                        <th>end</th>
                        <th>details</th>
                        <th>action</th>
                    </tr>
                    <?php
                    $q="select *from periods";
                    $id=1;
                    $rs=mysqli_query($conn,$q);
                    while ($rows=mysqli_fetch_array($rs)){ ?>
                    <tr>
                            <td><?php echo $rows[0];?></td>
                            <td><?php echo $rows[1];?></td>
                            <td><?php echo $rows[2];?></td>
                            <td><?php echo $rows[3];?></td>
                            <td><?php echo $rows[4];?></td>
                            
                            <td class="actions">
                                <a class="update" href="update_period.php?id=<?php echo $rows['period_id']?>">update</a>
                                <a class="delete" href="delete_period.php?id=<?php echo $rows['period_id']?>">delete</a>
                        </td>
                            
                        </tr>
                    <?php } ?>
                </table>

    </div>
    </div>
</body>
</html>