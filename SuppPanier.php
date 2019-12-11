<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style_conn.css">
	<title> supprimer produit panier</title>
</head>
<?php
include_once "../config.php";
include_once "../Core/PanierCore.php";
include_once "../Entities/panier.php";

$panierC= new PanierCore();
if(isset($_POST['supprimer']))
{
    if(isset($_POST['idclt']) && isset($_POST['idpdt']))  
    {
        $panierC->DeletePanier($_POST['idclt'],$_POST['idpdt']);
    }
   /*     echo("annulation termine");
    }
    else
    {
        var_dump("echec");
    }*/
        
    	// redirection vers la liste des commandes
	//header('Location:ListeCommandes.php');
}

?>
<body>

<form  name="f" action="SuppPanier.php" method="Post">

	<table>
    <tr>  <caption>Supprimer produit</caption> </tr>
		<tr>  <td>Id Client:</td> <td> <input type="number" name="idclt"> </td> </tr>
        <tr>  <td>Id Produit:</td> <td> <input type="number" name="idpdt"> </td> </tr>
		<tr>  <td></td> <td>  <input type="submit" name="supprimer" value="supprimer"></td></tr>
	</table>
	
</form>
</body>
</html>