<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<?php

include "../core/fideliteF.php";
include "../entities/fidelite.php";


if (isset($_GET['ref']))
{
	$fid=new fideliteF(); 
	$result=$fid->recupererfidelite($_GET['ref']); 

foreach ($result as $row) {

	$ref=$row['ref'];
	$id_client=$row['id_client'];
	$pointt=$row['point'];
	
	# code...
		}
}
?>


<caption>modification</caption>



<form method="POST">

	<table>
		


<tr>
	<td>id client</td>
	<td>
		<input type="number" name="id_client" value="<?php echo $row['id_client'] ;?>">
	</td>
</tr>
<tr>
	<td>point</td>
	<td>
		<input type="number" name="point" value="<?php echo $point ;?>">
	</td>
</tr>


<tr>

	<td>
		<input type="hidden" value="<?php echo $row ['ref'] ;?>" name="ref">
		<input type="submit" name="modifier" value="modifier">
	</td>
</tr>

<tr>
	<td>
		<input type="hidden" name="ref_ini" value="<?php echo $_GET['ref'] ;?>">
	</td>
</tr>

	</table>

	

</form>


<?php
	if(isset($_POST['modifier']))
	{
		$fidee=new fidelite($ref,$_POST['id_client'],$_POST['point']); 

		$fid->modifierfidelite($promo,$_POST['ref_ini']);


	}
?>


</body>
</html>