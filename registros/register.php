<?php include('db.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
<?php include('errors.php') ?>
    <form action="register.php" method="post" enctype="multipart/form">
        <input type="text" name="user" placeholder="Nombre de usuario">
        <input type="password" name="pass1" placeholder="Contraseña">
        <input type="password" name="pass2" placeholder="Repetir contraseña">
        <input type="email" name="email" placeholder="Correo">
        <input type="submit" name="submit" value="Enviar">
    </form>
</body>
</html>

