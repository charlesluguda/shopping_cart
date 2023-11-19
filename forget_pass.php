<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Anton&family=Cinzel:wght@500&family=Montserrat:wght@300;700&family=Permanent+Marker&family=Poppins:wght@300;400;500;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="forget_pass.css">
    <title>Forgot Password</title>
</head>
<body>
    <form action="passwors-reset-code.php" method="post">
<div class="container">
        <h1>Forgot Your Passord ?</h1>
        <p>We will email to instruct how to reset your password</p>
        <div class="details">
            <label for="email">Email:</label>
        <input type="email" name="email" id="email"> <br>
        <button type="submit" name="forgetpass" >Reset Password</button>
        </div>
</div>
    </form>
</body>
</html>