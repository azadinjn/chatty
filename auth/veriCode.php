<?php
session_start();
require "../config/config.php";
$name=$_SESSION['name'];
$email=$_SESSION['email'];
$password=$_SESSION['password'];
if (isset($_POST["code"])&&!empty($_POST["code"])) {
    $code = htmlspecialchars(trim($_POST['code']));
    if ($_SESSION['code']==$code) {
    $sql = "INSERT INTO users(name, email, password) VALUES('$name', '$email', '$password')";
    $result = mysqli_query($conn, $sql);
    header("location:../pages/loginForm.php");
    exit();
    }else{
        header("location:../pages/veriForm.php?msg=wrong code");
        exit();
    }
}else{
    header("location:../pages/veriForm.php?msg=entry code");
    exit();
}
?>