<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CHATTY</title>
</head>
<body>
    <h1>login</h1>
    <form action="../auth/login.php" method="post" >
        <label for="email">email</label>
        <input type="email" name="email">
        <label for="password">password</label>
        <input type="password" name="password">
        <input type="submit" value="login">
        <p><?php if (isset($_GET["msg"])) {echo $_GET["msg"];}?></p>

    </form>
    <a href="restPassword.php">i forget my password</a>
    <a href="singUpForm.php">creat new account</a>
</body>
</html>