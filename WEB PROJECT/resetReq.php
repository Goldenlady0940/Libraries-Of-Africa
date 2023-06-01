<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>forget</title>
    
    <script src="include.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"
     integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
     <link rel="stylesheet" href="forget.css">
</head>
<body>
<?php


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';


error_reporting(E_ALL);
ini_set('display_errors', 1);

if (isset($_POST["resetReq"])) {
    $select = bin2hex(random_bytes(8));
    $token = random_bytes(32);

    $url = "http://localhost/WEB%20PROJECT/forget.php/reset.php?select=" . $select . "&validator=" . bin2hex($token);
    $exp = date("U") + 2000;

    require "connect.php";

    $userEmail = $_POST["email"];

    $sql = "DELETE FROM pwdReset WHERE pwdResetEmail=?";
    $stmt = mysqli_stmt_init($con);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo "There is an error!!!";
        exit();
    } else {
        mysqli_stmt_bind_param($stmt, "s", $userEmail);
        mysqli_stmt_execute($stmt);
    }

    $sql = "INSERT INTO pwdReset(pwdResetEmail,pwdResetSelect,pwdResetToken,pwdResetExp) VALUES (?,?,?,?);";
    $stmt = mysqli_stmt_init($con);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo "There is an error!!!";
        exit();
    } else {
        $hashedToken = password_hash($token, PASSWORD_DEFAULT);
        mysqli_stmt_bind_param($stmt, "ssss", $userEmail, $select, $hashedToken, $exp);
        mysqli_stmt_execute($stmt);
    }
    mysqli_stmt_close($stmt);
    mysqli_close($con);

    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'enuahmed68@gmail.com';
    $mail->Password = 'xxkkmlcoeoqxryct';
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;
    $mail->SMTPDebug = 2;

    $mail->setFrom('enuahmed68@gmail.com', 'Libraries of Africa');
    $mail->addAddress($userEmail);
    $mail->Subject = 'Reset your password for Libraries of Africa';
    $mail->isHTML(true);
    $mail->Body = '<p>You recieved a password reset request. The link to reset your password is below. If you did not make this request, you can ignore this email.</p>';
    $mail->Body .= '<p>Here is your password reset link: <br>';
    $mail->Body .= '<a href="' . $url . '">' . $url . '</a></p>';
    if ($mail->send()) {
        echo "Email sent successfully";
    } else {
        echo "Error sending email: " . $mail->ErrorInfo;
    }
} else {
    header("Location:loginpage.php");
}
?>

</body>
</html>
