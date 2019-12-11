<?PHP
include_once "../config.php";
include_once "../Core/PanierCore.php";
include_once "../Entities/panier.php";;
$panierC = new PanierCore();
$id_clt=2;
$listePanier = $panierC->getAllPanier($id_clt);

?>
<table border="1">
	<tr>
		<td>Id Panier</td>
		<td>Id Produit</td>
		<td>Id Client</td>
		<td>Taille</td>
        <td>Couleur</td>
        <td>Quantite</td>
		<td>supprimer</td>
		<td>modifier</td>
	</tr>

	<?PHP
	foreach ($listePanier as $row) {
		?>
		<tr>
			<td><?PHP echo $row['id_panier']; ?></td>
			<td><?PHP echo $row['id_pdt']; ?></td>
			<td><?PHP echo $row['id_clt']; ?></td>
			<td><?PHP echo $row['taille']; ?></td>
            <td><?PHP echo $row['couleur']; ?></td>
            <td><?PHP echo $row['qte']; ?></td>
			<td>
				<form method="POST">
					<input type="submit" name="supprimer" value="supprimer">
					<input type="hidden" name="num" value="<?PHP echo $row['id_panier'];  ?>">
				</form>
			</td>
			<td><a href="modifierCommande.php?num=<?PHP echo $row['id_cmd']; ?>">
					Modifier</a></td>
		</tr>
	<?PHP
	}

	if (isset($_POST["supprimer"])) {
        echo '2jkhk';
		$commandeC->DeletePanier($_POST["id_panier"]);
		header('Location:ListerPanier.php');
	}
	?>
</table>

<a href="AjouterPanier.php"> Ajouter Panier </a>