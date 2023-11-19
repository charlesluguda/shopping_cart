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
    if(isset($_POST['register'])){
        $fn = $_POST['fname'];
        $em = $_POST['email'];
        $ad = $_POST['address'];
        $pass=password_hash($_POST["password"],PASSWORD_DEFAULT);
        $phone = $_POST['phone'];

        $sql = "INSERT INTO `users`(`Fullname`, `Email`, `Address`, `Password`, `Phone number`)
         VALUES ('$fn','$em','$ad','$pass','$phone')";
         $query = mysqli_query($conn, $sql);
         if($query){
            header("location:index.php");
            echo "";
         } else{
            echo "Failed";
         }
    }
    ?>
    <div class="container">
        <h1>Registration Form</h1>
        <form action="" method="post">
            <div>
            <label for="fullname">Fullname:</label>
            <input type="text" name="fname" id="fullname" placeholder="Enter your name">
            </div>
            <div>
            <label for="u_email">Email:</label>
            <input type="text" name="email" id="u_email" placeholder="Email">
            </div>
            <div>
            <label for="u_address">Address:</label>
            <input type="text" name="address" id="u_address" placeholder="Enter your address">
            </div>
            <div>
            <label for="u_password">Password:</label>
            <input type="password" required minlength="4" name="password" id="u_password" placeholder="Enter your password" >
            </div>
            <div>
            <label for="phone_number">Phone Number:</label>
            <input type="text" name="phone" id="phone_number" placeholder="Enter phone number">
            </div>
            <input class="btn" type="submit" name="register" value="REGISTER">
        </form>
    </div>
</body>
</html>