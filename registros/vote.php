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
        <select name="pos_1" id="">
            <option value="ham">hamilton</option>
            <option value="ver">verstappen</option>
        </select>
    </form>
    <a href="logout.php">Logout</a>
</body>
</html>