<?php
session_start();
$code = $_SESSION['code'];
$email = $_SESSION['email'];
if(isset($_POST['code']) || !empty($_POST['code'])){
        if ($code == $_SESSION['code'] ) {
                header("location:newPassword.php");
                exit();
        }else{
                header("location:veriRestCode.php?msg=wrong code");
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
    <?php echo $code ?>
    <form action="veriRestCode.php" method="post"  >
        <input type="text" name="code">
        <input type="submit" value="check">
        <p>we send rest code to this email '<?php echo $email ?>' please entry code:</p>
    </form>
</body>
</html>

