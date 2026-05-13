<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CHATTY</title>
</head>
<body>
    <h1>singup</h1>
    <form action="../auth/singup.php" method="post"  onsubmit="return valid_singup()">
        <label for="name">name</label>
        <input type="text" id="name" name="name">
        <label for="email">email</label>
        <input type="email" id="email" name="email">
        <label for="password">password</label>
        <input type="password" id="password" name="password">
        <input type="submit" value="singup">
        <p><?php if (isset($_GET["msg"])) {echo $_GET["msg"];}?></p>
    </form>
    <a href="login.html">i already have account</a>
    <script src="../assets/script.js"></script>
</body>
</html>