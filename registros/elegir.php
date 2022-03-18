<?php include('db.php') ?>

<?php

if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: logchoose.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css_register/css_votaciones.css">
    <title>Panel central</title>
</head>

<body>

    <nav class="col-12 d-flex align-items-center justify-content-between nav-fixed" id="nav">
        <div class="d-flex col-4 justify-content-around align-items-center">
            <a href="#home"><img src="/images/f1logo.png" alt="logo" width="100px"></a>
        </div>
        <div class="d-flex col-8 justify-content-evenly">
            <a href="../index.php">Home</a>
            <a href="vote_carrera.php">Votar Carrera</a>
            <a href="vote_quali.php">Votar Quali</a>

            <a href="logout.php">Logout</a>

        </div>
    </nav>
    <?php
    $mostar_query = "select * from votaciones where usuario='$_SESSION[username]'";
    $mostrar = mysqli_query($db, $mostar_query);
    if ($_SESSION['username'] != "admin") {
        

            $check_contar = "select puntos from users where username='$_SESSION[username]' and username not like 'admin';";
            $contar_query = mysqli_query($db, $check_contar);
            $puntos_totales = mysqli_fetch_assoc($contar_query);

            echo "<table class='d-flex justify-content-center align-items-center vh-100'>
                                            <tr>
                                            <th>Usuario</th>
                                            <th>Pos1</th>
                                            <th>Pos5</th>
                                            <th>Pos10</th>
                                            <th>Pos15</th>
                                            <th>Pos20</th>
                                            <th>Puntos cuarto equipo Quali</th>
                                            <th>Puestos Exactos Acertados</th>
                                            <th>Puestos Top 10 Acertados</th>
                                            <th>VR</th>
                                            <th>DNF</th>
                                            
                                            <th>Puntos Adelantamientos</th>
                                            <th>Puntos cuarto equipo Carrera</th>
                                            <th>Puntos por la votacion de la carrera</th>
                                            <th>Puntos por la votacion de la quali</th>
                                            <th>Puntos en la ultima carrera</th>
                                            <th>Puntos totales</th></tr>";

         
            $a = "select * from carrera;";
            $s = mysqli_query($db, $a);

            if (mysqli_num_rows($s) > 0) {
                $votacion_query = "select pos1,pos2,pos3,pos4,pos5,pos6,pos7,pos8,pos9,pos10 from votaciones where usuario='$_SESSION[username]';";
                $votacion = mysqli_query($db, $votacion_query);
                $quali_query_1 = "select pos1,pos5,pos10,pos15,pos20 from votacion_quali where usuario='$_SESSION[username]';";
                $quali_1_voto = mysqli_query($db, $quali_query_1);



                
                $puntos = 0;
                $quali_1 = mysqli_fetch_assoc($quali_1_voto);
                $query_quali_resultado_1 = "select code,posicion from quali where posicion = 1";
                $query_quali_resultado_2 = "select code,posicion from quali where posicion = 2";
                $query_quali_resultado_4 = "select code,posicion from quali where posicion = 4";
                $query_quali_resultado_5 = "select code,posicion from quali where posicion = 5";
                $query_quali_resultado_6 = "select code,posicion from quali where posicion = 6";
                $query_quali_resultado_9 = "select code,posicion from quali where posicion = 9";
                $query_quali_resultado_10 = "select code,posicion from quali where posicion =10 ";
                $query_quali_resultado_11 = "select code,posicion from quali where posicion = 11";
                $query_quali_resultado_14 = "select code,posicion from quali where posicion = 14";
                $query_quali_resultado_15 = "select code,posicion from quali where posicion = 15";
                $query_quali_resultado_16 = "select code,posicion from quali where posicion = 16";
                $query_quali_resultado_19 = "select code,posicion from quali where posicion = 19";
                $query_quali_resultado_20 = "select code,posicion from quali where posicion = 20";


                $quali_resultado_1 = mysqli_query($db, $query_quali_resultado_1);
                $quali_resultado_2 = mysqli_query($db, $query_quali_resultado_2);
                $quali_resultado_4 = mysqli_query($db, $query_quali_resultado_4);
                $quali_resultado_5 = mysqli_query($db, $query_quali_resultado_5);
                $quali_resultado_6 = mysqli_query($db, $query_quali_resultado_6);
                $quali_resultado_9 = mysqli_query($db, $query_quali_resultado_9);
                $quali_resultado_10 = mysqli_query($db, $query_quali_resultado_10);
                $quali_resultado_11 = mysqli_query($db, $query_quali_resultado_11);
                $quali_resultado_14 = mysqli_query($db, $query_quali_resultado_14);
                $quali_resultado_15 = mysqli_query($db, $query_quali_resultado_15);
                $quali_resultado_16 = mysqli_query($db, $query_quali_resultado_16);
                $quali_resultado_19 = mysqli_query($db, $query_quali_resultado_19);
                $quali_resultado_20 = mysqli_query($db, $query_quali_resultado_20);

                $posicion_1 = mysqli_fetch_assoc($quali_resultado_1);
                $posicion_2 = mysqli_fetch_assoc($quali_resultado_2);
                $posicion_4 = mysqli_fetch_assoc($quali_resultado_4);
                $posicion_5 = mysqli_fetch_assoc($quali_resultado_5);
                $posicion_6 = mysqli_fetch_assoc($quali_resultado_6);
                $posicion_9 = mysqli_fetch_assoc($quali_resultado_9);
                $posicion_10 = mysqli_fetch_assoc($quali_resultado_10);
                $posicion_11 = mysqli_fetch_assoc($quali_resultado_11);
                $posicion_14 = mysqli_fetch_assoc($quali_resultado_14);
                $posicion_15 = mysqli_fetch_assoc($quali_resultado_15);
                $posicion_16 = mysqli_fetch_assoc($quali_resultado_16);
                $posicion_19 = mysqli_fetch_assoc($quali_resultado_19);
                $posicion_20 = mysqli_fetch_assoc($quali_resultado_20);

               
                $puntos_1=0;
                $puntos_2=0;
                echo "<tr> <td>" . $_SESSION['username'] . "</td>";
                if(mysqli_num_rows($quali_1_voto)>0){
                   
                    $cuarto_equipo_query_carrera = "select cuarto_equipo from votaciones where usuario='$_SESSION[username]';";
                    $cuarto_equipo_query_quali = "select cuarto_equipo from votacion_quali where usuario='$_SESSION[username]';";
                    $cuarto_equipo_carrera = mysqli_query($db, $cuarto_equipo_query_carrera);
                    $cuarto_equipo_quali = mysqli_query($db, $cuarto_equipo_query_quali);
    
                    $cuarto_carrera = mysqli_fetch_assoc($cuarto_equipo_carrera);
                    $cuarto_quali = mysqli_fetch_assoc($cuarto_equipo_quali);
   
    
                    $cuarto_equipo_query_carrera = "select sum(c.posicion) as pos_voto,c.constructor as const from carrera c, votaciones v where c.constructor=v.cuarto_equipo and v.usuario='$_SESSION[username]' group by constructor;";
                    $cuarto_equipo_query_quali = "select sum(q.posicion) as pos_voto,q.constructor as const from quali q, votacion_quali v where q.constructor=v.cuarto_equipo and v.usuario='$_SESSION[username]' group by constructor;";
                    $cuarto_equipo_carrera = mysqli_query($db, $cuarto_equipo_query_carrera);
                    $cuarto_equipo_quali = mysqli_query($db, $cuarto_equipo_query_quali);
    
                    $cuarto_carrera = mysqli_fetch_assoc($cuarto_equipo_carrera);
                    $cuarto_quali = mysqli_fetch_assoc($cuarto_equipo_quali);
    
    
                    $resultados_carrera_query = "select distinct(sum(posicion)) as pos from carrera group by constructor order by sum(posicion);";
                    $resultados_quali_query = "select distinct(sum(posicion)) as pos from quali group by constructor order by sum(posicion);";
                    $resultado_carrera = mysqli_query($db, $resultados_carrera_query);
                    $resultado_quali = mysqli_query($db, $resultados_quali_query);
    
                    $array_carrera_posiciones = [];
                    foreach ($resultado_carrera as $pos) {
                        array_push($array_carrera_posiciones, $pos['pos']);
                    }
                    $array_quali_posiciones = [];
                    foreach ($resultado_quali as $pos) {
                        array_push($array_quali_posiciones, $pos['pos']);
                    }
    
                if ($quali_1['pos1'] == $posicion_1['code'] && $posicion_1['posicion'] == 1) {
                    $GLOBALS['puntos_1'] = $GLOBALS['puntos_1'] + 5;
                    echo "<td>$quali_1[pos1] <br>5 PTS</td>";
                } elseif ($quali_1['pos1'] == $posicion_2['code']) {
                    $GLOBALS['puntos_1'] = $GLOBALS['puntos_1'] + 3;
                    echo "<td>$quali_1[pos1] <br>3 PTS</td>";
                } else {
                    echo "<td>$quali_1[pos1] <br>0 PTS</td>";
                }
                if ($quali_1['pos5'] == $posicion_5['code'] && $posicion_5['posicion'] == 5) {
                    $GLOBALS['puntos_1'] = $GLOBALS['puntos_1'] + 10;
                    echo "<td>$quali_1[pos5] 1<br>0 PTS</td>";
                } elseif ($quali_1['pos5'] == $posicion_4['code']) {
                    $GLOBALS['puntos_1'] = $GLOBALS['puntos_1'] + 5;
                    echo "<td>$quali_1[pos5] <br>5 PTS</td>";
                } elseif ($quali_1['pos5'] == $posicion_6['code']) {
                    $GLOBALS['puntos_1'] = $GLOBALS['puntos_1'] + 5;
                    echo "<td>$quali_1[pos5] <br>5 PTS</td>";
                } else {
                    echo "<td>$quali_1[pos5] <br>0 PTS</td>";
                }
                if ($quali_1['pos10'] == $posicion_10['code'] && $posicion_10['posicion'] == 10) {
                    $GLOBALS['puntos_1'] = $GLOBALS['puntos_1'] + 10;
                    echo "<td>$quali_1[pos10] 1<br>0 PTS</td>";
                } elseif ($quali_1['pos10'] == $posicion_9['code']) {
                    $GLOBALS['puntos_1'] = $GLOBALS['puntos_1'] + 5;
                    echo "<td>$quali_1[pos10] <br>5 PTS</td>";
                } elseif ($quali_1['pos10'] == $posicion_11['code']) {
                    $GLOBALS['puntos_1'] = $GLOBALS['puntos_1'] + 5;
                    echo "<td>$quali_1[pos10] <br>5 PTS</td>";
                } else {
                    echo "<td>$quali_1[pos10] <br>0 PTS</td>";
                }

                if ($quali_1['pos15'] == $posicion_15['code'] && $posicion_15['posicion'] == 15) {
                    $GLOBALS['puntos_1'] = $GLOBALS['puntos_1'] + 10;
                    echo "<td>$quali_1[pos15] 1<br>0 PTS</td>";
                } elseif ($quali_1['pos15'] == $posicion_14['code']) {
                    $GLOBALS['puntos_1'] = $GLOBALS['puntos_1'] + 5;
                    echo "<td>$quali_1[pos15] <br>5 PTS</td>";
                } elseif ($quali_1['pos15'] == $posicion_16['code']) {
                    $GLOBALS['puntos_1'] = $GLOBALS['puntos_1'] + 5;
                    echo "<td>$quali_1[pos15] <br>5 PTS</td>";
                } else {
                    echo "<td>$quali_1[pos15] <br>0 PTS</td>";
                }
                if ($quali_1['pos20'] == $posicion_20['code'] && $posicion_20['posicion'] == 20) {
                    $GLOBALS['puntos_1'] = $GLOBALS['puntos_1'] + 5;
                    echo "<td>$quali_1[pos20] <br>5 PTS</td>";
                } elseif ($quali_1['pos20'] == $posicion_19['code']) {
                    $GLOBALS['puntos_1'] = $GLOBALS['puntos_1'] + 3;
                    echo "<td>$quali_1[pos20] <br>3 PTS</td>";
                } else {
                    echo "<td>$quali_1[pos20] <br>0 PTS</td>";
                }
                if ($cuarto_quali['pos_voto'] == $array_quali_posiciones[3]) {
                    $GLOBALS['puntos_1'] = $GLOBALS['puntos_1'] + 20;
                    echo "<td> $cuarto_quali[const] 20</td>";
                } elseif ($cuarto_quali['pos_voto'] == $array_quali_posiciones[2]) {
                    $GLOBALS['puntos_1'] = $GLOBALS['puntos_1'] + 10;
                    echo "<td> $cuarto_quali[const] 10</td>";
                } elseif ($cuarto_quali['pos_voto'] == $array_quali_posiciones[4]) {
                    $GLOBALS['puntos_1'] = $GLOBALS['puntos_1'] + 10;
                    echo "<td> $cuarto_quali[const] 10</td>";
                } else {
                    echo "<td> $cuarto_quali[const] 0</td>";
                }
                
            }else{
                echo "<td>Falta</td>";
                echo "<td>Falta</td>";
                echo "<td>Falta</td>";
                echo "<td>Falta</td>";
                echo "<td>Falta</td>";
                echo "<td>Falta</td>";
            }

            if (mysqli_num_rows($votacion)>0) {
      
                $cuarto_equipo_query_carrera = "select cuarto_equipo from votaciones where usuario='$_SESSION[username]';";
                $cuarto_equipo_query_quali = "select cuarto_equipo from votacion_quali where usuario='$_SESSION[username]';";
                $cuarto_equipo_carrera = mysqli_query($db, $cuarto_equipo_query_carrera);
                $cuarto_equipo_quali = mysqli_query($db, $cuarto_equipo_query_quali);

                $cuarto_carrera = mysqli_fetch_assoc($cuarto_equipo_carrera);
                $cuarto_quali = mysqli_fetch_assoc($cuarto_equipo_quali);



                $cuarto_equipo_query_carrera = "select sum(c.posicion) as pos_voto,c.constructor as const from carrera c, votaciones v where c.constructor=v.cuarto_equipo and v.usuario='$_SESSION[username]' group by constructor;";
                $cuarto_equipo_query_quali = "select sum(q.posicion) as pos_voto,q.constructor as const from quali q, votacion_quali v where q.constructor=v.cuarto_equipo and v.usuario='$_SESSION[username]' group by constructor;";
                $cuarto_equipo_carrera = mysqli_query($db, $cuarto_equipo_query_carrera);
                $cuarto_equipo_quali = mysqli_query($db, $cuarto_equipo_query_quali);

                $cuarto_carrera = mysqli_fetch_assoc($cuarto_equipo_carrera);
                $cuarto_quali = mysqli_fetch_assoc($cuarto_equipo_quali);


                $resultados_carrera_query = "select distinct(sum(posicion)) as pos from carrera group by constructor order by sum(posicion);";
                $resultados_quali_query = "select distinct(sum(posicion)) as pos from quali group by constructor order by sum(posicion);";
                $resultado_carrera = mysqli_query($db, $resultados_carrera_query);
                $resultado_quali = mysqli_query($db, $resultados_quali_query);

                $array_carrera_posiciones = [];
                foreach ($resultado_carrera as $pos) {
                    array_push($array_carrera_posiciones, $pos['pos']);
                }
                $array_quali_posiciones = [];
                foreach ($resultado_quali as $pos) {
                    array_push($array_quali_posiciones, $pos['pos']);
                }

           
           
                $resultado = mysqli_fetch_assoc($votacion);
                $array_jugador = [];
                foreach ($resultado as $posicion) {
                    array_push($array_jugador, $posicion);
                }
                $resultado_query = "select code from carrera order by posicion limit 10;";
                $resultado = mysqli_query($db, $resultado_query);



                $array_total = [];
                foreach ($resultado as $codigo) {
                    array_push($array_total, $codigo['code']);
                }



                $puesto_exacto = array_intersect_assoc($array_jugador, $array_total);

                $indices = array_keys($puesto_exacto);

                foreach ($indices as $indice) {
                    if (array_key_exists($indice, $array_jugador)) {
                        unset($array_jugador[$indice]);
                        unset($array_total[$indice]);
                    }
                }

                $top10 = array_intersect($array_jugador, $array_total);


                $puntos_2 = $puntos + 15 * count($puesto_exacto) + 5 * count($top10);
                echo "
                                               
                                                <td>" . count($puesto_exacto) . " = " . (15 * count($puesto_exacto)) . " PTS</td>
                                                <td>" . count($top10) . " = " . (5 * count($top10)) . " PTS </td>";



                $vr_query_carrera = "select code from carrera where posicion_vuelta=1";
                $vr_carrera = mysqli_query($db, $vr_query_carrera);
                $vr = mysqli_fetch_assoc($vr_carrera);

                $vr_query_votacion = "select vr from votaciones where usuario='$_SESSION[username]'";
                $vr_votacion = mysqli_query($db, $vr_query_votacion);
                $voto = mysqli_fetch_assoc($vr_votacion);

                if ($vr['code'] == $voto['vr']) {
                    $GLOBALS['puntos_2'] = $GLOBALS['puntos_2'] + 10;
                    echo "<td>10 PTS</td>";
                } else {
                    echo "<td>0 PTS</td>";
                }


                $dnf_voto_query = "select dnf from votaciones where usuario='$_SESSION[username]'";
                $dnf_voto = mysqli_query($db, $dnf_voto_query);
                $dnf_jugador = mysqli_fetch_assoc($dnf_voto);



                $dnf_carrera_query = "select code,estado from carrera where estado not like 'Finished' and estado not like '+1 Lap' and estado not like '+2 Laps' and estado not like '+3 Laps' and estado not like '+4 Laps' and estado not like '+5 Laps' and estado not like 'Retired'";
                $dnf_estado = mysqli_query($db, $dnf_carrera_query);

                $array_dnfs = [];
                foreach ($dnf_estado as $dnf) {
                    array_push($array_dnfs, $dnf['code']);
                }
                 
                echo count($array_dnfs);
                $if = 0;
                for ($i=0; $i < count($array_dnfs); $i++) {
                   
                    if ($dnf_jugador['dnf'] == $array_dnfs[$i]){
                        $GLOBALS['puntos_2'] = $GLOBALS['puntos_2'] +  25;
                        echo "<td>25 PTS</td>";
                        
                    }else {
                        $if++;
                    }  
                    if ($if==count($array_dnfs)) {
                        echo "<td>0 PTS</td>";
                    } 
                }    
                
                
               
                $adelantamiento_query = "select adelantamientos from votaciones where usuario='$_SESSION[username]'";
                $adelantamiento_voto = mysqli_query($db, $adelantamiento_query);
                $adelantamiento_jugador = mysqli_fetch_assoc($adelantamiento_voto);


                $adelantamientos_carrera_query = "select (pos_salida-posicion) as num,code from carrera order by num desc;";
                $adelantamientos_carrera = mysqli_query($db, $adelantamientos_carrera_query);

                $rowcount = mysqli_num_rows($adelantamientos_carrera);

                $array_adelantamientos = [];

                foreach ($adelantamientos_carrera as $adelantamiento) {

                    $array_adelantamientos[] =

                        
                            array(
                                'piloto' => $adelantamiento['code'],
                                'adelantamientos' => $adelantamiento['num']
                            );
                        
                }



                foreach ($array_adelantamientos as $piloto) {

                        if ($adelantamiento_jugador['adelantamientos'] == $piloto['piloto']) {

                            $piloto_adelantamientos = $piloto['piloto'];
                            $num_adelantamientos = $piloto['adelantamientos'];
                            
                       
                    }
                }

                $adelantamientos_update = "update votaciones set num_adelantamientos='$num_adelantamientos' where usuario='$_SESSION[username]';";
                $adelantamientos = mysqli_query($db, $adelantamientos_update);
                $num_adelantamientos_jugador_query = "select num_adelantamientos from votaciones group by num_adelantamientos order by num_adelantamientos desc limit 3;";
                $first_adelantamientos_query = "select num_adelantamientos from votaciones group by num_adelantamientos order by num_adelantamientos desc limit 1;";
                $second_adelantamientos_query = "select num_adelantamientos from votaciones group by num_adelantamientos order by num_adelantamientos desc limit 1,1;";
                $third_adelantamientos_query = "select num_adelantamientos from votaciones group by num_adelantamientos order by num_adelantamientos desc limit 2,1;";

                $first_adelantamientos = mysqli_query($db, $first_adelantamientos_query);
                $second_adelantamientos = mysqli_query($db, $second_adelantamientos_query);
                $third_adelantamientos = mysqli_query($db, $third_adelantamientos_query);
                $first = mysqli_fetch_assoc($first_adelantamientos);
                $second = mysqli_fetch_assoc($second_adelantamientos);
                $third = mysqli_fetch_assoc($third_adelantamientos);


                if ($num_adelantamientos == $first['num_adelantamientos']) {
                    $GLOBALS['puntos_2'] = $GLOBALS['puntos_2'] + 25;
                    echo "<td>25 PTS</td>";
                } elseif ($num_adelantamientos == $second['num_adelantamientos']) {
                    $GLOBALS['puntos_2'] = $GLOBALS['puntos_2'] + 15;
                    echo "<td>15 PTS</td>";
                } elseif ($num_adelantamientos == $third['num_adelantamientos']) {
                    $GLOBALS['puntos_2'] = $GLOBALS['puntos_2'] + 5;
                    echo "<td>5 PTS</td>";
                } else {
                    echo "<td>0 PTS</td>";
                }





                if ($cuarto_carrera['pos_voto'] == $array_carrera_posiciones[3]) {
                    $GLOBALS['puntos_2'] = $GLOBALS['puntos_2'] + 20;
                    echo "<td> $cuarto_carrera[const] 20</td>";
                } elseif ($cuarto_carrera['pos_voto'] == $array_carrera_posiciones[2]) {
                    $GLOBALS['puntos_2'] = $GLOBALS['puntos_2'] + 10;
                    echo "<td> $cuarto_carrera[const] 10</td>";
                } elseif ($cuarto_carrera['pos_voto'] == $array_carrera_posiciones[4]) {
                    $GLOBALS['puntos_2'] = $GLOBALS['puntos_2'] + 10;
                    echo "<td> $cuarto_carrera[const] 10</td>";
                } else {
                    echo "<td> $cuarto_carrera[const] 0</td>";
                }








              
                                                
        

            }else{
                echo "<td>Falta</td>";
                echo "<td>Falta</td>";
                echo "<td>Falta</td>";
                echo "<td>Falta</td>";
                echo "<td>Falta</td>";
                echo "<td>Falta</td>";
            }
            echo "<td>" . $puntos_2 . "</td>";
            echo "<td>" . $puntos_1 . "</td>";
            echo "<td>" . $puntos_1+$puntos_2 . "</td>
            <td>" . $puntos_totales['puntos'] . "</td></tr>";
            echo "</table>";
            } else {
            echo "<div class='d-flex justify-content-center align-items-center vh-100'><h1>Se estan asignando los puntos, espere a que acabe la carrera<h1></div>";
        }
    }
    if ($_SESSION['username'] == "admin") {
        echo "<div class='d-flex justify-content-center align-items-center vh-100'><h1><a href='paneladmin.php'>Panel</a><h1></div>";
    }
    ?>

</body>

</html>