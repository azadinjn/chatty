<?php
session_start();
require "../config/config.php";
if(isset($_POST['email'],$_POST['password']) && !empty($_POST['email']) && !empty($_POST['password'])){
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    if(filter_var($email, FILTER_VALIDATE_EMAIL) && strlen($password) >= 8){
            $stmt = $chatty->prepare("SELECT * FROM users WHERE email = ?"); 
            $stmt->execute([$email]);
            $user = $stmt->fetch();
            if($user){
                    if(password_verify($password, $user['password'])){
                        header("location:../pages/homePage.php");
                        exit();
                    }else{
                        header("location:../pages/loginForm.php?msg=Password incorrect");
                        exit();
                    }
            }else{
                header("location:../pages/loginForm.php?msg=this email not exist");
                exit();
            }
    }else{
        header("location:../pages/loginForm.php?msg=wrong information");
        exit();
    }
}else{
    header("location:../pages/loginForm.php?msg=entry information");
    exit();
}
    
?>