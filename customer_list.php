<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer List</title>
    <link rel="stylesheet" href="table_css.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Anton&family=Cinzel:wght@500&family=Montserrat:wght@300;700&family=Permanent+Marker&family=Poppins:wght@300;400;500;700&display=swap" rel="stylesheet">
</head>
<body>
 <h2>List of Registered Customers</h2>
    <table>
        <tr>
            <th>Sno</th>
            <th>Fullname</th>
            <th>Email</th>
            <th>Address</th>
            <th>Phone number</th>

            <?php 
            //session_start();
            require_once('connection.php');
            $sql = "SELECT * FROM `users` WHERE Admin = 'user'";
            $query = mysqli_query($conn, $sql);
            $n = 1;
            if($query){
                while($row = mysqli_fetch_array($query)){
                    $fn = $row['Fullname'];
                    $em = $row['Email'];
                    $add = $row['Address'];
                    $phone = $row['Phone number'];

                    echo "<tr>";
                    echo "<td>$n</td>";
                    echo "<td>$fn</td>";
                    echo "<td>$em</td>";
                    echo "<td>$add</td>";
                    echo "<td>$phone</td>";
                    echo "</tr>";
                    $n++;
                }
            }
            ?>
        </tr>
    </table>
    <button class="btn"><a href="fpdf/listcustomerpdf.php" style="font-size: 15px; text-decoration: none; color: black;" >Print</a></button>
    
    <table style="margin-top: 30px">
        <h2>User Activity (Account Deleted)</h2>
        <thead></thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Activity</th>
            
            <?php 
            //session_start();
            require_once('connection.php');
            $sql = "SELECT * FROM `logs`";
            $query = mysqli_query($conn, $sql);
            $n = 1;
            if($query){
                while($row = mysqli_fetch_array($query)){
                    $fn = $row['Name'];
                    $em = $row['Email'];
                    $add = $row['Activity'];
                    

                    echo "<tr>";
                    echo "<td>$fn</td>";
                    echo "<td>$em</td>";
                    echo "<td style='color:red'>$add</td>";
                    echo "</tr>";
                    $n++;
                }
            }
            ?>
        </tr>
    </table>
    <button class="btn"><a href="logout.php" style="font-size: 15px; text-decoration: none; color: black;" >Logout</a></button>
    <!--<input class="btn" type="button" value="PRINT" name="print"> -->
</body>
</html>