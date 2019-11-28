<?php
include '../config.php';
class produitc{

    function afficherproduit($produit)
	{
		echo "Id: " . $produit->getId() . "<br>";
		echo "Categorie: " . $produit->getCategorie() . "<br>";
		echo "Prix: " . $produit->getPrix() . "<br>";
		echo "Disponible: " . $produit->getDisponible() . "<br>";
		echo "Image: " . $produit->getImage() . "<br>";
	}


    function afficherproduit(){
        $sql = "SElECT * From produit";
        $db = config::getConnexion();
        try{
            $liste = $db->query($sql);
            return $liste;
        }
        catch (Exception $e){
            die('Erreur : ' . $e->getMessage());
        }
    }
}

function ajouterproduit($produit){
    $sql = "insert into produit
     (id,categorie , prix, disponible,img)
     values (:id , :categorie, :prix, :disponible, :img)";
     $db = config::getConnexion();
     try{
         $req = $db->prepare($sql);
         $id = $produit->getId();
         $categorie = $produit->getCategorie();
		 $prix = $produit->getPrix();
		 $disponible = $produit->getDisponible();
		 $img = $produit->getImage();
         $req->bindValue(':id', $id);
         $req->bindValue(':categorie', $categorie);
		 $req->bindValue(':prix', $prix);
		 $req->bindValue(':disponible', $disponible);
		 $req->bindValue(':img', $img);

         $req->execute();
     } catch (Exception $e){
         echo 'Erreur : ' . $e->getMessage();
     }
}


    function supprimerproduit($id)
	{
		$sql = "DELETE FROM produit where id= :id";
		$db = config::getConnexion();
		$req = $db->prepare($sql);
		$req->bindValue(':id', $id);
		try {
			$req->execute();
			// header('Location: index.php');
		} catch (Exception $e) {
			die('Erreur: ' . $e->getMessage());
		}
	}
	function modifierproduit($produit, $id)
	{
		$sql = "UPDATE produit SET id=:idd, categorie=:categorie, prix=:prix, disponible=:disponible, img=:img WHERE id=:id";

		$db = config::getConnexion();
		try {
			$req = $db->prepare($sql);
			$idd = $produit->getId();
			$categorie = $produit->getCategorie();
			$prix = $produit->getPrix();
			$disponible = $produit->getDisponible();
			$img = $produit->getImage();
			$datas = array(':idd' => $idd, ':id' => $id, ':categorie' => $categorie,  ':prix' => $prix, ':disponible' => $disponible,':img' => $img);
			$req->bindValue(':idd', $idd);
			$req->bindValue(':id', $id);
			$req->bindValue(':categorie', $categorie);
			$req->bindValue(':prix', $prix);
			$req->bindValue(':disponible', $disponible);
			$req->bindValue(':img', $img);


			$s = $req->execute();

			// header('Location: index.php');
		} catch (Exception $e) {
			echo " Erreur ! " . $e->getMessage();
			echo " Les datas : ";
			print_r($datas);
		}
	}
	
?>