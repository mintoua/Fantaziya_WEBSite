<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style_conn.css">
	<title>Ajout Panier</title>
</head>
<?php

include_once "../config.php";
include_once "../Core/PanierCore.php";
include_once "../Entities/panier.php";

$panierC= new PanierCore();
if(isset($_POST['ajouter']) && isset($_POST['qte']) &&  isset($_POST['idpdt']) &&  isset($_POST['idclt']) && isset ($_POST['couleur'])  && isset ($_POST['taille']))
{
    $panier= new panier($_POST['idpdt'],$_POST['idclt'],$_POST['taille'],$_POST['couleur'],$_POST['qte']);
    if($panierC->ajouterpanier($panier))
        var_dump("ajout termine");
    else 
        var_dump("erreur");
    	// redirection vers la liste des commandes
	//header('Location:ListeCommandes.php');
}
?>
<body>

<form  name="f" action="AjouterPanier.php" method="Post">

	<table>
        <tr>  <caption>Ajout Panier</caption> </tr>
		 <!--<tr>  <td>Id panier:</td> <td> <input type="number" name="id_panier"> </td> </tr> -->
         <tr>  <td>Id client:</td> <td> <input type="number" name="idclt"> </td> </tr> 
         <tr>  <td>Id produit:</td> <td> <input type="number" name="idpdt"> </td> </tr> 
         <tr>  <td>Qte:</td>  <td> <input type="number" name="qte"> </td></tr>
		<tr>  <td>Couleur:</td>  <td> <input type="text" name="couleur"> </td></tr>
		<tr>  <td>Taille:</td>  <td> <input type="number" name="taille"> </td></tr>
		<tr>  <td></td> <td>  <input type="submit" name="ajouter" value="Ajouter"></td></tr>
	</table>
	
</form>
</body>
</html>