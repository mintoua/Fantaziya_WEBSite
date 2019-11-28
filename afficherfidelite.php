<?PHP
include "../core/fideliteF.php";
$fidelite1F=new fideliteF();
$listefidelite=$fidelite1F->afficherfidelite();

//var_dump($listeEmployes->fetchAll());
?>
<table border="1">
<tr>
<td>ref</td>
<td>id_client</td>
<td>Point</td>
<td>supprimer</td>
<td>modifier</td>
</tr>

<?PHP
foreach($listefidelite as $row){
	?>
	<tr>
	<td><?PHP echo $row['ref']; ?></td>
	<td><?PHP echo $row['id_client']; ?></td>
	<td><?PHP echo $row['point']; ?></td>
	<td><form method="POST" action="supprimerfidelite.php">
	<input type="submit" name="supprimer" value="supprimer">
	<input type="hidden" value="<?PHP echo $row['ref']; ?>" name="ref">
	</form>
	</td>
	<td><a href="modifierfidelite.php?cin=<?PHP echo $row['ref']; ?>">
	Modifier</a></td>
	</tr>
	<?PHP
}
?>
</table>


