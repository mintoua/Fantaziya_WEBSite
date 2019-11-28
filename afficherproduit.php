
<table border="1">
    <tr>
        <td>Id</td>
        <td>Categorie</td>
        <td>Prix</td>
        <td>Disponible</td>
        <td>Image</td>
        
    </tr>
    <?php 

$con=mysqli_connect('localhost','root','');

if(!$con){
    echo 'Not connected to Database';
}

if(!mysqli_select_db($con,'Fantaziya')){
    echo 'Database not connected';
}

    $sql = "SELECT `id`, `categorie`, `prix`, `disponible`, `img` FROM `produit`";
    
    $result = mysqli_query($con,$sql);
    if($result->num_rows > 0 ){
        while($row = $result->fetch_assoc()){
            echo "<tr><td>" . $row["id"]. "</td><td>" . $row["categorie"] . "</td><td>" . $row["prix"] . "</td><td>" . $row["disponible"] . "</td><td>" . $row["img"] . "</td></tr>";
        }
        echo "</table>";
    } else{
                echo "Vide";
          }
        

?>
    
</table>
<button>Ajouter <a href="ajoutproduit.html"></a> </button>
<button>Modifier <a href="modifierproduit.php"></a> </button>
<button>Supprimer <a href="supprimerproduit.php"></a> </button>
