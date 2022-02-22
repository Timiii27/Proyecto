<?php include('db.php') ?>

<?php 
session_start();
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
      $stmt = mysqli_stmt_init($db);
  
      $votacion_query = "select pos1,pos2,pos3,pos4,pos5,pos6,pos7,pos8,pos9,pos10 from votaciones;";
      if (mysqli_stmt_prepare($stmt,$votacion_query) ) {
        
      
        
        mysqli_stmt_execute($stmt);
        
        $resultado_votacion = mysqli_stmt_get_result($stmt);	
        
        
        while ($row = mysqli_fetch_assoc($resultado_votacion)) {
          for ($i=1; $i < 11; $i++) { 
            echo $row["pos$i"]."<br>";
          }
        }
      } 
      $carrera_query = "select * from carrera limit 10;";
      if (mysqli_stmt_prepare($stmt,$carrera_query)) {
        
     

        mysqli_stmt_execute($stmt);
       
        	
        $resultado_carrera = mysqli_stmt_get_result($stmt);	
        while ($row2 = mysqli_fetch_assoc($resultado_carrera)) {
         
            echo $row2["code"]."<br>";
         
        }

        
      }

    ?>
</body>
</html>