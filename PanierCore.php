<?php
include_once "../config.php";
include_once "../Entities/panier.php";
class PanierCore
{

    function ajouterPanier($panier)
	{
		$sql = "insert into panier (id_pdt,id_clt,taille,couleur,qte) values (:id_pdt,:id_clt,:taille,:couleur,:qte)";
		$db = config::getConnexion();
		try {
			$req = $db->prepare($sql);
            $id_clt = $panier->getIdClt();
			$taille = $panier->getTaille();
           // $id_panier = $panier->getIdPanier();
            $couleur = $panier->getCouleur();
            $id_pdt = $panier->getIdPdt();
            $qte = $panier->getQte();

            $req->bindValue(':id_clt', $id_clt);
            $req->bindValue(':id_pdt', $id_pdt);
			$req->bindValue(':couleur', $couleur);
            //$req->bindValue(':id_panier', $id_panier);
            $req->bindValue(':taille', $taille);
            $req->bindValue(':qte', $qte);

			if($req->execute())
				return true;
			else
				return false;
		} catch (Exception $e) {
			echo 'Erreur: ' . $e->getMessage();
		}
    }

    function AfficherPanier($id_panier)
	{
		$sql = "SELECT * from panier where id_panier=$id_panier ";
		$db = config::getConnexion();
		try {
			$panier = $db->query($sql);
			return $panier;
		} catch (Exception $e) {
			die('Erreur: ' . $e->getMessage());
		}
    }



    function DeletePanier($idclt,$idpdt)
	{
		$sql = "DELETE FROM panier where id_clt= :idclt AND id_pdt= :idpdt";
		$db = config::getConnexion();
		echo $sql;
		$req = $db->prepare($sql);
		$req->bindValue(':idclt', $idclt);
		$req->bindValue(':idpdt', $idpdt);
		try {
			$req->execute();
			// header('Location: index.php');
		} catch (Exception $e) {
			die('Erreur: ' . $e->getMessage());
		}
    }
	


	function getAllPanier($idclt)
	{
		$sql = "SElECT * From panier WHERE id_clt= $idclt ";
		$db = config::getConnexion();
		try {
			$liste = $db->query($sql);
			return $liste;
		} catch (Exception $e) {
			die('Erreur: ' . $e->getMessage());
		}
    }

}


?>