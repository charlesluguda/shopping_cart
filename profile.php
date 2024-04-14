<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link rel="stylesheet" href="profile.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Anton&family=Cinzel:wght@500&family=Montserrat:wght@300;700&family=Permanent+Marker&family=Poppins:wght@300;400;500;700&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container">
    <?php
    //session_start();
        require_once('connection.php');
        $sql = "SELECT * FROM `users`";
        $query = mysqli_query($conn, $sql);
        if($query){
            while($row = mysqli_fetch_array($query)){
                $sn = $row['Sno'];
                $fn = $row['Fullname'];
                $em = $row['Email'];
                $add = $row['Address'];
                $phone = $row['Phone number'];
            }
        }
        ?>
        <div class="profile">
            <img src="css/images/avatar.jpg" alt="user_avatar">
        </div>
        <div class="btn">
            <?php echo"<a href='delete.php?m=$sn'>Delete</a>"; ?>
            <?php echo"<a href='update.php?m=$sn'>Update</a>"; ?>
        </div>
        <div class="details">
            <h3>You Login as </h3>
            <?php echo $fn ?>
            <h3>Email</h3>
            <?php echo $em ?>
            <h3>Address</h3>
            <?php echo $add ?>
            <h3>Phone number</h3>
            <?php echo $phone ?>
        </div>
        <div class="button"><a href="logout.php">Logout</a>
         </div>
        
    </div>
    
</body>
</html>