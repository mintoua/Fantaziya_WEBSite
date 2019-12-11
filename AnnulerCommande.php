<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style_conn.css">
	<title> Annuler commande</title>
</head>
<?php
include_once "../config.php";
include_once "../Core/CommandeCore.php";
include_once "../Entities/Commande.php";

$commandeC= new CommandeCore();
if(isset($_POST['annuler']))
{
    if(isset($_POST['id_cmd']))
        $commandeC->DeleteCommande($_POST['id_cmd']);
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

<form  name="f" action="AnnulerCommande.php" method="Post">

	<table>
    <tr>  <caption>Annuler Commnande</caption> </tr>
		<tr>  <td>Id Commande:</td> <td> <input type="number" name="id_cmd"> </td> </tr>
		<tr>  <td></td> <td>  <input type="submit" name="annuler" value="Annuler"></td></tr>
	</table>
	
</form>
</body>
</html>