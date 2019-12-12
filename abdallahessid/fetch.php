<?php

//fetch.php

include("database_connection.php");

$query = "SELECT * FROM events";
$statement = $connect->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
$total_row = $statement->rowCount();
$output = '
<table class="table table-striped table-bordered">
	<tr>
		<th>ID</th>
		<th>Nom dévenement</th>
		<th>Description</th>
		<th>Modifier</th>
		<th>Supprimer</th>
	</tr>
';
if($total_row > 0)
{
	foreach($result as $row)
	{
		$output .= '
		<tr>
		<td width="10%">'.$row["id"].'</td>	
		<td width="40%">'.$row["nom"].'</td>
			<td width="40%">'.$row["description"].'</td>
			
			<td width="10%">
				<button type="button" name="edit" class="btn btn-primary btn-xs edit" id="'.$row["id"].'">Modifier</button>
			</td>
			<td width="10%">
				<button type="button" name="delete" class="btn btn-danger btn-xs delete" id="'.$row["id"].'">Supprimer</button>
			</td>
		</tr>
		';
	}
}
else
{
	$output .= '
	<tr>
		<td colspan="5" align="center">
		Données non trouvées</td>
	</tr>
	';
}
$output .= '</table>';
echo $output;
?>
<html>
<?php
$query = "SELECT * FROM events";
$statement = $connect->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
$total_row = $statement->rowCount();
if($total_row > 0)
{
	foreach($result as $row)
	{
		$output .= '
		';
	}
}
?>
</html>