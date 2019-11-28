<?PHP
class produit{
	private $id;
    private $categorie;
	private $prix;
	private $disponible;
	private $img;
	function __construct($id,$categorie,$prix,$disponible,$img){
		$this->id=$id;
		$this->categorie=$categorie;
        $this->prix=$prix;
		$this->disponible=$disponible;
		$this->img=$img;
	}
	
	function getId(){
		return $this->id;
	}
	function getCategorie(){
		return $this->categorie;
	}
	function getPrix(){
		return $this->prix;
	}
    function getDisponible(){
		return $this->disponible;
	}
	function getImage(){
		return $this->img;
	}

	function setCategorie($categorie){
		$this->categorie=$categorie;
	}
	function setPrix($prix){
		$this->prix=$prix;
	}
	function setDisponible($disponible){
		$this->disponible=$disponible;
	}
	function setImage($img){
		$this->img=$img;
	}
}

?>