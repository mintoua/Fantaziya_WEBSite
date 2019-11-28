<?php 
include "../../core/PanierC.php";
echo $_SESSION['idCommande'];
if(!empty($_POST["image"]) and !empty($_SESSION['idCommande'])){
    produitPanierC::supprimerPanier($_POST["image"],$_SESSION['idCommande']);
    echo "cela a fonctionne";
}
?>
