<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<?php

include "../core/promotionP.php";
include "../entities/promotion.php";


if (isset($_GET['reference']))
{
	$promp=new promotionP(); 
	$result=$promp->recupererpromotion($_GET['reference']); 

foreach ($result as $row) {

	$reference=$row['reference'];
	$id_produit=$row['id_produit'];
	$dateDebut=$row['dateDebut'];
	$dateFin=$row['dateFin'];
	$pourcentage=$row['pourcentage']; 

	# code...
		}
}
?>


<caption>modiification</caption>



<form method="POST">

	<table>
		


<tr>
	<td>date debut</td>
	<td>
		<input type="date" name="dateDebut" value="<?php echo $row['dateDebut'] ;?>">
	</td>
</tr>


<tr>
	<td>date fin</td>
	<td>
		<input type="date" name="dateFin" value="<?php echo $dateFin ;?>">
	</td>
</tr>

<tr>
	<td>pourcentage</td>
	<td>
		<input type="number" name="pourcentage" value="<?php echo $pourcentage ;?>">
	</td>
</tr>


<tr>

	<td>
		<input type="hidden" value="<?php echo $row ['reference'] ;?>" name="reference">
		<input type="submit" name="modifier" value="modifier">
	</td>
</tr>

<tr>
	<td>
		<input type="hidden" name="ref_ini" value="<?php echo $_GET['reference'] ;?>">
	</td>
</tr>

	</table>

	

</form>


<?php
	if(isset($_POST['modifier']))
	{
		$promo=new promotion($reference,$id_produit,$_POST['dateDebut'],$_POST['dateFin'],$_POST['pourcentage']); 

		$promp->modifierpromotion($promo,$_POST['ref_ini']);
       header('location :promotion.php') ;

	}
?>


</body>
</html>