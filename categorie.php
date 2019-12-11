 <html>
    <head>
    <link rel="stylesheet" href="style.css">

    <meta charset="UTF-8">
    </head>
<body>
<div class="w3-container">
    <?php require_once 'process.php';?>
    <?php 
    if(isset($_SESSION['message'])):
        echo $_SESSION['message'];
        unset($_SESSION['message']);
        endif
    ?>

    <?php  
    $mysqli = new mysqli('localhost', 'root', '', 'fantaziya') or die (mysqli_error($mysqli));
    $result = $mysqli->query("SELECT * FROM categorie") or die ($mysqli->error);;
    ?>


    <table class="w3-table-all w3-hoverable">9
        <thead>
            <tr><th class="w3-text-blue">Nom de Catégorie</th>
            <th class="w3-text-blue">Catégorie Pour</th>
            <th colspan="2" class="w3-text-blue">Action</th>
        </tr>
        </thead>
        <?php while($row = $result->fetch_assoc()):?>
            <tr>
                <td><?php echo $row['nom'];?></td> 
                <td><?php echo $row['type'];?></td>
                <td> 
                    <a href="categorie.php?edit=<?php echo $row['id'];?>">Modifier</a> 
                    <a href="process.php?delete=<?php echo $row['id'];?>">Supprimer</a> 

            </td>   
            </tr>
        <?php endwhile; ?> 
    </table>
    <?php 
    function pre_c($array){
        echo '<pre>';
        print_r($array);
        echo '</pre>';
    }
    ?>
    
    <form action="process.php" method="POST">
    <input type="hidden" name="id" value="<?php echo $id; ?>">
    <!--
    <input class="w3-input w3-border" type="search" name="recherhce" placeholder="Recherche....">
    <input type="submit" Value="Rechercher" class="w3-btn w3-blue">
     -->
    <h2 class="w3-text-blue">Catégorie</h2>
        <label class="w3-text-blue">Nom de Catégorie</label>
        <input class="w3-input w3-border" type="text" name="nom" value="<?php echo $nom?>" placeholder="Le nom de catégorie">
        <label class="w3-text-blue">Catégorie pour </label>
        <input class="w3-input w3-border" type="text" name="type" value="<?php echo $type?>" placeholder="Femme ou Homme">
        <?php if($update == true ):?>
        <button type="submit" name="update" class="w3-btn w3-blue">Modifier</button>
        <?php else :?>
        <button type="submit" name="save" class="w3-btn w3-blue">Enregister</button>
        <?php endif ?>
    </form>
</div>
</body>
    </html>