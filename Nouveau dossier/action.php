<?php

//action.php

include('database_connection.php');

if(isset($_POST["action"]))
{
	if($_POST["action"] == "insert")
	{
		$query = "INSERT INTO events (nom, description) VALUES ('".$_POST["nom"]."', '".$_POST["description"]."')";
		$statement = $connect->prepare($query);
		$statement->execute();
		echo '<p>
		Données insérées...</p>';
	}
	if($_POST["action"] == "fetch_single")
	{
		$query = "
		SELECT * FROM events WHERE id = '".$_POST["id"]."'";
		$statement = $connect->prepare($query);
		$statement->execute();
		$result = $statement->fetchAll();
		foreach($result as $row)
		{
			$output['nom'] = $row['nom'];
			$output['description'] = $row['description'];
			$output['id'] = $row['id'];
		}
		echo json_encode($output);
	}
	if($_POST["action"] == "update")
	{
		$query = "
		UPDATE events 
		SET nom = '".$_POST["nom"]."', 
		description = '".$_POST["description"]."',
		id = '".$_POST["id"]."'
		WHERE id = '".$_POST["hidden_id"]."'
		";
		$statement = $connect->prepare($query);
		$statement->execute();
		echo '<p>Données mises à jour</p>';
		
	}
	if($_POST["action"] == "delete")
	{
		$query = "DELETE FROM events WHERE id = '".$_POST["id"]."'";
		$statement = $connect->prepare($query);
		$statement->execute();
		echo '<p>Data Deleted</p>';
	}
}

?>