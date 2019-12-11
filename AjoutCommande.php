<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style_conn.css">
	<title> Nouvelle Commnande</title>
</head>
<?php

include_once "../config.php";
include_once "../Core/CommandeCore.php";
include_once "../Entities/Commande.php";

$commandeC= new CommandeCore();
if(isset($_POST['ajouter']) && isset($_POST['id_cmd']) &&  isset($_POST['idPanier']) && isset ($_POST['idLivreur']))
{
	$date=new DateTime();
	$_POST['date']=$date->format('Y-m-d');
    $commande= new commande($_POST['id_cmd'],$_POST['date'],$_POST['idPanier'],$_POST['idLivreur']);
    if($commandeC->ajouterCommande($commande))
        var_dump("ajout termine");
    else 
        var_dump("erreur");
    	// redirection vers la liste des commandes
	//header('Location:ListeCommandes.php');
}
$date=new DateTime();
?>
<body>

<form  name="f" action="AjoutCommande.php" method="Post">

	<table>
        <tr>  <caption>Nouvelle Commnande</caption> </tr>
		<tr>  <td>Id commande:</td> <td> <input type="number" name="id_cmd"> </td> </tr>
		<tr>  <td>Id Livreur:</td>  <td> <input type="number" name="idLivreur"> </td></tr>
		<tr>  <td>Id Panier:</td>  <td> <input type="number" name="idPanier"> </td></tr>
		<tr>  <td></td> <td>  <input type="submit" name="ajouter" value="Ajouter"></td></tr>
	</table>
	
</form>
</body>
</html>