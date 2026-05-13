<?php
session_start();
require "../config/config.php";
$email = $_SESSION['email'];
if(isset($_POST['newPassword']) || !empty($_POST['newPassword'])){
        if (strlen($_POST['newPassword']) >= 8) {
                $newpassword = password_hash($_POST['newPassword'], PASSWORD_DEFAULT);
                $stmt = $chatty->prepare("UPDATE users SET `password` = ? WHERE email = ?"); 
                $stmt->execute([$newpassword,$email]); 
                header("location:../pages/loginForm.php");
                exit();
        }else{
                header("location:newPassword.php?msg=must be more then 8 letters or numbers");
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
    <form action="newPassword.php" method="post"  >
        <input type="password" name="newPassword">
        <input type="submit" value="save">
        <p><?php if (isset($_GET["msg"])) {echo $_GET["msg"];}?></p>
    </form>
</body>
</html>
