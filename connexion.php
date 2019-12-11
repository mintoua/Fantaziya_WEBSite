<?php  
include_once "../config.php";
include_once "../Core/ClientCore.php";
include_once "../Entities/client.php";

$clientC = new ClientCore();
$listeClients = $clientC->getAllClients();
$verif=0;
if(!empty($_POST['login']) && !empty($_POST['pwd']))
{
    if (isset($_POST['login']) && isset($_POST['pwd']))
{ 
 foreach($listeClients as $row)
 {  
      if($row['email'] == $_POST['login'] && $row['password'] == $_POST['pwd'] ) 
     {
        $verif=1;
      session_start(); 
      $_SESSION['login'] = $_POST['login'];
      $_SESSION['pwd'] = $_POST['pwd'];
      $_SESSION['id_clt']=$row['id_clt'];
      echo $_SESSION['id_clt'];
     }
    
  }
  if($verif==0)
  {
      echo "echec de la connexion";
  }
}
}
      ?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="style_conn.css">
	<title>Connexion</title>
</head>
 <body>
 	<form name="f" action="connexion.php" method="post">
	<table>
		<caption>connexion</caption>
	<tr> <td> <input type="texte" name="login" placeholder="Addresse mail"></td> </tr>
	<tr>  <td><input type="password" name="pwd" placeholder="Mot de passe" > </td> </tr>
		<tr>  <td> <input type="submit" name="connexion" value="connexion" class="connexion"></input> </td> </tr>
		<tr>  <td> <a href="recuperation.html">Mot de passe oublie?</a>  </td></tr>
	</table>
</form>
</body>
</html>