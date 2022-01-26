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

    <nav id="nav" class="col-12 d-flex align-items-center justify-content-between nav-fixed">
        <div class="d-flex col-4 justify-content-around align-items-center">
            <a href="#home"><img src="/images/f1logo.png" alt="logo" width="100px"></a>
        </div>
        <div class="d-flex col-8 justify-content-evenly">
            <a href="#ranking">Rankings</a>
            <a href="#leaderbord">Leaderboard</a>
            <a href="#leaderbord">Reglas</a>
            <a href="/carreras/carreras.php">Carreras</a>
            <button>
                <a href="/registros/logchoose.php">Login</a>
            </button>
            <button>
                <a href="/registros/register.php">Register</a>
            </button>
        </div>
    </nav>
    <section class="home-section d-flex  justify-content-center align-items-center flex-column ">
        <div class="card-1 d-flex flex-column justify-content-center align-items-center">
            <h1>El mejor juego sobre la F1</h1>
            <p>Unete junto a otros jugadores alrededor de todo el mundo para poder disfrutar de un apasionante torneo a lo largo de la temporda de la Formula 1</p>
        </div>
        <div>
            <button><a href="/registros/register.php">Empezar a jugar!</a></button>
        </div>
    </section>
    <div class="ranking d-flex flex-column justify-content-center align-items-center">
        <div class="banner-ranking d-flex justify-content-around mb-5 align-items-center w-100">
            <button id="pilotos">Ranking de pilotos</button>
            <button id="constructores">Ranking de constructores</button>
            <button id="ultima-carrera">Ultima carrera</button>
        </div>

            <div id="tabla1" class=" w-75">

                <table class="table table-bordered ">
                    <tr>
                        <th>Posicion</th>
                        <th>Piloto</th>
                        <th>Victorias</th>
                        <th>Puntos</th>
                    </tr>

                    <?php
                    $xml_drivers = simplexml_load_file("drivers.xml.cache");

                    foreach ($xml_drivers->StandingsTable->StandingsList->DriverStanding as $driver) {

                        echo "<tr>" .
                            "<td>" . $driver['position'] . "</td>" .
                            "<td>" . $driver->Driver->GivenName . " " . "<span>" . $driver->Driver->FamilyName . "</span> </td>" .
                            "<td>" . $driver['wins'] .
                            "<td>" . $driver['points'] . "</td>" .
                            "</tr>";
                    }
                    ?>
                </table>
            </div>
            <div id="tabla2" class="w-75 d-none ">

                <table class="table table-bordered ">
                    <tr>
                        <th>Posicion</th>
                        <th>Nombre</th>
                        <th>Victorias</th>
                        <th>Puntos</th>
                    </tr>

                    <?php
                    $xml_constructors = simplexml_load_file("constructors.xml.cache");

                    foreach ($xml_constructors->StandingsTable->StandingsList->ConstructorStanding as $constructor) {

                        echo "<tr>" .
                            "<td>" . $constructor['position'] . "</td>" .
                            "<td><span>" . $constructor->Constructor->Name . "</span></td>" .
                            "<td>" . $constructor['wins'] . "</td>" .
                            "<td>" . $constructor['points'] . "</td>" .
                            "</tr>";
                    }
                    ?>
                </table>
            </div>
            <div id="tabla3" class="w-75 d-none ">
                <table class="table table-striped  table-bordered ">
                    <tr>

                        <th> Posicion</th>
                        </th>
                        <th>Piloto</th>
                        <th>Tiempo de vuelta</th>
                        <th>Estado</th>
                        <th>Puntos</th>
                    </tr>
                    <?php
                    $tiempos = [];

                    $xml_race = simplexml_load_file("last_race.xml.cache");

                    foreach ($xml_race->RaceTable->Race->ResultsList->Result as $carrera) {

                        echo

                        "<tr>" .
                            "<td>" . $carrera['position'] . "</td>" .
                            "<td>" . $carrera->Driver->GivenName . " " . $carrera->Driver->FamilyName . "</td>" .
                            "<td>" . $carrera->Time . "</td>" .
                            "<td>" . $carrera->Status . "</td>" .
                            "<td>" . $carrera['points'] . "</td>" .
                            "</tr>";
                        $tiempo_piloto = $carrera->FastestLap->Time['millis'];
                        array_push($tiempos, $tiempo_piloto);
                    }


                    echo $tiempos[1];





                    ?>
                </table>
            </div>


       
    </div>

    <div class="normas">

    </div>                
    <!-- Scripts -->
    <script src="/js/script.js"></script>
</body>

</html>