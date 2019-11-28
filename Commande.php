
<?php
class Commande
{
	private $totalPaiement;
	private $etat;
	private $dates;
	private $login;
	function __construct($totalPaiement,$etat,$dates,$login)
	{
		$this->setTotalPaiement($totalPaiement);
		$this->setEtat($etat);
		$this->setDates($dates);
		$this->setLogin($login);


	}


	function getTotalPaiement()
	{
		return $this->totalPaiement;
	}
    
   
	function getEtat()
	{
		return $this->etat;
	}

	function getDates()
	{
		return $this->dates;
	}

	function getLogin()
	{
		return $this->login;
	}


	function setTotalPaiement($total)
	{
		 $this->totalPaiement=$total;
	}

	function setEtat($Etat)
	{
		 $this->etat=$Etat;
	}

	function setDates($Dates)
	{
		 $this->dates=$Dates;
	}

	function setLogin($login)
	{
		 $this->login=$login;
	}

}

  ?>