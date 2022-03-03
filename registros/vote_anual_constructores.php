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
    <h3 id="clock"></h3>
    <form action="resultados_constructores.php" method="get">
    <?php
        $check_query = "SELECT * FROM votacion_anual_constructores where username='$_SESSION[username]';";
        
        $result = mysqli_query($db,$check_query);
        $fecha_actual = date('Y-m-d H:i:s');
        $fecha_limite = "2022-03-23 23:59:00";
        
           
            echo "Bienvenido ".$_SESSION['username']." aqui podras realizar tu votacion sobre los puntos anuales de cada constructor<br>";
            
            if ($fecha_limite > $fecha_actual) {
                error_reporting(0);
                $datos_constructors = file_get_contents('../constructors.json');
                $json_decode_constructors = json_decode($datos_constructors,true);

                            foreach ($json_decode_constructors['StandingsTable']['StandingsList']['ConstructorStanding'] as $constructor){
                                        echo '<p>'.$constructor['Constructor']['Name']."</p>";
                                        echo '<input placeholder="Los decimales deberan escribirse con puntos" name="'.$constructor['Constructor']['@attributes']['constructorId'].'" type"number">';
                                        }
                   
                echo "<input  type='submit' value='Hacer votacion'><br>";
                
            }else {
                echo "Te has quedado sin tiempo para votar <br>";
            }
            ?>
    
    <a href="logout.php">Salir</a>
    </form>

    
    <script src="vote.js"></script>
</body>
</html>