
<?php
session_start();
include("connexion.php");
if(isset($_POST['login']) & isset($_POST['password']))
{ 

$login = $_POST['login'];
$password = $_POST['password'];

$result = $con->query("select * from compteproprietaire where loginProp like '$login'");



while ($row = $result->fetch())
{
  if($row['motPasse'] == $password)
  {
    $_SESSION['loginProp']=$row['loginProp'];
    $_SESSION['nom']=$row['nom'];
    $_SESSION['prenom']=$row['prenom'];
    
   echo "<script>location.assign('accueil.php')</script>";
    
  }
  else
  {
       echo "<script>alert('login ou mdp incorrect')</script>";
  }
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <title>Authentification</title>
</head>
<body>
<h2 style="color:#6c757d" class="text-center">Authentification</h2>
	<form action="login.php" method="POST" style="width:60%;margin-left:20%;margin-top:1%;padding-bottom:6.55%" >
  		<div class="mb-3">
    		<label for="exampleInputEmail1" class="form-label">Login</label>
    		<input type="text" class="form-control" name="login" required>
  		</div>
  		<div class="mb-3">
    		<label for="exampleInputPassword1" class="form-label">Mot de passe</label>
    		<input type="password" class="form-control" name="password" required>
  		</div>
  		<input type="submit" value="submit" class="btn btn-primary" style="margin-left:45%"><br><br>
	</form>
</body>
</html>