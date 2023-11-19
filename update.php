
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link rel="stylesheet" href="css/register_style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Anton&family=Cinzel:wght@500&family=Montserrat:wght@300;700&family=Permanent+Marker&family=Poppins:wght@300;400;500;700&display=swap" rel="stylesheet">
</head>
<body>
<?php 
session_start();
require_once('connection.php');
$sn = $_GET['m'];
$sql = "SELECT * FROM `users` WHERE Sno = '$sn'";
$query = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($query);

$fn = $row['Fullname'];
$em = $row['Email'];
$add = $row['Address'];
$phone = $row['Phone number'];

if(isset($_POST['update'])){
    $fn = $_POST['fname'];
    $em = $_POST['email'];
    $add = $_POST['address'];
    $phone = $_POST['phone'];

    $sql = "UPDATE `users` SET `Fullname`='$fn',`Email`='$em',`Address`='$add',`Phone number`='$phone' WHERE Sno = '$sn'";
    $query = mysqli_query($conn, $sql);
    if($query){
        header("location:profile.php");
    }else{
        echo "Failed";
    }
}

?>
    <div class="container">
        <h1>Edit Your Information</h1>
        <form action="" method="post">
            <div>
            <label for="fullname">Fullname:</label>
            <input type="text" name="fname" id="fullname" placeholder="Enter your name" value="<?php echo $fn; ?>">
            </div>
            <div>
            <label for="u_email">Email:</label>
            <input type="text" name="email" id="u_email" placeholder="Email" value="<?php echo $em; ?>">
            </div>
            <div>
            <label for="u_address">Address:</label>
            <input type="text" name="address" id="u_address" placeholder="Enter your address" value="<?php echo $add; ?>">
            </div>
            <div>
            <div>
            <label for="phone_number">Phone Number:</label>
            <input type="text" name="phone" id="phone_number" placeholder="Enter phone number" value="<?php echo $phone; ?>">
            </div>
            <input class="btn" type="submit" name="update" value="UPDATE">
        </form>
    </div>
</body>
</html>
</body>
</html>