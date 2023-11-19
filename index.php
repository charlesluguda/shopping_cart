<?php 
session_start(); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="css/login_style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Anton&family=Cinzel:wght@500&family=Montserrat:wght@300;700&family=Permanent+Marker&family=Poppins:wght@300;400;500;700&display=swap" rel="stylesheet">
<link rel="preconnect" href="https://fonts.googleapis.com">
</head>
<body>
    <?php 
     
     if(isset($_POST['submit'])){
        require_once('connection.php');
        $em = $_POST['Email'];
        $pass = $_POST['Password'];
        if(!empty($em) && !empty($pass)){
            $sql = "SELECT * FROM `users` WHERE Email = '$em'";
            $query = mysqli_query($conn, $sql);
            if($query->num_rows>0){
                $row = mysqli_fetch_array($query);
                if(password_verify($_POST['Password'],$row['Password'])){
                    $_SESSION['user'] = $row['Sno'];
                    $admin = $row['Admin'];
                    if($admin == 'admin'){
                    header("location:customer_list.php");
                    }else{
                        header("location:shop/shopp.php");
                    }
                }else{
                    echo "Wrong Password";
                }
            }else{
                echo "No such Account";

            }
        }else{
            echo "Fill all fields";
        }
     }

    ?>
    <div class="container">
        <form action="" method="post">
            <h1>Login</h1>
            <div class="login">
                <label for="l_username">Username:</label>
                <input type="email" name="Email" id="l_username">
            </div>
            <div class="login">
                <label for="l_password">Password:</label>
                <input type="password" name="Password" id="l_password">
            </div>
            <input class="btn" type="submit" value="LOGIN" name="submit">
            <p>New user <a href="registration.php">Sign Up</a></p>
            <p><a href="forgot-password.php">Forgot Password</a></p>
        </form>
    </div>
</body>
</html>