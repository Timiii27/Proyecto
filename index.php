<?php include 'xml/guardar.php' ?>
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

    <nav  class="col-12 d-flex align-items-center justify-content-between nav-fixed">
        <div class="d-flex col-4 justify-content-around align-items-center">
            <a href="#home"><img src="/images/f1logo.png" alt="logo" width="100px"></a>
        </div>
        <div class="d-flex col-8 justify-content-evenly">
            <a href="#ranking">Rankings</a>
            <a href="#leaderbord">Leaderboard</a>
            <a href="#leaderbord">Reglas</a>
            <a href="/carreras/carreras.php">Carreras</a>
            <button>
                <a href="/registros/logchoose.php">Votar</a>
            </button>
            <button>
                <a href="/registros/register.php">Register</a>
            </button>
        </div>
    </nav>
    
    <section class="home-section d-flex " id="home">
        <div class="d-flex flex-column justify-content-center">
            <div class="card-1 col-7 d-flex flex-column align-items-center">
                <h1>El mejor juego sobre la F1</h1>
                <p>Unete junto a otros jugadores alrededor de todo el mundo para poder disfrutar de un apasionante torneo a lo largo de la temporda de la Formula 1</p>
            </div>
            <div class="jugar">
                <button><a href="/registros/register.php">Empezar a jugar!</a></button>
            </div>
        </div>
        <div class="col-5 d-flex align-items-center">
            <img src="/images/fondo.jpg" alt="" height="400" srcset="">
        </div>
    </section>
    <div class="Reglas d-flex flex-column align-items-center justify-content-center p4">
        <h1>Reglas</h1>
        <div class="d-flex w-100 justify-content-around mt-5"> 
            <div class="card">
                <p>Regla 1 <img src="https://img.icons8.com/ios-glyphs/30/000000/rules.png"/> </p>
                <p class="mt-5">Lorem ipsum dolor sit amet consectetur adipisicing elit. Cum sapiente sunt accusamus repellat quam, in quidem quae. Inventore sit itaque vero, omnis nesciunt nam! Nostrum harum necessitatibus animi repellat voluptates!</p>
            </div>
            <div class="card">
                <p>Regla 2<img src="https://img.icons8.com/ios-glyphs/30/000000/rules.png"/></p>
                <p class="mt-5">Lorem ipsum dolor sit amet consectetur adipisicing elit. Cum sapiente sunt accusamus repellat quam, in quidem quae. Inventore sit itaque vero, omnis nesciunt nam! Nostrum harum necessitatibus animi repellat voluptates!</p>
            </div>
            <div class="card">
                <p>Regla 3<img src="https://img.icons8.com/ios-glyphs/30/000000/rules.png"/></p>
                <p class="mt-5">Lorem ipsum dolor sit amet consectetur adipisicing elit. Cum sapiente sunt accusamus repellat quam, in quidem quae. Inventore sit itaque vero, omnis nesciunt nam! Nostrum harum necessitatibus animi repellat voluptates!</p>
            </div>
        </div>


    </div>
    <div class="ranking d-flex flex-column align-items-center">
        <div class="banner-ranking d-flex justify-content-around mb-5 align-items-center w-100 ">
            <button id="pilotos">Ranking de pilotos</button>
            <button id="constructores">Ranking de constructores</button>
            <button id="ultima-carrera">Ultima carrera</button>
        </div>
        <div class="d-flex w-100 align-items-center justify-content-center">
            <div id="tabla1" class="w-75">

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
            <div id="tabla2" class="w-75 d-none ">

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

        </div>


       
    </div>
    <footer class="footer d-flex justify-content-center">
        <p>Copyright &copy; Tihomir Nikolaev</p>
    </footer>
    <!-- Scripts -->
    <script src="/js/script.js"></script>
</body>

</html>