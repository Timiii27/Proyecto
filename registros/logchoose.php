<?php

session_start();
if (isset($_SESSION['username'])) {
    header("location: elegir.php");
}else {
    header("location: register.php");   
}

?>