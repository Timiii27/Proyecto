<?php include('db.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php 

if ($_SESSION['username'] == 'timi') {
    $datos_carrera = file_get_contents('../last_race.json');
    $json_decode_lr = json_decode($datos_carrera,true);
    
    
    
    foreach($json_decode_lr['RaceTable']['Race']['ResultsList']['Result'] as $carrera){

        
        
        $numero = $carrera['@attributes']['number'];
        $posicion = $carrera['@attributes']['position'];
        $id= $carrera['Driver']['@attributes']['driverId'];
        $codigo= $carrera['Driver']['@attributes']['code']; 
        $estado= $carrera['Status']; 
        
    
        
    
         $query = "INSERT INTO carrera
        VALUES('$numero','$posicion','$id','$codigo','$estado')";
        $insert = mysqli_query($db,$query);   
    
      
    }
    
    /* if($query->execute()){
        echo "Registros exitosos";
    }
     */
}else{
    echo "No se puede estar aqui :)";
}


?>
</body>
</html>