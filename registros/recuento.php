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
      
      $votacion_query = "select pos1,pos2,pos3,pos4,pos5,pos6,pos7,pos8,pos9,pos10 from votaciones where usuario='$_SESSION[username]';";
      $votacion = mysqli_query($db,$votacion_query);
      $resultado = mysqli_fetch_assoc($votacion); 
  
      $array_jugador = [];
      foreach ($resultado as $posicion){
        array_push($array_jugador,$posicion);
      } 
      $resultado_query = "select code from carrera order by posicion limit 10;";
      $resultado = mysqli_query($db,$resultado_query);
      $carrera = mysqli_fetch_assoc($resultado); 
  
      
      $array_total = [];
      foreach ($resultado as $codigo){
        
         array_push($array_total,$codigo['code']);
      } 

       
      
      $puesto_exacto = array_intersect_assoc($array_jugador, $array_total);
      
      $indices = array_keys($puesto_exacto);
      
      foreach ($indices as $indice){
          if (array_key_exists($indice,$array_jugador)) {
            unset($array_jugador[$indice]);
            unset($array_total[$indice]);
          }  
      }
      
      $top10 = array_intersect($array_jugador,$array_total);
      
      /* print_r($array_jugador); */
      $puntos = 25*count($puesto_exacto)+10*count($top10);
      
      echo $puntos 
      
     
      
      

    ?>
</body>
</html>