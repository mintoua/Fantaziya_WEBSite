<?PHP
class panier{
	private $id_panier;
	private $id_pdt;
	private $id_clt;
	private $taille;
	private $couleur;
    private $qte; 
	
	function __construct(/*$id_panier,*/$id_pdt,$id_clt,$taille,$couleur,$qte){
		/*$this->id_panier=$id_panier;*/
		$this->id_pdt=$id_pdt;
        $this->id_clt=$id_clt;
		$this->taille=$taille;
		$this->couleur=$couleur;
		$this->qte=$qte;

	}

	function getIdPanier(){
		return $this->id_panier;
    }
    
	function setIdPanier($id_panier){
		$this->id_panier=$id_panier;
    }
	function getIdPdt(){
		return $this->id_pdt;
    }
    
	
	function getIdClt(){
		return $this->id_pdt;
    }

	function getTaille(){
		return $this->taille;
    }
    
	function setTaille($taille){
		$this->taille=$taille;
	}
	
	function getCouleur(){
		return $this->couleur;
    }
    
	function setCouleur($couleur){
		$this->couleur=$couleur;
	}
    
	function getQte(){
		return $this->qte;
    }
    
	function setQte($qte){
		$this->qte=$qte;
    }

	
}

?>