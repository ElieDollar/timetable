
<?php
session_start();
include 'db.php';
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
        <h3>ADD NEW USER</h3>
    <form action="" method="post">
        <label for="">username</label>
        <input type="text" name="username"required>

        <label for="">telephone</label>
        <input type="number" name="tel"required>
        <label for="">email</label>
        <input type="email" name="email"required>

        <label for="">address</label>
        <input type="text" name="address"required>


        <input type="submit" value="add user" name="adduser">

    </form>
    <?php
    if(isset($_POST['adduser'])){
        $username=$_POST['username'];
        $tel=$_POST['tel'];
        $email=$_POST['email'];
        $address=$_POST['address'];
        
        $sql="INSERT INTO `users`(`user_id`, `username`, `tel`, `email`, `address`) 
        VALUES ('','$username','$tel','$email','$address')";
         if(mysqli_query($conn,$sql)){
            echo "new user added successfully!";
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
                        <th>username</th>
                        <th>telephone</th>
                        <th>email</th>
                        <th>address</th>
                        <th>action</th>
                    </tr>
                    <?php
                    $q="select *from users";
                    $id=1;
                    $rs=mysqli_query($conn,$q);
                    while ($rows=mysqli_fetch_assoc($rs)){ ?>
                    <tr>
                            <td><?php echo  $id++;?></td>
                            <td><?php echo $rows['username'];?></td>
                            <td><?php echo $rows['tel'];?></td>
                            <td><?php echo $rows['email'];?></td>
                            <td><?php echo $rows['address'];?></td>
                            
                            
                            <td class="actions">
                         <a class="update" href="update_user.php?id=<?php echo $rows['user_id']?>">Update</a>
                         <a class="delete" href="delete_user.php?id=<?php echo $rows['user_id']?>">Delete</a>
                        </td>

                        </tr>
                    <?php } ?>
                </table>

    </div>
    </div>
</html>