<?php include('db.php') ?>

<?php 

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="vote_carrera.php">Votar Carrera</a>
    <a href="vote_anual_constructores.php">Votar Constructores</a>
    <a href="vote_anual_pilotos.php">Votar Pilotos</a>
</body>
</html>