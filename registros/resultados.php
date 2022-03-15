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
    $posicion6 = $_GET["pos_6"];
    $posicion7 = $_GET["pos_7"];
    $posicion8 = $_GET["pos_8"];
    $posicion9 = $_GET["pos_9"];
    $posicion10 = $_GET["pos_10"];
    $posicion11 = $_GET["pos_11"];
    $posicion12 = $_GET["pos_12"];
    $posicion13 = $_GET["pos_13"];
    
    $check_query = "SELECT * FROM votaciones where usuario='$_SESSION[username]';";
    $resultado_votacion = mysqli_query($db,$check_query);
    if (mysqli_num_rows($resultado_votacion) > 0) {
      $votacion_query = "update votaciones 
      set pos1='$posicion1',
      pos2='$posicion2',
      pos3='$posicion3',
      pos4='$posicion4',
      pos5='$posicion5',
      pos6='$posicion6',
      pos7='$posicion7',
      pos8='$posicion8',
      pos9='$posicion9',
      pos10='$posicion10',
      vr='$posicion11',
      dnf='$posicion12',
      adelantamientos='$posicion13'
      where usuario='$_SESSION[username]';";
      $resultado_votacion = mysqli_query($db, $votacion_query);
    }else {
      $votacion_query = "INSERT into votaciones (usuario,pos1,pos2,pos3,pos4,pos5,pos6,pos7,pos8,pos9,pos10,vr,dnf,adelantamientos) 
      values ('$_SESSION[username]','$posicion1','$posicion2','$posicion3','$posicion4','$posicion5','$posicion6','$posicion7','$posicion8','$posicion9','$posicion10','$posicion11','$posicion12','$posicion13')";
      $resultado_votacion = mysqli_query($db, $votacion_query);
    }
    header("Location:elegir.php")
    
 
?>
