<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>F1</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="/styles/home.css">
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
                <a href="/registros/login.php">Login</a>
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
            <button><a href="">Empezar a jugar!</a></button>
        </div>
    </section>
    <section class="ranking">
        <div class="d-flex col-12 justify-content-around align-items-center">
            
            <table class="m-5">
                <tr>
                    <th>Posicion</th>
                    <th>Piloto</th>
                    <th>Puntos</th>
                </tr>

                <?php
                $xml = simplexml_load_file("http://ergast.com/api/f1/current/driverStandings");

                foreach ($xml->StandingsTable->StandingsList->DriverStanding as $driver) {

                    echo "<tr>" .
                        "<td>" . $driver['position'] . "</td>" .
                        "<td>" . $driver->Driver->GivenName ." ". $driver->Driver->FamilyName . "</td>" .
                        "<td>" . $driver['points'] . "</td>" .
                        "</tr>";
                }
                ?>
            </table>
            
            <table class="m-5">
                <tr>
                    <th>Posicion</th>
                    <th>Nombre</th>
                    <th>Victorias</th>
                    <th>Puntos</th>
                </tr>

                <?php
                $xml = simplexml_load_file("http://ergast.com/api/f1/current/constructorStandings");

                foreach ($xml->StandingsTable->StandingsList->ConstructorStanding as $constructor) {

                    echo "<tr>" .
                        "<td>" . $constructor['position'] . "</td>" .
                        "<td>" . $constructor->Constructor->Name . "</td>" .
                        "<td>" . $constructor['wins'] . "</td>" .
                        "<td>" . $constructor['points'] . "</td>" .
                        "</tr>";
                }
                ?>
            </table>
        </div>
    </section>

    <!-- Scripts -->
    <script src="/js/script.js"></script>
</body>

</html>