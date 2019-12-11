<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style_conn.css">
	<title></title>
</head>
<?php

include_once "../config.php";
include_once "../Core/CommandeCore.php";
include_once "../Entities/Commande.php";


$commandeC= new CommandeCore();
if(isset($_POST['afficher']))
{
    $commande= $commandeC->afficherCommande($_POST['id_cmd']);
    $c=$commande->fetchAll();
           // var_dump($c);
            foreach ($c as $row) { };
    	// redirection vers la liste des commandes
	//header('Location:ListeCommandes.php');
}
?>
<body>

<form  name="f" action="AfficherCommande.php" method="Post">

	<table>
		<tr>  <td> Id Commande:</td> <td> <input type="number" name="id_cmd"> </td> </tr>
        <tr>  <td></td> <td>  <input type="submit" name="afficher" value="Afficher"></td></tr>
    </table>
 </form>

 <hr>

        <form>
	<table>
    <tr>  <caption>Afficher Commnande</caption> </tr>
		<tr>  <td>Reference:</td> <td> <input type="number" name="ref" value="<?PHP echo $row['id_cmd'];  ?>" disabled> </td> </tr>
		<tr>  <td>Id Client:</td>  <td> <input type="number" name="idPanier" value="<?PHP echo $row['id_panier'];  ?>" disabled> </td></tr>
		<tr>  <td>Id Produit:</td>  <td> <input type="number" name="idLivreur" value="<?PHP echo $row['id_livreur'];  ?>" disabled> </td></tr>
		<tr>  <td>Date de commande:</td> <td> <input type="date" name="date" value="<?PHP echo $row['date'];  ?>"disabled> </td></tr>
	</table>
	
</form>
</body>
</html>