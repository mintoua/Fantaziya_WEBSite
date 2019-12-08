<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$nom = $categorie = $prix = $disponible = $img = "";
$nom_err = $categorie_err = $prix_err = $disponible_err = $img_err = "";
 
// Processing form data when form is submitted
if(isset($_POST["id"]) && !empty($_POST["id"])){
    // Get hidden input value
    $id = $_POST["id"];
    
     // Validate nom
     $input_nom = trim($_POST["nom"]);
     if(empty($input_nom)){
         $nom_err = "Veuillez saisir un nom.";
     } elseif(!filter_var($input_nom, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
         $nom_err = "Veuillez saisir un nom valide";
     } else{
         $nom = $input_nom;
     }

     // Validate categorie
    
     if (isset($_POST["categorie"])){
        $input_categorie = $_POST["categorie"];}
        
        
            $categorie = $input_categorie;
    
    // Validate prix
    
    $input_prix = $_POST["prix"];
    if(empty($input_prix)){
        $prix_err = "Veuillez saisir le prix";     
    } elseif(!ctype_digit($input_prix)){
        $prix_err = "Please enter a positive integer value.";
    } else{
        $prix = $input_prix;
    }

    
    // Validate disponible
    if (isset($_POST["disponible"])){
        $input_disponible = $_POST["disponible"];}
        
            $disponible = $input_disponible;
    
    //Validate image
    $input_img = $_POST["img"];
    if(empty($input_img)){
        $img_err = "Veuillez saisir une image";     
    } else{
        $img = $input_img;
    }
    
    // Check input errors before inserting in database
    if(empty($nom_err) && empty($categorie_err) && empty($prix_err) && empty($disponible_err)&& empty($img_err)){
        // Prepare an update statement
        $sql = "UPDATE produit SET nom=?, categorie=?, prix=?, disponible=?, img=? WHERE id=?";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssssi",$param_nom, $param_categorie, $param_prix, $param_disponible,$param_img, $param_id);
            
            // Set parameters
            $param_nom = $nom;
            $param_categorie = $categorie;
            $param_prix = $prix;
            $param_disponible = $disponible;
            $param_img = $img;
            $param_id = $id;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records updated successfully. Redirect to landing page
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
} else{
    // Check existence of id parameter before processing further
    if(isset($_GET["id"]) && !empty($_GET["id"])){
        // Get URL parameter
        $id =  $_GET["id"];
        
        // Prepare a select statement
        $sql = "SELECT * FROM produit WHERE id = ?";
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "i", $param_id);
            
            // Set parameters
            $param_id = $id;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                $result = mysqli_stmt_get_result($stmt);
    
                if(mysqli_num_rows($result) == 1){
                    /* Fetch result row as an associative array. Since the result set contains only one row, we don't need to use while loop */
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                    
                    // Retrieve individual field value
                    $nom = $row["nom"];
                    $categorie = $row["categorie"];
                    $prix = $row["prix"];
                    $disponible = $row["disponible"];
                    $img = $row["img"];
                } else{
                    // URL doesn't contain valid id. Redirect to error page
                    header("location: error.php");
                    exit();
                }
                
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
        
        // Close statement
        mysqli_stmt_close($stmt);
        
        // Close connection
        mysqli_close($link);
    }  else{
        // URL doesn't contain id parameter. Redirect to error page
        header("location: error.php");
        exit();
    }
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Record</title>
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
                        <h2>Update Record</h2>
                    </div>
                    <p>Please edit the input values and submit to update the record.</p>
                    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
                    <div class="form-group <?php echo (!empty($nom_err)) ? 'has-error' : ''; ?>">
                            <label>Nom : </label>
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
                                    mysql_query("UPDATE produit(categorie) SET categorie = ".$categorie." WHERE id=?");
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
                                mysql_query("UPDATE produit(disponible) SET disponible = ".$disponible." WHERE id=?");
                            }
                            ?>
                            <span class="help-block"><?php echo $disponible_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($img_err)) ? 'has-error' : ''; ?>">
                            <label>Image</label>

                            <input type="file" id="img" name="img" value="<?php echo $img; ?>"><br>

    
                            <span class="help-block"><?php echo $img_err;?></span>
                        </div>
                        <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="index.php" class="btn btn-default">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>