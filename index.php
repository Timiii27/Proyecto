<?php include 'xml/guardar.php' ?>
<?php include 'registros/db.php' ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>F1</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="/styles/main.css">
</head>

<body>

    <nav  class="col-12 d-flex align-items-center justify-content-between nav-fixed" id="nav">
        <div class="d-flex col-4 justify-content-around align-items-center">
            <a href="#home"><img src="/images/f1logo.png" alt="logo" width="100px"></a>
        </div>
        <div class="d-flex col-8 justify-content-evenly">
            <a href="#ranking">Rankings</a>
            <a href="#leaderbord">Leaderboard</a>
            <a href="#reglas">Reglas</a>
            
            <button>
                <a href="/registros/logchoose.php">Votar</a>
            </button>
            <button>
                <a href="/registros/register.php">Register</a>
            </button>
        </div>
    </nav>
    
    <section class="home-section d-flex container" id="home">
        <div class="w-100 d-flex flex-column justify-content-center align-items-center">
            <div class="card-1 d-flex flex-column justify-content-center text-center">
                
                <h1>El mejor juego<br> sobre la F1</h1>
                <p>Unete junto a otros jugadores alrededor de todo el mundo para poder disfrutar de un apasionante torneo a lo largo de la temporda de la Formula 1</p>
                <button><a href="/registros/register.php">Empezar a jugar!</a></button>
            </div>
            <div id="contador" class="d-flex">
                
                
            </div>
        </div>
       
            
       
    </section>
    <div class="ranking d-flex flex-column align-items-center" id="ranking">
        <div class="banner-ranking d-flex justify-content-around mb-5 align-items-center w-100 ">
            <button id="pilotos">Ranking de pilotos</button>
            <button id="constructores">Ranking de constructores</button>
            <button id="ultima-carrera">Ultima carrera</button>
            <button id="leaderboard">Ultima carrera</button>
        </div>
        <div class="d-flex w-100 align-items-center justify-content-center">
            <div id="tabla1" class="w-75 ">

                <table class="table ">
                    <tr>
                        <th>Posicion</th>
                        <th>Piloto</th>
                        <th>Victorias</th>
                        <th>Puntos</th>
                    </tr>

                    <?php
                    error_reporting(0);
                    $datos_piloto = file_get_contents('drivers.json');
                    $json_decode_drivers = json_decode($datos_piloto,true);
                    
                    /* $xml_drivers = simplexml_load_file("drivers.xml.cache"); */

                    foreach ($json_decode_drivers['StandingsTable']['StandingsList']['DriverStanding'] as $driver) {

                        echo "<tr>" .
                            "<td>" . $driver['@attributes']['position'] . "</td>" .
                            "<td>" . $driver['Driver']['GivenName'] . " " . "<span>" . $driver['Driver']['FamilyName'] . "</span> </td>" .
                            "<td>" . $driver['@attributes']['wins'] .
                            "<td>" . $driver['@attributes']['points'] . "</td>" .
                            "</tr>";
                    } 
                    
                    ?>
                </table>
            </div>
            <div id="tabla2" class="w-75 d-none border border-dark"">

                <table class="table table-dashed ">
                    <tr>
                        <th>Posicion</th>
                        <th>Nombre</th>
                        <th>Victorias</th>
                        <th>Puntos</th>
                    </tr>

                    <?php
                    error_reporting(0);
                    $datos_constructors = file_get_contents('constructors.json');
                    $json_decode_constructors = json_decode($datos_constructors,true);
                    /* $xml_constructors = simplexml_load_file("constructors.xml.cache"); */

                     foreach ($json_decode_constructors['StandingsTable']['StandingsList']['ConstructorStanding'] as $constructor) {

                        echo "<tr>" .
                            "<td>" . $constructor['@attributes']['position'] . "</td>" .
                            "<td><span>" . $constructor['Constructor']['Name'] . "</span></td>" .
                            "<td>" . $constructor['@attributes']['wins'] . "</td>" .
                            "<td>" . $constructor['@attributes']['points'] . "</td>" .
                            "</tr>";
                     }
                    ?>
                </table>
            </div>
            <div id="tabla3" class="w-75 d-none ">
                <table class="table ">
                    <tr>

                        <th> Posicion</th>
                        </th>
                        <th>Piloto</th>
                        <th>Tiempo de vuelta</th>
                        <th>Estado</th>
                        <th>Puntos</th>
                    </tr>
                    <?php
                    error_reporting(0);
                    $datos_carrera = file_get_contents('last_race.json');
                    $json_decode_lr = json_decode($datos_carrera,true);
                    
                    foreach ($json_decode_lr['RaceTable']['Race']['ResultsList']['Result'] as $carrera) {

                        echo

                        "<tr>" .
                            "<td>" . $carrera['@attributes']['position'] . "</td>" .
                            "<td>" . $carrera['Driver']['GivenName'] . " " . $carrera['Driver']['FamilyName'] . "</td>" .
                            "<td>" . $carrera['FastestLap']['Time'] . "</td>" .
                            "<td>" . $carrera['Status'] . "</td>" .
                            "<td>" . $carrera['@attributes']['points'] . "</td>" .
                            "</tr>";
                      
                    }


                    ?>
                </table>
            </div>
            <div id="tabla4" class="w-75 d-none ">
                <table class="table ">
                    <tr>

                        <th> Usuario</th>
                       
                        <th>Puntos</th>
                        
                    </tr>
                    <?php
                    
                
                    $array_jugadores="select username,puntos from users where username not like 'admin'";
                    $usuarios = mysqli_query($db,$array_jugadores);
                    
                   
                          
                    foreach ($usuarios as $usuario){
                        echo "<tr><td>".$usuario['username']."</td>"."<td>".$usuario['puntos']."</td></tr>";
                    }
                                  
                    


                    ?>
                </table>
            </div>

        </div>


       
    </div>
    <div class="reglas d-flex flex-column align-items-center justify-content-center p4" id="reglas">
        <h1>Reglas Y Sistema de Puntacion</h1>
        <div class="d-flex w-100 justify-content-around mt-5"> 
            <div class="card">
                <p>Regla 1 <img src="https://img.icons8.com/ios-glyphs/30/000000/rules.png"/> </p>
                <p class="mt-5">Las votaciones de las carreras y las clasificaciones se cerraran 30 minutos antes de que empiece cada evento respectivamente, una vez se cierra la votacion no podras sumar puntos en dicho evento</p>
            </div>
            <div class="card">
                <p>Regla 2<img src="https://img.icons8.com/ios-glyphs/30/000000/rules.png"/></p>
                <p class="mt-5">Solo se podra crear una cuenta por persona, la persona que cree mas de una cuenta quedara descalificada y sin opción a volver a participar durante el resto de la temporada de competición</p>
            </div>
            <div class="card">
                <p>Info Puntuacion Carrera</p>
                <p class="mt-5"></p>
            </div>
            <div class="card">
                <p>Info Puntuacion Quali</p>
                <p class="mt-5"></p>
            </div>
        </div>
        
        
    </div>
    
    <footer class="footer d-flex justify-content-center">
        <p>Copyright &copy; Tihomir Nikolaev</p>
    </footer>
    <!-- Scripts -->
    <script src="/js/script.js"></script>
    <script src="/js/simplyCountdown.min.js"></script>
    <script src="/js/countdown.js"></script>
</body>

</html>