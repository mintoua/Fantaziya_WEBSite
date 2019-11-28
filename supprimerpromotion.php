<?PHP
include "../core/promotionP.php";
$promotionP1=new promotionP();
if (isset($_POST["reference"])){
	$promotionP1->supprimerpromotion($_POST["reference"]);
	header('Location: promotion.php');
}

?>