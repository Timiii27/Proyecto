<?php include('db.php') ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
</head>
<body>
    <?php include('errors.php'); ?>

    <form method="post" action="login.php">
        <input type="text" name="user" placeholder="Usuario o email">
        <input type="password" name="pass" placeholder="Contraseña">
        <input type="submit" name="login" value="Login">
    </form>
    <a href="register.php">Registrar</a>
</body>
</html>