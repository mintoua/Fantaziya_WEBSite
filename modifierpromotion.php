<?php 
include ('C:\wamp64\www\projetweb\template\back\entities/promotion.php');
include "../core/promotionP.php";
$promotionP = new promotionP(); 



 ?>



<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>
  <?php
    if (($_GET['reference'])){
    $result=$promotionP->recupererpromotion($_GET['reference']);
    foreach($result as $row){
      
?>

  <form  class="form-container" method="post"> 
   
      
      <th scope="col">reference</th>
<th><input type="number" name="reference" value="<?php echo $row['reference'] ?>"></th>
 <br>

    

    </tr>
      <tr>
      
      <th scope="col">id_produit</th>
<th><input type="number" name="id_produit" value="<?php echo $row['id_produit'] ?>"></th>
 
<br>
    

    </tr>
          <tr>

      <th scope="col">dateDebut</th>
      <th><input type="date" name="dateDebut" value="<?php echo $row['dateDebut'] ?>"></th>
    <br>
    </tr>

      <tr>

      <th scope="col">dateFin</th>
      <th><input type="date" name="dateFin"value="<?php echo $row['dateFin'] ?>"></th>
    <br>
    </tr>

      <tr>

      <th scope="col">pourcentage</th>
      <th><input type="number" name="pourcentage"value="<?php echo $row['pourcentage'] ?>"></th>
    
    </tr>

    
<br>
     


   

<br>
      

     
    

    <tr>
      <br>
      <th><input type="submit" class="btn" name="modifier" value="modifier" >
<input type="hidden" name="ref_ini" value="<?PHP echo $_GET['reference'];?>"></th>

    </tr>
     


 
  

</form>
<?php } 

if (isset($_POST['modifier'])){
  $reference=$_POST['ref_ini'];
  $id_produit=$_POST['id_produit'];
  $dateDebut=$_POST['dateDebut'];
  $dateFin=$_POST['dateFin'];
  $pourcentage=$_POST['pourcentage'];


$promotion=new promotion($reference,$id_produit,$dateDebut,$dateFin ,$pourcentage);
  $promotionP->modifier($promotion,$_POST['ref_ini']);
}

} ?>
</body>
</html>