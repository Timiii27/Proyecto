
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
        <form action="carreras.php" method="post" enctype="multipart/form">
            <input type="number" name="num" placeholder="Numero de carrera">
            <input type="submit" value="Send">
        </form>
        <?php
        if(isset($_POST['num'])){
            $carrera_num = $_POST['num'];
            $xml = simplexml_load_file("http://ergast.com/api/f1/current/$carrera_num/results");

            echo "<table>".
                    "<tr>".
                        "<th> Posicion</th>".
                        "<th>Carrera:". $xml->RaceTable->Race->RaceName.
                        "</th>".
                        "<th>Piloto</th>".
                        "<th>Tiempo de vuelta</th>".
                        "<th>Estado</th>".
                        "<th>Puntos</th>".
                    "</tr>";
            foreach ($xml->RaceTable->Race->ResultsList->Result as $carrera) {
                $tiempos = [];
                echo 

                        "<tr>".
                            "<td>" . $carrera['position'] . "</td>" .
                            "<td>" . $carrera->Driver->GivenName ." ". $carrera->Driver->FamilyName . "</td>" .
                            "<td>" . $carrera->FastestLap->Time . "</td>" .
                            "<td>" . $carrera->Status . "</td>" .
                            "<td>" . $carrera['points'] . "</td>" .
                        "</tr>";
            }
            "</table>";
            
        }else{
            echo "Elige una carrera";
        }

        ?>

</body>
</html>