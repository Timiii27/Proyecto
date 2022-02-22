<?php  
session_start();
if (count($errors) > 0){
    foreach ($errors as $error){
              echo "<p> $error </p>";
    }
}
?>