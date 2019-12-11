<?PHP
include_once "../config.php";
include_once "../Core/CommandeCore.php";
include_once "../Entities/Commande.php";
$commandeC = new CommandeCore();
$listeCommandes = $commandeC->getAllCommandes();

?>
<table border="1">
	<tr>
		<td>Id Commande</td>
		<td>Id Panier</td>
		<td>Id Livreur</td>
		<td>Date</td>
		<td>supprimer</td>
		<td>modifier</td>
	</tr>

	<?PHP
	foreach ($listeCommandes as $row) {
		?>
		<tr>
			<td><?PHP echo $row['id_cmd']; ?></td>
			<td><?PHP echo $row['id_panier']; ?></td>
			<td><?PHP echo $row['id_livreur']; ?></td>
			<td><?PHP echo $row['date']; ?></td>
			<td>
				<form method="POST">
					<input type="submit" name="supprimer" value="supprimer">
					<input type="hidden" name="num" value="<?PHP echo $row['id_cmd'];  ?>">
				</form>
			</td>
			<td><a href="modifierCommande.php?num=<?PHP echo $row['id_cmd']; ?>">
					Modifier</a></td>
		</tr>
	<?PHP
	}

	if (isset($_POST["supprimer"])) {
        echo '2jkhk';
		$commandeC->DeleteCommande($_POST["id_cmd"]);
		header('Location:ListerCommande.php');
	}
	?>
</table>

<a href="AjoutCommande.php"> Ajouter Commande </a>