<?php include('db.php') ?>
<?php include '../xml/guardar.php' ?>
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

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css_register/css_panel.css">
    <title>Document</title>
</head>
<body> 
    <a href="elegir.php">Volver</a>
    <form action="" method="post">
        <input type="submit" name="insert_carrera" value="Carrera">
        <input type="submit" name="delete_carrera" value="Borrar Carrera">
        <input type="submit" name="recuento" value="Contar">
        <input type="submit" name="habilitar_recuento" value="Habilitar">
    </form>
    <?php
        if (isset($_POST['habilitar_recuento'])) {
            $update_check_query = "update check_contar set recuento=0";
            $query_update = mysqli_query($db,$update_check_query);
        }
        if ($_SESSION['username'] == "admin") {
           
            $datos_carrera = file_get_contents('../last_race.json');
            $json_decode_lr = json_decode($datos_carrera,true);
            
            
            if (isset($_POST['delete_carrera'])) {
                $delete_query= "DELETE FROM carrera";
                $delete = mysqli_query($db,$delete_query);
            }
           
            if (isset($_POST['insert_carrera'])) {
                
                foreach($json_decode_lr['RaceTable']['Race']['ResultsList']['Result'] as $carrera){
        
                    
                    error_reporting(0);
                    $numero = $carrera['@attributes']['number'];
                    $posicion = $carrera['@attributes']['position'];
                    $id= $carrera['Driver']['@attributes']['driverId'];
                    $codigo= $carrera['Driver']['@attributes']['code']; 
                    $estado= $carrera['Status']; 
                    $tiempo= $carrera['FastestLap']['@attributes']['rank']; 
                    $constructor= $carrera['Constructor']['Name']; 
        
                    
                    
                    $query = "INSERT INTO carrera
                    VALUES('$numero','$posicion','$id','$codigo','$estado','$tiempo','$constructor')";
                    $insert = mysqli_query($db,$query);   
                
                    
                }
                
           
                
                $datos_quali = file_get_contents('../quali.json');
                $json_decode_quali = json_decode($datos_quali,true);
                
                
                
                foreach($json_decode_quali['RaceTable']['Race']['QualifyingList']['QualifyingResult'] as $quali){
            
                    
                    
                    $numero = $quali['@attributes']['number'];
                    $posicion = $quali['@attributes']['position'];
                    $id= $quali['Driver']['@attributes']['driverId'];
                    $codigo= $quali['Driver']['@attributes']['code']; 
                    $constructor= $quali['Constructor']['Name']; 
                
                
                
                    
                    
                    $query = "INSERT INTO quali
                    VALUES('$posicion','$numero','$id','$codigo','$constructor')";
                    $insert = mysqli_query($db,$query);   
                
                
                }    
            }
     
    
                    if (isset($_POST['recuento'])  ) { 
                        $check_contar = "select recuento from check_contar;";
                        $contar_query = mysqli_query($db,$check_contar);
                        foreach($contar_query as $sentencia){
                            $check= $sentencia['recuento'] ;
                        }
                        if ($check == 0) {
                            $update_check_query = "update check_contar set recuento=1";
                            $query_update = mysqli_query($db,$update_check_query);
                            
                            $array_jugadores="select usuario from votaciones";
                            $usuarios = mysqli_query($db,$array_jugadores);
                            echo "<table>
                                    <tr>
                                    <th>Usuario</th>
                                    <th>Puestos Exactos Acertados</th>
                                    <th>Puestos Top 10 Acertados</th>
                                    <th>VR</th>
                                    <th>DNF</th>
                                    <th>Numero de adelantamientos que ha hecho tu piloto</th>
                                    <th>Puntos Adelantamientos</th>
                                    <th>Pos1</th>
                                    <th>Pos5</th>
                                    <th>Pos10</th>
                                    <th>Pos15</th>
                                    <th>Pos20</th>
                                    <th>Puntos en la ultima carrera</th>
                                    <th>Puntos totales</th></tr>";
                            foreach($usuarios as $usuario){
                                $votacion_query = "select pos1,pos2,pos3,pos4,pos5,pos6,pos7,pos8,pos9,pos10 from votaciones where usuario='$usuario[usuario]';";
                                $votacion = mysqli_query($db,$votacion_query);
                                $resultado = mysqli_fetch_assoc($votacion); 
                                $array_jugador = [];
                                foreach ($resultado as $posicion){
                                array_push($array_jugador,$posicion);
                                } 
                                $resultado_query = "select code from carrera order by posicion limit 10;";
                                $resultado = mysqli_query($db,$resultado_query);
                                
                            
                                
                                $array_total = [];
                                foreach ($resultado as $codigo){
                                array_push($array_total,$codigo['code']);
                                } 
                        
                                
                                
                                $puesto_exacto = array_intersect_assoc($array_jugador, $array_total);
                                
                                $indices = array_keys($puesto_exacto);
                                
                                foreach ($indices as $indice){
                                    if (array_key_exists($indice,$array_jugador)) {
                                    unset($array_jugador[$indice]);
                                    unset($array_total[$indice]);
                                    }  
                                }
                                
                                $top10 = array_intersect($array_jugador,$array_total);
                                
                                
                                $puntos = 15*count($puesto_exacto)+5*count($top10);
                                echo "<tr>
                                <td>".$usuario['usuario']."</td>
                                <td>".count($puesto_exacto)."</td>
                                <td>".count($top10);  
                            
                                

                                $vr_query_carrera = "select code from carrera where posicion_vuelta=1";
                                $vr_carrera = mysqli_query($db,$vr_query_carrera);
                                $vr = mysqli_fetch_assoc($vr_carrera); 
                               
                                $vr_query_votacion = "select vr from votaciones where usuario='$usuario[usuario]'";
                                $vr_votacion = mysqli_query($db,$vr_query_votacion);
                                $voto = mysqli_fetch_assoc($vr_votacion); 
                                
                                if ($vr['code']==$voto['vr']) {
                                $GLOBALS['puntos'] = $GLOBALS['puntos'] + 10;
                                echo "<td>SI</td>";
                                }else {
                                    echo "<td>NO</td>";
                                }    
                                
                                
                                $dnf_voto_query = "select dnf from votaciones where usuario='$usuario[usuario]'";
                                $dnf_voto = mysqli_query($db,$dnf_voto_query);
                                $dnf_jugador = mysqli_fetch_assoc($dnf_voto);
                                
                                
                                
                                $dnf_carrera_query = "select code,estado from carrera where estado not like 'Finished' and estado not like '+1 Lap' and estado not like '+2 Laps' and estado not like '+3 Laps' and estado not like '+4 Laps' and estado not like '+5 Laps' and estado not like 'Retired'";
                                $dnf_estado=mysqli_query($db,$dnf_carrera_query);
                                
                                $array_dnfs=[];
                                foreach ($dnf_estado as $dnf) {
                                    array_push($array_dnfs,$dnf['code']);
                                }
                                
                                
                                    
                                    for ($i=0; $i < count($array_dnfs); $i++) { 
                                        
                                        if ($dnf_jugador['dnf']==$array_dnfs[$i]) {
                                            
                                            $GLOBALS['puntos'] = $GLOBALS['puntos'] + 25;
                                            
                                            echo "<td>SI</td>";
                                        }else {
                                            echo "<td>NO</td>";
                                        }    
                                    }
                                $adelantamiento_query = "select adelantamientos from votaciones where usuario='$usuario[usuario]'";
                                $adelantamiento_voto = mysqli_query($db,$adelantamiento_query);
                                $adelantamiento_jugador = mysqli_fetch_assoc($adelantamiento_voto);


                                $adelantamientos_carrera_query = "select (q.posicion - c.posicion) as num,c.code from quali q,carrera c where c.number=q.number order by num desc;";
                                $adelantamientos_carrera = mysqli_query($db,$adelantamientos_carrera_query);
                                
                                $rowcount=mysqli_num_rows($adelantamientos_carrera);
                                
                                $array_adelantamientos=[];
                                
                                foreach ($adelantamientos_carrera as $adelantamiento) {
                                        
                                        $array_adelantamientos[]=
                                        
                                                                        array(
                                                                          array(
                                                                              'piloto'=>$adelantamiento['code'],
                                                                              'adelantamientos'=>$adelantamiento['num']
                                                                          )          
                                                                        );

                                    }
                                    
                               
                                    
                                foreach ($array_adelantamientos as $array_piloto_adelantamientos) {
                                    foreach ($array_piloto_adelantamientos as $piloto ) {
                                        if($adelantamiento_jugador['adelantamientos']==$piloto['piloto']){
                                            
                                            $piloto_adelantamientos= $piloto['piloto'];
                                            $num_adelantamientos= $piloto['adelantamientos'];
                                            echo "<td>".$piloto['adelantamientos']." ".$piloto['piloto']."</td>";
                                        }
                                    }
                                } 

                                $adelantamientos_update = "update votaciones set num_adelantamientos='$num_adelantamientos' where usuario='$usuario[usuario]';";
                                $adelantamientos = mysqli_query($db,$adelantamientos_update);
                                $num_adelantamientos_jugador_query = "select num_adelantamientos from votaciones group by num_adelantamientos order by num_adelantamientos desc limit 3;";
                                $first_adelantamientos_query = "select num_adelantamientos from votaciones group by num_adelantamientos order by num_adelantamientos desc limit 1;";
                                $second_adelantamientos_query = "select num_adelantamientos from votaciones group by num_adelantamientos order by num_adelantamientos desc limit 1,1;";
                                $third_adelantamientos_query = "select num_adelantamientos from votaciones group by num_adelantamientos order by num_adelantamientos desc limit 2,1;";

                                $first_adelantamientos=mysqli_query($db,$first_adelantamientos_query);
                                $second_adelantamientos=mysqli_query($db,$second_adelantamientos_query);
                                $third_adelantamientos=mysqli_query($db,$third_adelantamientos_query);
                                $first = mysqli_fetch_assoc($first_adelantamientos);
                                $second = mysqli_fetch_assoc($second_adelantamientos);
                                $third = mysqli_fetch_assoc($third_adelantamientos);
                                
                                
                                if ($num_adelantamientos==$first['num_adelantamientos']) {
                                    $GLOBALS['puntos'] = $GLOBALS['puntos'] + 25;
                                    echo "<td>25</td>";
                                }
                                elseif($num_adelantamientos==$second['num_adelantamientos']) {
                                    $GLOBALS['puntos'] = $GLOBALS['puntos'] + 15;
                                    echo "<td>15</td>";
                                }
                                elseif($num_adelantamientos==$third['num_adelantamientos']) {
                                    $GLOBALS['puntos'] = $GLOBALS['puntos'] + 5;
                                    echo "<td>5</td>";
                                }else {
                                    echo "<td>0</td>";
                                }   
                                $quali_query_1 = "select pos1,pos5,pos10,pos15,pos20 from votacion_quali where usuario='$usuario[usuario]';";    
                                
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
                                
                                
                                $quali_resultado_1=mysqli_query($db, $query_quali_resultado_1);
                                $quali_resultado_2=mysqli_query($db, $query_quali_resultado_2);
                                $quali_resultado_4=mysqli_query($db, $query_quali_resultado_4);
                                $quali_resultado_5=mysqli_query($db, $query_quali_resultado_5);
                                $quali_resultado_6=mysqli_query($db, $query_quali_resultado_6);
                                $quali_resultado_9=mysqli_query($db, $query_quali_resultado_9);
                                $quali_resultado_10=mysqli_query($db, $query_quali_resultado_10);
                                $quali_resultado_11=mysqli_query($db, $query_quali_resultado_11);
                                $quali_resultado_14=mysqli_query($db, $query_quali_resultado_14);
                                $quali_resultado_15=mysqli_query($db, $query_quali_resultado_15);
                                $quali_resultado_16=mysqli_query($db, $query_quali_resultado_16);
                                $quali_resultado_19=mysqli_query($db, $query_quali_resultado_19);
                                $quali_resultado_20=mysqli_query($db, $query_quali_resultado_20);

                                $posicion_1=mysqli_fetch_assoc($quali_resultado_1);
                                $posicion_2=mysqli_fetch_assoc($quali_resultado_2);
                                $posicion_4=mysqli_fetch_assoc($quali_resultado_4);
                                $posicion_5=mysqli_fetch_assoc($quali_resultado_5);
                                $posicion_6=mysqli_fetch_assoc($quali_resultado_6);
                                $posicion_9=mysqli_fetch_assoc($quali_resultado_9);
                                $posicion_10=mysqli_fetch_assoc($quali_resultado_10);
                                $posicion_11=mysqli_fetch_assoc($quali_resultado_11);
                                $posicion_14=mysqli_fetch_assoc($quali_resultado_14);
                                $posicion_15=mysqli_fetch_assoc($quali_resultado_15);
                                $posicion_16=mysqli_fetch_assoc($quali_resultado_16);
                                $posicion_19=mysqli_fetch_assoc($quali_resultado_19);
                                $posicion_20=mysqli_fetch_assoc($quali_resultado_20);

                                $quali_1_voto=mysqli_query($db, $quali_query_1);
                              
                                $quali_1=mysqli_fetch_assoc($quali_1_voto);
                                

                                    if ($quali_1['pos1']==$posicion_1['code'] && $posicion_1['posicion']==1) {
                                        $GLOBALS['puntos'] = $GLOBALS['puntos'] + 5;
                                        echo "<td>$quali_1[pos1] 5</td>";
                                        
                                    }elseif ($quali_1['pos1']==$posicion_2['code']) {
                                        $GLOBALS['puntos'] = $GLOBALS['puntos'] + 3;
                                        echo "<td>$quali_1[pos1] 3</td>";
                                    }else{
                                        echo "<td>$quali_1[pos1] 0</td>";
                                    } 
                                    if ($quali_1['pos5']==$posicion_5['code'] && $posicion_5['posicion']==5) {
                                        $GLOBALS['puntos'] = $GLOBALS['puntos'] + 10;
                                        echo "<td>$quali_1[pos5] 10</td>";
                                    }elseif ($quali_1['pos5']==$posicion_4['code']) {
                                        $GLOBALS['puntos'] = $GLOBALS['puntos'] + 5;
                                        echo "<td>$quali_1[pos5] 5</td>";
                                    }elseif ($quali_1['pos5']==$posicion_6['code']) {
                                        $GLOBALS['puntos'] = $GLOBALS['puntos'] + 5;
                                        echo "<td>$quali_1[pos5] 5</td>";
                                    }else{
                                        echo "<td>$quali_1[pos5] 0</td>";
                                    }
                                    if ($quali_1['pos10']==$posicion_10['code'] && $posicion_10['posicion']==10) {
                                        $GLOBALS['puntos'] = $GLOBALS['puntos'] + 10;
                                        echo "<td>$quali_1[pos10] 10</td>";
                                    }elseif ($quali_1['pos10']==$posicion_9['code']) {
                                        $GLOBALS['puntos'] = $GLOBALS['puntos'] + 5;
                                        echo "<td>$quali_1[pos10] 5</td>";
                                    }elseif ($quali_1['pos10']==$posicion_11['code']) {
                                        $GLOBALS['puntos'] = $GLOBALS['puntos'] + 5;
                                        echo "<td>$quali_1[pos10] 5</td>";
                                    }else{
                                        echo "<td>$quali_1[pos10] 0</td>";
                                    } 
                                    
                                    if ($quali_1['pos15']==$posicion_15['code'] && $posicion_15['posicion']==15) {
                                        $GLOBALS['puntos'] = $GLOBALS['puntos'] + 10;
                                        echo "<td>$quali_1[pos15] 10</td>";
                                    }elseif ($quali_1['pos15']==$posicion_14['code']) {
                                        $GLOBALS['puntos'] = $GLOBALS['puntos'] + 5;
                                        echo "<td>$quali_1[pos15] 5</td>";
                                    }elseif ($quali_1['pos15']==$posicion_16['code']) {
                                        $GLOBALS['puntos'] = $GLOBALS['puntos'] + 5;
                                        echo "<td>$quali_1[pos15] 5</td>";
                                    }else{
                                        echo "<td>$quali_1[pos15] 0</td>";
                                    } 
                                    if ($quali_1['pos20']==$posicion_20['code'] && $posicion_20['posicion']==20) {
                                        $GLOBALS['puntos'] = $GLOBALS['puntos'] + 5;
                                        echo "<td>$quali_1[pos20]5</td>";
                                        
                                    }elseif ($quali_1['pos20']==$posicion_19['code']) {
                                        $GLOBALS['puntos'] = $GLOBALS['puntos'] + 3;
                                        echo "<td>$quali_1[pos20]3</td>";
                                    }else{
                                        echo "<td>$quali_1[pos20]0</td>";
                                    } 

                                    
                                    

                                   
                                   
                                
                            /*     echo "<td>".$quali_1['pos1']."</td>
                                <td>".$quali_1['pos5']."</td>
                                <td>". $quali_1['pos10']."</td>
                                <td>".$quali_1['pos15']."</td>
                                <td>".$quali_1['pos20']."</td>"; */
                                
                                echo "<td>".$puntos."</td>";
                                $puntos_update = "update users set puntos=puntos+$puntos where username='$usuario[usuario]';";
                                $puntos = mysqli_query($db,$puntos_update);
                                $check_contar = "select puntos from users where username='$usuario[usuario]'";
                                $contar_query = mysqli_query($db,$check_contar);
                                $puntos_totales= mysqli_fetch_assoc($contar_query);
                                echo "<td>".$puntos_totales['puntos']."</td></tr>";
                                        
                            } 
                            echo "</table>";   
                        }else {
                            echo "Ya se ha hecho la asignacion de puntos";
                            
                        }
                    }
            $carrera_tabla_query = "select * from carrera order by posicion";
            $carrera_tabla = mysqli_query($db,$carrera_tabla_query);
             
            echo "<h1>Carrera</h1><table>";
            echo "<tr><th>Numero</th>";
            echo "<th>Posicion</th>";
            echo "<th>Piloto</th>";
            echo "<th>Estado</th>";
            echo "<th>Posicion Vuelta Rapida</th></tr>";
            foreach ($carrera_tabla as $field) {
                echo "<tr><td>".$field['number']."</td>";
                echo "<td>".$field['posicion']."</td>";
                echo "<td>".$field['driverId']."</td>";
                echo "<td>".$field['estado']."</td>";
                echo "<td>".$field['posicion_vuelta']."</td></tr>";
               
            }
            echo "</table>";
        
            $quali_tabla_query = "select * from quali order by posicion";
            $quali_tabla = mysqli_query($db,$quali_tabla_query);
             
            echo "<h1>Quali</h1><table>";
            echo "<tr><th>Numero</th>";
            echo "<th>Posicion</th>";
            echo "<th>Piloto</th></tr>";
            foreach ($quali_tabla as $field) {
                echo "<tr><td>".$field['number']."</td>";
                echo "<td>".$field['posicion']."</td>";
                echo "<td>".$field['driverId']."</td></tr>";
               
            }
            echo "</table>";
        
        }else {
            echo "No tienes acceso a esta sala";
        }
    
        
    ?>
</body>
</html>