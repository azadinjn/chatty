<?php
session_start();
require "../config/config.php";
require '../vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
if(isset($_POST['email']) || !empty($_POST['email'])){
    $email=$_POST['email'];
    $stmt = $chatty->prepare("SELECT * FROM users WHERE email = ?"); 
    $stmt->execute([$email]);     
    if ($stmt->rowCount() > 0) {
        $code = random_int(100000, 999999);
        $_SESSION['code'] = $code;
        $_SESSION['email'] = $email;
        $mail = new PHPMailer(true);
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'jananeazadin@gmail.com';
        $mail->Password = 'xywwjcvbezvmasjg';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;
        $mail->setFrom('jananeazadin@gmail.com', 'Chatty');
        $mail->addAddress($email);
        $mail->Subject = 'rest your password';
        $mail->Body = "Your rest code is: $code";
        $mail->send();
        header("location:../auth/veriRestCode.php");
        exit(); 
    }else {
        header("location:restPassword.php?msg=this email not exist");
        exit();
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CHATTY</title>
</head>
<body>
    <form action="restPassword.php" method="post"  >
        <input type="email" name="email">
        <input type="submit" value="check">
        <p><?php if (isset($_GET["msg"])) {echo $_GET["msg"];}?></p>
    </form>
</body>
</html>
