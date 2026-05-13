<?php
session_start();
require '../vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
require "../config/config.php";

if(isset($_POST['name'],$_POST['email'],$_POST['password'])){
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $password = htmlspecialchars(trim($_POST['password']));

    if(!empty($name) || !empty($email) || !empty($password)){
        if(preg_match("/^[a-zA-Z ]+$/", $name) && filter_var($email, FILTER_VALIDATE_EMAIL) && strlen($password) >= 8){
            $sql_emails = $chatty->prepare("SELECT * FROM users WHERE email = ?"); 
            $sql_emails->execute([$email]);
            if($sql_emails->rowCount() > 0){
                header("location:../pages/singUpForm.php?msg=this email already exist");
                exit();
            }else{   
                $sql_names = $chatty->prepare("SELECT * FROM users WHERE `name` = ?"); 
                $sql_names->execute([$name]);
                if($sql_names->rowCount() > 0){
                    header("location:../pages/singUpForm.php?msg=this name already exist");
                    exit();
                }else{
                $code = random_int(100000, 999999);
                $_SESSION['code'] = $code;
                $_SESSION['name'] = $name;
                $_SESSION['email'] = $email;
                $_SESSION['password'] = password_hash($password, PASSWORD_DEFAULT);
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
                $mail->Subject = 'Verification Code';
                $mail->Body = "Your code is: $code";
                $mail->send();
                header("location:../pages/veriForm.php");
                }}

        }else{
            header("location:../pages/singUpForm.php?msg=wrong information");
            exit();
        }
    }else{
        header("location:../pages/singUpForm.php?msg=entry information");
        exit();
    }
}

?>