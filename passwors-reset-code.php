<?php 
session_start();
require_once('connection.php');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'PHPMailerAutoload.php';



function send_password_reset($get_email,$token,$mail){

        //Create an instance; passing `true` enables exceptions
        $mail = new PHPMailer(true);
        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'charlesluguda6@gmail.com';                     //SMTP username
        $mail->Password   = '***';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    
        //Recipients
        $mail->setFrom('charlesluguda6@gmail.com','$mail');
        $mail->addAddress($get_email);     //Add a recipient
    
        //Attachments
        $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
        $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

            //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Reset Passord Notification';
        $mail->Body    = '<a href="http://localhost/shopping_cart/forget_pass.php/update_pass.php?Token=$token$Email=$get_email">Click Me!</a>';
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

}

if(isset($_POST['forgetpass'])){
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $token = md5(rand());
    $sql ="SELECT Email FROM Users WHERE Email = '$email'";
    $query = mysqli_query($conn=mysqli_connect('localhost','root','','shoppingcart'), $sql);
    if(mysqli_num_rows($query)>0){
        $row = mysqli_fetch_array($query);
        //$get_name = $row["Fullname"];
        $get_email = $row['Email'];
        $updatetoken = "UPDATE Users SET Token = '$token' WHERE Email = '$get_email' LIMIT 1";
        $updatetoken_run = mysqli_query($conn, $updatetoken);
        if($updatetoken_run){
            $mail = new PHPMailer(true);
            send_password_reset($get_email,$token,$mail);
            $_SESSION['status'] = "We emailed you a token,";
            header("location:forget_pass.php");
            exit(0);

        }else{
            $_SESSION['status'] = "Something Went Wrong. #1";
            header("location:forget_pass.php");
            exit(0);
        }

    }else{
        $_SESSION['status'] = "No Email Found";
        header("location:forget_pass.php");
        exit(0);
    }
}
?>