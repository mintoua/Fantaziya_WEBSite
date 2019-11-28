
<?php
class ProduitPanier
{
	private $image;
	private $quantite;
	private $prix;
	private $reference;
	private $nom;
	

	function __construct($image,$quantite,$prix,$reference,$nom)
	{
		$this->setImage($image);
		$this->setQuantite($quantite);
		$this->setPrix($prix);
		$this->setReference($reference);
		$this->setNom($nom);

	}

//les gets
	function getImage()
	{
		return $this->image;
	}
    
    function getQuantite()
	{
		return $this->quantite;
	}
    
    function getPrix()
	{
		return $this->prix;
	}
    
    function getReference()
    {
        return $this->reference;
    }

    function getNom()
    {
        return $this->nom;
    }

//les sets
    function setImage($image)
	{
		 $this->image=$image;
	}
    
    function setQuantite($quantite)
	{
		 $this->quantite=$quantite;
	}
    
  	function setPrix($prix)
	{
		  $this->prix=$prix;
	}
    function setReference($reference){
        		  $this->reference=$reference;
    }
    function setNom($nom){
        $this->nom=$nom;
    }
	
}

  ?>