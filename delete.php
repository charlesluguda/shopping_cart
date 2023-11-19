<?php
session_start();
require_once('connection.php');

if (isset($_GET['m'])) {
    $sn = $_GET['m'];

    // Retrieve the user information before deleting
    $selectQuery = "SELECT `Fullname`, `Email` FROM `users` WHERE Sno = '$sn'";
    $selectResult = mysqli_query($conn, $selectQuery);

    if ($selectResult && mysqli_num_rows($selectResult) > 0) {
        $userData = mysqli_fetch_assoc($selectResult);
        $name = $userData['Fullname'];    
        $email = $userData['Email'];

        // Delete the user
        $deleteQuery = "DELETE FROM `users` WHERE Sno = '$sn'";
        $deleteResult = mysqli_query($conn, $deleteQuery);

        if ($deleteResult) {
            // Insert the log entry
            $logsQuery = "INSERT INTO `logs`(`id`,`Name`, `Email`, `Activity`) VALUES ('','$name', '$email', 'Deleted')";
            $logsResult = mysqli_query($conn, $logsQuery);

            if ($logsResult) {
                header("location: index.php");
                exit();
            } else {
                echo "Failed to insert log entry: " . mysqli_error($conn);
            }
        } else {
            echo "Failed to delete user: " . mysqli_error($conn);
        }
    } else {
        echo "User not found.";
    }
}
?>
