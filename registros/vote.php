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
    <form class="d-grid justify-content-center align-items-center  vh-100" style="grid-template-columns:repeat(5,1fr)" action="resultados.php" method="get">
    <?php
        
        $xml_drivers = simplexml_load_file("../drivers.xml.cache");

        
        for ($i=1; $i < 11; $i++) { 
            
            echo "<select name='pos_$i' multiple='multiple' size='10'>";
                    foreach ($xml_drivers->StandingsTable->StandingsList->DriverStanding as $driver){
                                echo '<option value="'.$driver->Driver['code'].'">'.$driver->Driver->FamilyName."</option>";
                                }
 
            echo "</select>";
            } 

            ?>
    
    <input  type="submit" value="Hacer votacion">
    </form>

    
    <script src="vote.js"></script>
</body>
</html>