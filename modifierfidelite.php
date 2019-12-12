<?php 
include ('C:\wamp64\www\projetweb\template\back\entities/fidelite.php');
include "../core/fideliteF.php";
$fideliteF = new fideliteF(); 



 ?>

<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>
  <?php
    if (($_GET['ref'])){
    $result=$fideliteF->recupererfidelite($_GET['ref']);
    foreach($result as $row){
      
?>

  <form  class="form-container" method="post"> 
   
      
      <th scope="col">ref</th>
<th><input type="number" name="ref" value="<?php echo $row['ref'] ?>"></th>
 <br>

    

    </tr>
      <tr>
      
      <th scope="col">id_client</th>
<th><input type="number" name="id_client" value="<?php echo $row['id_client'] ?>"></th>
 
<br>
    

    </tr>
      <tr>

      <th scope="col">point</th>
      <th><input type="number" name="point"value="<?php echo $row['point'] ?>"></th>
    
    </tr>

    
<br>
     


   

<br>
      

     
    

    <tr>
      <br>
      <th><input type="submit" class="btn" name="modifier" value="modifier" >
<input type="hidden" name="ref_ini" value="<?PHP echo $_GET['ref'];?>"></th>

    </tr>
     


 
  

</form>
<?php } 

if (isset($_POST['modifier'])){
  $ref=$_POST['ref_ini'];
  $id_client=$_POST['id_client'];
  $point=$_POST['point'];


$fidelite=new fidelite($ref,$id_client,$point);
  $fideliteF->modifier($fidelite,$_POST['ref_ini']);
}

} ?>
</body>
</html>