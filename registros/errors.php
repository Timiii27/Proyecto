<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css_register/css_register.css">
    <title>Document</title>
</head>
<body>

<?php  

if (count($errors) > 0){
    echo "<div class='error'>
    <div><h1>Errores</h1></div>";
    foreach ($errors as $error){
              echo "<span> $error </span>";
    }
    echo "</div>";
}
    ?>
    
</body>
</html>
