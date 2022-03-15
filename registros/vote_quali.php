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
    <title>Votacion</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>
   
    <form action="quali.php" method="get">
    <?php
        /* $check_query = "SELECT * FROM votacion_quali where usuario='$_SESSION[username]';";
        $result = mysqli_query($db,$check_query); */
        $fecha_actual = date('Y-m-d H:i:s');
        $fecha_limite = "2022-03-18 19:23:00";
       
           
            echo "Bienvenido ".$_SESSION['username']." aqui podras realizar tu votacion sobre cada quali<br>";
            
            if ($fecha_limite > $fecha_actual) {
                error_reporting(0);
                $datos_drivers = file_get_contents('../drivers.json');
                $json_decode_drivers = json_decode($datos_drivers,true);

                for ($i=1; $i < 6; $i++) { 
                    if ($i == 1) {
                        echo "Primero";
                    } elseif ($i == 2) {
                        echo "Quinto";
                    } elseif ($i == 3) {
                        echo "Decimo";
                    }elseif ($i == 4) {
                        echo "Decimoquinto";
                    }elseif ($i == 5) {
                        echo "Vigesimo";
                    }
                    echo "<select name='pos_$i'  size='10' required>";
                            foreach ($json_decode_drivers['StandingsTable']['StandingsList']['DriverStanding'] as $driver){
                                        echo '<option value="'.$driver['Driver']['@attributes']['code'].'" >'.$driver['Driver']['FamilyName']."</option>";
                                        }
                    echo "</select>";
                } 
                echo "<input  type='submit' value='Hacer votacion'><br>";
                
                if(mysqli_num_rows($result) > 0){
                    foreach($result as $row){
                        echo $row['pos1'];
                        echo $row['pos5'];
                        echo $row['pos10'];
                        echo $row['pos15'];
                        echo $row['pos20'];
                    }
                }
            }else {
                echo "Te has quedado sin tiempo para votar <br>";
            }
        
            ?>
    
    <a href="logout.php">Salir</a>
    </form>

    
    <script src="vote.js"></script>
</body>
</html>