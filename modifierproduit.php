<?php

// php code to Update data from mysql database Table

if(isset($_POST['update']))
{
       
	$con=mysqli_connect('localhost','root','');

	if(!$con){
		echo 'Not connected to Database';
	}
	
	if(!mysqli_select_db($con,'Fantaziya')){
		echo 'Database not connected';
	}
   
   // get values form input text and number
   $id = $_POST['id'];
   $categorie = $_POST['categorie'];
   $prix = $_POST['prix'];
   $disponible = $_POST['disponible'];
   $img = $_POST['img'];
  
           
   // mysql query to Update data
   $sql = "UPDATE `produit` SET `categorie`='".$categorie."',`prix`=$prix,`disponible`=$disponible,`img`='".$img."'  WHERE `id` = $id";
   
   
   if (!mysqli_query($con,$sql)){
    echo 'Pas modifié';
}
else{
    echo 'Modifié';
}

}

?>

<!DOCTYPE html>

<html>

    <head>

        <title> Modifier produit </title>

        <meta charset="UTF-8">

        <meta name="viewport" content="width=device-width, initial-scale=1.0">

    </head>

    <body>

        <form action="modifierproduit.php" method="POST">

        
            L'ID du produit à modifier : <input type="text" name="id" required><br><br>

            Nouvelle catégorie :<input type="radio" name="categorie" required><br><br>
            <input type="radio" name="categorie" value="collier">Collier <br>
            <input type="radio" name="categorie" value="bague">Bague <br>
            <input type="radio" name="categorie" value="bracelet">Bracelet <br>
            <input type="radio" name="categorie" value="boucles">Boucles d'oreilles <br>

            Nouveau prix :<input type="number" name="prix" required><br><br>

			Disponibilité :<input type="number" name="disponible" required><br><br>

            Image :<input type="file" name="img" required><br><br>

            <input type="submit" name="update" value="Modifier"> 

        </form>

    </body>


</html>