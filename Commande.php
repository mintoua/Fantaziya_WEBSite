<?PHP
class Commande{
    private $id_cmd;
    private $date;
	private $id_panier;
    private $id_livreur;
	
	function __construct($id_cmd,$date,$id_panier,$id_livreur){
		$this->id_cmd=$id_cmd;
		$this->date=$date;
        $this->id_panier=$id_panier;
        $this->id_livreur=$id_livreur;
	}
	function getIdCmd(){
		return $this->id_cmd;
	}
	function setIdCmd($id_cmd){
		$this->id_cmd=$id_cmd;
	}
	function getDate(){
		return $this->date;
	}
	function setDate($date){
		$this->date=$date;
	}
	function getIdPanier(){
		return $this->id_panier;
	}
	function setIdPanier($d_panier){
		$this->id_panier=$d_panier;
    }
    
    function getIdLivreur(){
		return $this->id_livreur;
	}
	function setIdLivreur($id_livreur){
		$this->id_livreur=$id_livreur;
	}
	
}

?>