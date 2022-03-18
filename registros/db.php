<?php
session_start();

// initializing variables
$username = "";
$email    = "";
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'f1');

// REGISTER USER
if (isset($_POST['submit'])) {
  // receive all input values from the form
  $username = mysqli_real_escape_string($db, $_POST['user']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['pass1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['pass2']);
  $number = preg_match('@[0-9]@', $password_1);
  $uppercase = preg_match('@[A-Z]@', $password_1);
  $lowercase = preg_match('@[a-z]@', $password_1);
  $specialChars = preg_match('@[^\w]@', $password_1);
  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($username)) {
      array_push($errors, "Hace falta poner un usuario");
    }
  if (empty($email)) {
      array_push($errors, "Hace falta poner un correo"); 
    }
  if (empty($password_1)) {
      array_push($errors, "Hace falta poner una contraseña"); 
    }
    if(strlen($password_1) < 8 || !$number || !$uppercase || !$lowercase || !$specialChars) {
        array_push($errors,"La contraseña debe tener 8 caractere de largo, un numero, una minscula, una mayuscula y un caracter especial");
    }
  if ($password_1 != $password_2) {
	array_push($errors, "No coinciden las contraseñas");
  }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['username'] === $username) {
      array_push($errors, "Usuario ya existe");
    }

    if ($user['email'] === $email) {
      array_push($errors, "Correo ya existe");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = sha1($password_1);//encrypt the password before saving in the database

  	$query = "INSERT INTO users (username, email, password) VALUES('$username', '$email', '$password')";
  	mysqli_query($db, $query);
  	/* $query = "INSERT INTO users_puntos (username) VALUES('$username')";
  	mysqli_query($db, $query); */
  	$_SESSION['username'] = $username;
    
  	header('location: login.php');
  }
}

if (isset($_POST['login'])) {
    $username = mysqli_real_escape_string($db, $_POST['user_login']);
    $password = mysqli_real_escape_string($db, $_POST['pass_login']);
  
    if (empty($username)) {
        array_push($errors, "Hace falta poner el usuario");
    }
    if (empty($password)) {
        array_push($errors, "Hace falta poner la contraseña");
    }
  
    if (count($errors) == 0) {
        $pass = sha1($password);
        $query = "SELECT * FROM users WHERE username='$username' AND password='$pass'";
        $results = mysqli_query($db, $query);
        if (mysqli_num_rows($results) == 1) {
          $_SESSION['username'] = $username;
          setcookie('session',0,time()+60*60*24*30);
          header('location: logchoose.php');
        }else {
            array_push($errors, "Wrong username/password combination");
        }
    }
  }

  
  ?>