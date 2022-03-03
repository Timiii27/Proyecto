<?php include('db.php') ?>

<?php 

  if (!isset($_SESSION['username'])) {
  	header('location: login.php');
  }
  
    $alfa = $_GET["alfa"];
    $alphatauri = $_GET["alphatauri"];
    $alpine = $_GET["alpine"];
    $aston_martin = $_GET["aston_martin"];
    $ferrari = $_GET["ferrari"];
    $haas = $_GET["haas"];
    $mclaren = $_GET["mclaren"];
    $mercedes = $_GET["mercedes"];
    $red_bull = $_GET["red_bull"];
    $williams = $_GET["williams"];
    echo $alfa;
    echo $alphatauri;
    
    $check_query = "SELECT * FROM votacion_anual_constructores where username='$_SESSION[username]';";
    $resultado_votacion = mysqli_query($db,$check_query);
    if (mysqli_num_rows($resultado_votacion) > 0) {
      $votacion_query = "update votacion_anual_constructores
      set mercedes='$mercedes',
      red_bull='$red_bull',
      ferrari='$ferrari',
      mclaren='$mclaren',
      alpha_tauri='$alphatauri',
      alpine='$alpine',
      aston_martin='$aston_martin',
      alpha_romeo='$alfa',
      williams='$williams',
      haas='$haas'
      where username='$_SESSION[username]';";
      $resultado_votacion = mysqli_query($db, $votacion_query);
    }else {
      $votacion_query = "INSERT into votacion_anual_constructores (username,mercedes,red_bull,ferrari,mclaren,alpha_tauri,alpine,aston_martin,alpha_romeo,williams,haas) 
      values ('$_SESSION[username]','$mercedes','$red_bull','$ferrari','$mclaren','$alphatauri','$alpine','$aston_martin','$alfa','$williams','$haas');";
      
      
      $resultado_votacion = mysqli_query($db, $votacion_query);
    }
     header("Location:elegir.php"); 
    
 
?>
