<?PHP
include_once "../Entities/Commande.php";

class CommandeCore
{
    function ajouterCommande($commande)
	{
		$sql = "insert into commande (id_cmd,date,id_panier,id_livreur) values (:id_cmd,:date,:id_panier,:id_livreur)";
		$db = config::getConnexion();
		try {
			$req = $db->prepare($sql);

			$id_cmd = $commande->getIdCmd();
			$date = $commande->getDate();
            $id_panier = $commande->getIdPanier();
            $id_livreur = $commande->getIdLivreur();

			$req->bindValue(':id_cmd', $id_cmd);
			$req->bindValue(':date', $date);
            $req->bindValue(':id_panier', $id_panier);
            $req->bindValue(':id_livreur', $id_livreur);

			if($req->execute())
				return true;
			else
				return false;
		} catch (Exception $e) {
			echo 'Erreur: ' . $e->getMessage();
		}
    }
    
    
	function getAllCommandes()
	{
		$sql = "SElECT * From commande";
		$db = config::getConnexion();
		try {
			$liste = $db->query($sql);
			return $liste;
		} catch (Exception $e) {
			die('Erreur: ' . $e->getMessage());
		}
    }

    function AfficherCommande($id_cmd)
	{
		$sql = "SELECT * from commande where id_cmd=$id_cmd ";
		$db = config::getConnexion();
		try {
			$commande = $db->query($sql);
			return $commande;
		} catch (Exception $e) {
			die('Erreur: ' . $e->getMessage());
		}
	}
    
    function DeleteCommande($id_cmd)
	{
		$sql = "DELETE FROM commande where id_cmd= :id_cmd";
		$db = config::getConnexion();
		$req = $db->prepare($sql);
		$req->bindValue(':id_cmd', $id_cmd);
		try {
			$req->execute();
			// header('Location: index.php');
		} catch (Exception $e) {
			die('Erreur: ' . $e->getMessage());
		}
    }
    
    function updateCommande($commande)
	{

		$sql = "UPDATE `commande` SET 'date' = :dte  WHERE 'commande'.'reference' = :reference";
		$db = config::getConnexion();
		try {
			$req = $db->prepare($sql);

			$date = $commande->getDate();

			$req->bindValue(':dte', $date);

			return $req;
		} catch (Exception $e) {
			echo 'Erreur: ' . $e->getMessage();
		}
	}
}