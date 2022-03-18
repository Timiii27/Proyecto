<?php include('db.php') ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css_register/css_register.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Register</title>
</head>

<body>
   


<nav  class="col-12 d-flex align-items-center justify-content-between nav-fixed" id="nav">
        <div class="d-flex col-4 justify-content-around align-items-center">
            <a href="#home"><img src="/images/f1logo.png" alt="logo" width="100px"></a>
        </div>
        <div class="d-flex col-8 justify-content-evenly">
        <a href="../index.php">Home</a>
            <a href="elegir.php">Menu Principal</a>
    
        <?php 
        
        if (isset($_SESSION['username'])) {
            echo "<button>
            <a href='/registros/logchoose.php'>Votar</a>
            </button><span class='welcome'>Bienvenido $_SESSION[username]</span>";
            
           
        }else{
            echo "<button>
            <a href='/registros/logchoose.php'>Votar</a>
        </button>
        <button>
            <a href='/registros/register.php'>Register</a>
        </button>";
        }
        ?>
        </div>
    </nav>
    <?php include('errors.php') ?>
    <div class="container" id="container">
	<div class="form-container sign-up-container">
		<form action="register.php" method="post">
			<h1>Crear cuenta</h1>
			<div action="register.php" method="post" enctype="multipart/form">
				<a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
				<a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
				<a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
			</div>
			<span>or use your email for registration</span>
                <input type="text" name="user" placeholder="Nombre de usuario">
                <input type="password" name="pass1" placeholder="Contraseña">
                <input type="password" name="pass2" placeholder="Repetir contraseña">
                <input type="email" name="email" placeholder="Correo">
                <input type="submit" name="submit" value="Enviar">
			
		</form>
	</div>
	<div class="form-container sign-in-container">
		<form action="register.php" method="post">
			<h1>Usa tu cuenta ya creada</h1>
		
                <input type="text" name="user_login" placeholder="Usuario o email">
                <input type="password" name="pass_login" placeholder="Contraseña">
                <input type="submit" name="login" value="Login">
			
		</form>
	</div>
	<div class="overlay-container">
		<div class="overlay">
			<div class="overlay-panel overlay-left">
				<h1>Bienvenido</h1>
				<p>Si ya tienes una cuenta haz click en el boton abajo y entra</p>
				<button class="ghost" id="signIn">Entrar</button>
			</div>
			<div class="overlay-panel overlay-right">
				<h1>Hola Amigo!</h1>
				<p>Unete a nuestra comunidad en este fantastico juego</p>
				<button class="ghost" id="signUp">Registrarse</button>
			</div>
		</div>
	</div>
</div>

<script src="./css_register/js.js"></script>
</body>

</html>
