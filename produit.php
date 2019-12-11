<?PHP
class produit{
	private $id_pdt;
	private $nom;
	private $marque;
    private $prix; 
	
	function __construct($id_pdt,$nom,$marque,$prix){
        $this->id_pdt=$id_pdt;
		$this->nom=$nom;
		$this->marque=$marque;
		$this->prix=$prix;

	}
	function getIdPdt(){
		return $this->id_pdt;
    }
    
	function setIdPdt($id_pdt){
		$this->id_pdt=$id_pdt;
    }

	function getNom(){
		return $this->nom;
    }
    
	function setNom($nom){
		$this->nom=$nom;
	}
	
	function getMarque(){
		return $this->marque;
    }
    
	function setMarque($marque){
		$this->qte=$marque;
	}
    
	function getPrix(){
		return $this->prix;
    }
    
	function setPrix($prix){
		$this->prix=$prix;
    }

	
}

?>