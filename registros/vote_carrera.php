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
    <link rel="stylesheet" href="./css_register/css_votaciones.css">
</head>
<body>
<nav  class="col-12 d-flex align-items-center justify-content-between nav-fixed" id="nav">
        <div class="d-flex col-4 justify-content-around align-items-center">
            <a href="/elegir.php"><img src="/images/f1logo.png" alt="logo" width="100px"></a>
        </div>
        <div class="d-flex col-8 justify-content-evenly">
            <a href="../index.php">Home</a>
            <a href="elegir.php">Menu Principal</a>
            <a href="vote_carrera.php">Votar Carrera</a>
            <a href="vote_quali.php">Votar Quali</a>
            <a href="vote_anual_constructores.php">Votar Constructores</a>
            <a href="vote_anual_pilotos.php">Votar Pilotos</a>
            <a href="logout.php">Logout</a>
                
        </div>
    </nav>
    <form action="resultados.php" method="get">
    <?php
        $check_query = "SELECT * FROM votaciones where usuario='$_SESSION[username]';";
        $result = mysqli_query($db,$check_query);
        $fecha_actual = date('Y-m-d H:i:s');
        $fecha_limite = "2022-03-19 23:59:00<br>";
       

        echo "<div  class='d-flex flex-column justify-content-center align-items-center m-5'><span>Bienvenido ".$_SESSION['username']." aqui podras realizar tu votacion sobre cada carrera</span><br>";
        echo "<span>La fecha limite es el $fecha_limite </span></div>";
            
            echo "<table class='d-flex justify-content-center align-items-center p-5 mb-4'>
                    <tr>
                    <th>Primero</th>
                    <th>Segundo</th>
                    <th>Tercero</th>
                    <th>Cuarto</th>
                    <th>Quinto</th>
                    <th>Sexto</th>
                    <th>Septimo</th>
                    <th>Octavo</th>
                    <th>Noveno</th>
                    <th>Decimo</th>
                    <th>VR</th>
                    <th>DNF</th>
                    <th>Adelantamientos</th>
                    <th>Cuarto Equipo</th>
                    </tr>";  
           
            if(mysqli_num_rows($result) > 0){
             
                echo "<tr>";
                foreach($result as $row){
                    for ($i=1; $i < 11; $i++) { 
                        echo "
                        <td>".$row["pos$i"]."</td>";
                    }
                    echo "<td>".$row["vr"]."</td><td>".$row["dnf"]."</td><td>".$row['adelantamientos']."</td><td>".$row['cuarto_equipo']."</td>";
                    
                }
                echo "</tr>";
            }

            echo "</table>";
            if ($fecha_limite > $fecha_actual) {
                error_reporting(0);
                $datos_drivers = file_get_contents('../drivers.json');
                $json_decode_drivers = json_decode($datos_drivers,true);
                $datos_constructors = file_get_contents('../constructors.json');
                $json_decode_constructors = json_decode($datos_constructors,true);
                for ($i=1; $i < 14; $i++) { 
                    if ($i == 1) {
                        echo "<div class='d-flex p-4 flex-column align-items-center'><span>Primero</span>";
                    } elseif ($i == 2) {
                        echo "<div class='d-flex p-4 flex-column align-items-center'><span>Segundo</span>";
                    } elseif ($i == 3) {
                        echo "<div class='d-flex p-4 flex-column align-items-center'><span>Tercero</span>";
                    }elseif ($i == 4) {
                        echo "<div class='d-flex p-4 flex-column align-items-center'><span>Cuarto</span>";
                    }elseif ($i == 5) {
                        echo "<div class='d-flex p-4 flex-column align-items-center'><span>Quinto</span>";
                    }elseif ($i == 6) {
                        echo "<div class='d-flex p-4 flex-column align-items-center'><span>Sexto</span>";
                    }elseif ($i == 7) {
                        echo "<div class='d-flex p-4 flex-column align-items-center'><span>Septimo</span>";
                    }elseif ($i == 8) {
                        echo "<div class='d-flex p-4 flex-column align-items-center'><span>Octavo</span>";
                    }elseif ($i == 9) {
                        echo "<div class='d-flex p-4 flex-column align-items-center'><span>Noveno</span>";
                    }elseif ($i == 10) {
                        echo "<div class='d-flex p-4 flex-column align-items-center'><span>Decimo</span>";
                    }elseif ($i == 11) {
                        echo "<div class='d-flex p-4 flex-column align-items-center'><span>Vuelta Rapida</span>";
                    }elseif ($i == 12) {
                        echo "<div class='d-flex p-4 flex-column align-items-center'><span>DNF</span>";
                    }elseif ($i == 13) {
                        echo "<div class='d-flex p-4 flex-column align-items-center'><span>Adelantamientos</span>";
                    }elseif ($i == 14) {
                        echo "<div class='d-flex p-4 flex-column  align-items-center'><span>Cuarto Equipo</span>";
                    }
                    echo "<select class='col-5' name='pos_$i'  size='10' required>";
                            foreach ($json_decode_drivers['StandingsTable']['StandingsList']['DriverStanding'] as $driver){
                                        echo '<option value="'.$driver['Driver']['@attributes']['code'].'" >'.$driver['Driver']['FamilyName']."</option>";
                                        }
                    echo "</select></div>";
                } 
                echo "<div class='d-flex p-4  flex-column align-items-center'><span>Cuarto Equipo</span>";
                echo "<select class='col-5' name='cuarto_equipo'  size='10' required>";
                foreach ($json_decode_constructors['StandingsTable']['StandingsList']['ConstructorStanding'] as $constructor){
                    echo '<option value="'.$constructor['Constructor']['Name'].'">'.$constructor['Constructor']['Name']."</option>";
                        
                } 
                echo "</select></div>";
                echo "<div class='d-flex w-100 justify-content-center p-5'><input  type='submit' value='Hacer votacion'></input></div>";
            }else {
                echo "Te has quedado sin tiempo para votar <br>";
            }
        
            ?>
    
  
    </form>

    
    <script src="vote.js"></script>
</body>
</html>