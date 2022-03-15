<?php include('db.php') ?>

<?php 

  if (!isset($_SESSION['username'])) {
  	header('location: login.php');
  }

    $posicion1 = $_GET["pos_1"];
    $posicion2 = $_GET["pos_2"];
    $posicion3 = $_GET["pos_3"];
    $posicion4 = $_GET["pos_4"];
    $posicion5 = $_GET["pos_5"];
    $posicion6 = $_GET["cuarto_equipo"];
   
    $check_query = "SELECT * FROM votacion_quali where usuario='$_SESSION[username]';";
    $resultado_votacion = mysqli_query($db,$check_query);
    if (mysqli_num_rows($resultado_votacion) > 0) {
      $votacion_query = "update votacion_quali
      set pos1='$posicion1',
      pos5='$posicion2',
      pos10='$posicion3',
      pos15='$posicion4',
      pos20='$posicion5',
      cuarto_equipo='$posicion6'
   
      where usuario='$_SESSION[username]';";
      $resultado_votacion = mysqli_query($db, $votacion_query);
    }else {
      $votacion_query = "INSERT into votacion_quali (usuario,pos1,pos5,pos10,pos15,pos20,cuarto_equipo) 
      values ('$_SESSION[username]','$posicion1','$posicion2','$posicion3','$posicion4','$posicion5','$posicion1')";
      $resultado_votacion = mysqli_query($db, $votacion_query);
    }
    header("Location:elegir.php")
    
 
?>
