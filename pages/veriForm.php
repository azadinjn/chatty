

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CHATTY</title>
</head>
<body>
    <h1>singup</h1>
    <form action="../auth/veriCode.php" method="post"  >
        <label for="name">code</label>
        <input type="text" id="code" name="code">
        <input type="submit" value="singup">
        <p><?php if (isset($_GET["msg"])) {echo $_GET["msg"];} ?></p>
    </form>
    
</body>
</html>
