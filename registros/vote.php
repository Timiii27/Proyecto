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
    <form action="resultados.php" method="get">
    <?php
        echo "Bienvenido ".$_SESSION['username']." aqui podras realizar tu votacion sobre cada carrera<br>";
        $fecha_limite = "16-02-2022 18:37:00";
        if ($fecha_limite > date('d-m-Y H:i:s')) {
            $xml_drivers = simplexml_load_file("../drivers.xml.cache");
            
            
            
            for ($i=1; $i < 13; $i++) { 
                if ($i == 1) {
                    echo "Primero";
                } elseif ($i == 2) {
                    echo "Segundo";
                } elseif ($i == 3) {
                    echo "Tercero";
                }elseif ($i == 4) {
                    echo "Cuarto";
                }elseif ($i == 5) {
                    echo "Quinto";
                }elseif ($i == 6) {
                    echo "Sexto";
                }elseif ($i == 7) {
                    echo "Septimo";
                }elseif ($i == 8) {
                    echo "Octavo";
                }elseif ($i == 9) {
                    echo "Noveno";
                }elseif ($i == 10) {
                    echo "Decimo";
                }elseif ($i == 11) {
                    echo "Vuelta Rapida";
                }elseif ($i == 12) {
                    echo "DNF";
                }
                echo "<select name='pos_$i'  size='10' required>";
                        foreach ($xml_drivers->StandingsTable->StandingsList->DriverStanding as $driver){
                                    echo '<option value="'.$driver->Driver['code'].'" >'.$driver->Driver->FamilyName."</option>";
                                    }
                echo "</select>";
            } 
            echo "<input  type='submit' value='Hacer votacion'>";
            
        }else {
            echo "Te has quedado sin tiempo para votar";
        }

            ?>
    
    <a href="logout.php">Salir</a>
    </form>

    
    <script src="vote.js"></script>
</body>
</html>