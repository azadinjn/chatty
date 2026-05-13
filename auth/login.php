<?php
session_start();
require "../config/config.php";
if(isset($_POST['email'],$_POST['password']) && !empty($_POST['email']) && !empty($_POST['password'])){
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    if(filter_var($email, FILTER_VALIDATE_EMAIL) && strlen($password) >= 8){
            $sql = "SELECT * FROM users WHERE email='$email'";
            $result = mysqli_query($conn, $sql);
            if(mysqli_num_rows($result) > 0){
                    $user = mysqli_fetch_assoc($result);
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