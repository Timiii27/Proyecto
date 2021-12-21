<?php

session_start();
if (isset($_SESSION['username'])) {
    header("location: vote.php");
}else {
    header("location: login.php");   
}

?>