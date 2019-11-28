<?php

// php code to Delete data from mysql database 

if(isset($_POST['delete']))
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
           
   // mysql query to Update data
   $sql = "DELETE FROM `produit` WHERE `id` = $id";
   
   
   if (!mysqli_query($con,$sql)){
    echo 'Pas supprimé';
}
else{
    echo 'Supprimé';
}

}

?>

<!DOCTYPE html>

<html>

    <head>

        <title> Supprimer produit </title>

        <meta charset="UTF-8">

        <meta name="viewport" content="width=device-width, initial-scale=1.0">

    </head>

    <body>

        <form action="supprimerproduit.php" method="POST">

            ID du produit à supprimer :&nbsp;<input type="text" name="id" required><br><br>

            <input type="submit" name="delete" value="Supprimer le produit">

        </form>

    </body>

</html>