<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$nom = $categorie = $prix = $disponible = $img = "";
$nom_err = $categorie_err = $prix_err = $disponible_err = $img_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    
    // Validate nom
    $input_nom = trim($_POST["nom"]);
    if(empty($input_nom)){
        $nom_err = "Veuillez saisir un nom";
    } elseif(!filter_var($input_nom, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $nom_err = "Please enter a valid name.";
    } else{
        $nom = $input_nom;
    }

    // Validate categorie
    
    if (isset($_POST["categorie"])){
    $input_categorie = $_POST["categorie"];}
    
    
        $categorie = $input_categorie;
    
    
    // Validate disponible
    if (isset($_POST["disponible"])){
    $input_disponible = $_POST["disponible"];}
    
        $disponible = $input_disponible;
    
    
    // Validate prix
    
    $input_prix = $_POST["prix"];
    if(empty($input_prix)){
        $prix_err = "Veuillez saisir le prix";     
    } elseif(!ctype_digit($input_prix)){
        $prix_err = "Please enter a positive integer value.";
    } else{
        $prix = $input_prix;
    }

    //Validate image
    $input_img = $_POST["img"];
    if(empty($input_img)){
        $img_err = "Veuillez saisir une image";     
    } else{
        $img = $input_img;
    }
    
    // Check input errors before inserting in database
    if(empty($nom_err) && empty($categorie_err) && empty($prix_err) && empty($disponible_err)&& empty($img_err)){
        // Prepare an insert statement
        $sql = "INSERT INTO produit (nom,categorie, prix, disponible,img) VALUES (?, ?, ?, ?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssss",$param_nom, $param_categorie, $param_prix, $param_disponible,$param_img);
            
            // Set parameters
            $param_nom = $nom;
            $param_categorie = $categorie;
            $param_prix = $prix;
            $param_disponible = $disponible;
            $param_img = $img;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records created successfully. Redirect to landing page
                header("location: index.php");
                exit();
            } else{
                echo "Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($link);
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Record</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        .wrapper{
            width: 500px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h2>Create Record</h2>
                    </div>
                    <p>Please fill this form and submit to add employee record to the database.</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">

                        <div class="form-group <?php echo (!empty($nom_err)) ? 'has-error' : ''; ?>">
                            <label>Nom :</label>
                            <input type="text" name="nom" class="form-control" value="<?php echo $nom; ?>">
                            <span class="help-block"><?php echo $nom_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($categorie_err)) ? 'has-error' : ''; ?>">                       
                            <label>Categorie : </label> <br>
                            <input type="radio" name="categorie" id="categorie" value="collier">Collier <br>
                            <input type="radio" name="categorie" id="categorie" value="bague">Bague <br>
                            <input type="radio" name="categorie" id="categorie" value="bracelet">Bracelet <br>
                            <input type="radio" name="categorie" id="categorie" value="boucles">Boucles d'oreilles <br>
                            
                            <?php
                                if (isset($_POST['submit'])){
                                    $categorie = $_POST['categorie'];
                                    mysql_query("INSERT INTO produit(categorie) VALUES ('$categorie')");
                                }
                                ?>


                            <span class="help-block"><?php echo $categorie_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($prix_err)) ? 'has-error' : ''; ?>">
                            <label>prix</label>
                            <input type="number" name="prix" class="form-control"value="<?php echo $prix; ?>">
                            <span class="help-block"><?php echo $prix_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($disponible_err)) ? 'has-error' : ''; ?>">
                            <label>disponible</label> <br>

                            <input type="radio" name="disponible" value="dispo">Disponible<br>
                            <input type="radio" name="disponible" value="indispo">Indisponible<br>
                            <?php
                                if (isset($_POST['submit'])){
                                    $disponible = $_POST['disponible'];
                                    mysql_query("INSERT INTO produit(disponible) VALUES ('$disponible')");
                                }
                                ?>
                            <span class="help-block"><?php echo $disponible_err;?></span>
                        </div>

                        <div class="form-group <?php echo (!empty($img_err)) ? 'has-error' : ''; ?>">
                            <label>Image</label>

                            <input type="file" id="img" name="img" value="<?php echo $img; ?>"><br>

    
                            <span class="help-block"><?php echo $img_err;?></span>
                        </div>

                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="index.php" class="btn btn-default">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>