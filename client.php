<?PHP
class client{
	private $id_clt;
	private $nom;
	private $prenom;
	private $adresse;
	private $password;
    private $code_postal;
	private $numero;
	private $email;
    
	function __construct($id_clt,$nom,$prenom,$adresse,$password,$code_postal,$numero,$email){
		$this->id_clt=$id_clt;
        $this->nom=$nom;
        $this->prenom=$prenom;
		$this->adresse=$adresse;
		$this->$password=$password;
        $this->code_postal=$code_postal;
		$this->numero=$numero;
		$this->email=$email;
    }

    function getIdClt(){
		return $this->id_clt;
	}
	function setIdClt($id_clt){
		$this->id_clt=$id_clt;
	}
    
	function getNom(){
		return $this->nom;
    }
    
	function setNom($nom){
		$this->nom=$nom;
    }

    function getPrenom(){
		return $this->prenom;
    }
    
	function setPrenom($prenom){
		$this->prenom=$prenom;
    }
  
    function getAdresse(){
		return $this->adresse;
	}
	function setAdresse($adresse){
		$this->adresse=$adresse;
	}

	function getPassword(){
		return $this->password;
	}
	
	function setPassword($password){
		$this->numero=$password;
	}

	function getCodePostal(){
		return $this->code_postal;
	}

	function setCodePostal($code_postal){
		$this->code_postal=$code_postal;
	}

	function getNumero(){
		return $this->numero;
	}

	function setNumero($numero){
		$this->numero=$numero;
	}
		
	function getEmail(){
		return $this->mail;
	}
	function setEmail($mail){
		$this->mail=$mail;
	}
	
}

?>