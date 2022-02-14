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
    
    $votacion_query = "INSERT into votaciones (usuario,pos1,pos2,pos3,pos4,pos5,pos6,pos7,pos8,pos9,pos10,vr,dnf) 
    values ('$_SESSION[username]','$posicion1','$posicion2','$posicion3','$posicion4','$posicion5','$posicion6','$posicion7','$posicion8','$posicion9','$posicion10','$posicion11','$posicion12')";
    $resultado_votacion = mysqli_query($db, $votacion_query);
    header("Location:elegir.php")
    
 
?>
