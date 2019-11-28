<?php 
include "../../core/PanierC.php";
echo $_POST["image"];
 echo $_POST["prix"];
 echo $_POST["quantite"];
 echo $_POST["reference"];
 echo $_POST["nom"];
echo "oui";

if(!empty($_POST["image"]) && !empty($_POST["prix"])  && !empty($_POST["quantite"]) && !empty($_POST["reference"]) && !empty($_POST["nom"])){
   extract($_POST);
    $produitPanier=new ProduitPanier($image,$quantite,$prix,$reference,$nom);
    produitPanierC::ajouterProduitPanier($produitPanier);
    
}

?>