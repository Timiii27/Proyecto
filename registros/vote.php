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
</head>
<body>
    <form action="vote.php">
    <?php
    
    $xml_drivers = simplexml_load_file("../drivers.xml.cache");

    for ($i=0; $i < 11; $i++) { 
    
        echo "<select name='pos_$i'>";
                foreach ($xml_drivers->StandingsTable->StandingsList->DriverStanding as $driver){
                            echo "<p>Posicion $i</p> <option value='$driver[code]'>".$driver->Driver->FamilyName."</option>";
                            }
                            
        echo "</select><br>";
        }
        
    ?>
    
    
    </form>
    <a href="logout.php">Logout</a>
</body>
</html>