<?php include 'Commande.php';
include "config.php";
class CommandeC 
{
    function afficherCommande ()
    {
        
        //$sql="SElECT * From employe e inner join formationphp.employe a on e.cin= a.cin";
        $sql="SElECT * From commande";
        $db = config::getConnexion();
        try
        {
        $liste=$db->query($sql);
        return $liste;
        }
        catch (Exception $e)
        {
            die('Erreur: '.$e->getMessage());
        }   
    }
    
    function ajouterCommande($commande)
    {
      
            $sql="insert into commande(totalPaiement,etat,date,email) values (:totalPaiement,:etat,:dates,:email)";
        $db = config::getConnexion();
        try
        {
            //echo "Ajouter";
        $req=$db->prepare($sql);
        
        $req->bindValue(':totalPaiement',floatval($commande->getTotalPaiement()));
        $req->bindValue(':etat',$commande->getEtat());
        $req->bindValue(':dates',$commande->getDates());
        $req->bindValue(':email',$commande->getLogin());
        if($req->execute()){
           // echo"ok";
        }else{
            echo "non";
        }
        }
        catch (Exception $e)
        {
            echo 'Erreur: '.$e->getMessage();
        }
    }
    
      function supprimerCommande($idCommande)
    {
            $sql="DELETE FROM commande where idcommande=:idCommande";
        $db = config::getConnexion();
        try
        {
        $req=$db->prepare($sql);
        $req->bindValue(':idCommande',$idCommande);
            $req->execute();
           
        }
        catch (Exception $e)
        {
            echo 'Erreur: '.$e->getMessage();
        }
    }
    
   function modifierCommande($commande,$idCommande){
        $sql="UPDATE commande SET etat=:etat  WHERE idCommande=:idCommande";
        
        $db = config::getConnexion();
        //$db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
try{        
        $req=$db->prepare($sql);
        $req->bindValue(':etat',$commande->getEtat());
        $req->bindValue(':idCommande',$idCommande);
        
        
            $s=$req->execute();
            
           // header('Location: index.php');
        }
        catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();
  
        }
        
    }
    
    static function afficherHistorique($login) {
        
            $sql="SELECT * FROM produitPanier inner join commande on commande.idCommande=produitpanier.idCommande WHERE email=:email";
        $db = config::getConnexion();
        try
        {
        $req=$db->prepare($sql);
        $req->bindValue(':email',$login);
            $req->execute();
            $rows=$req->fetchAll();
            echo'
            <table class="table table-hover table-bordered" style="text-align:center;" >
<tr width="50px">
<th>produit</th>
<th>prix</th>
<th>quantite</th>
<th>prixTotal</th>
<th>etat</th>
<th>date</th>
<th>idCommande</th>
<th>Action</th>
</tr>';
            
            foreach($rows as $row){
                
            echo '

<tr width="50px" style="text-align:center;">
    <td><img width="50px" height="auto" src="'.  $row["image"] .'"></td>
    <td>'.  $row["prix"] .'</td>
    <td>'.  $row["quantite"].' </td>
    <td>'. intval($row["prix"])*intval($row["quantite"]).'</td>
    <td>'.  $row["etat"] .'</td>
    <td>'.  $row["date"] .'</td>
    <td>'. $row["idCommande"].'</td>
    <td><input style="background:rgb(43, 43, 255);border-radius:5px;"type="button" class="btn btn-primary" value="annuler" id="'.$row["image"].'"></td>
    </tr> ';
           
        }
        }
        catch (Exception $e)
        {
            echo 'Erreur: '.$e->getMessage();
        }
       
        

        
    }

    
}

?>

