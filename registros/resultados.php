<?php include('db.php') ?>

<?php 
  if (!isset($_SESSION['username'])) {
  	header('location: login.php');
  }



  for ($i=1; $i < 11 ; $i++) { 

    $pos = $_GET["pos_$i"];
    echo $pos."<br>";
  }
 
?>
