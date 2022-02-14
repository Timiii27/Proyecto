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
    <?php
    $votacion_query = "Select pos1,pos2,pos3,pos4,pos5,pos6,pos7,pos8,pos9,pos10 from votaciones";
    $carrera_query = "select code from carrera limit 10";
    $resultado_votacion = mysqli_query($db, $votacion_query);
    $resultado_carrera = mysqli_query($db, $carrera_query);
    $puntos = 0;
    echo array_values($resultado_carrera);
    ?>
</body>
</html>