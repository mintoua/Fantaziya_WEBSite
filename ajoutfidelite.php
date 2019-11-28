<?PHP
include "../entities/fidelite.php";
include "../core/fideliteF.php";

if (isset($_POST['ref']) and isset($_POST['id_client']) and isset($_POST['point'])){
$fidelite1=new fidelite($_POST['ref'],$_POST['id_client'],$_POST['point']);
//Partie2
/*
var_dump($employe1);
}
*/
//Partie3
$fidelite1F=new fideliteF();
$fidelite1F->ajouterfidelite($fidelite1);
header('Location:fidelite.php');
	
}else{
	echo "vérifier les champs";
}
//*/

?>