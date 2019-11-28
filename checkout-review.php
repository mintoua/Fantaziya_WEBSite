<?php 
session_start();
$_SESSION["login"]=$_GET["login"];// doit ajouter une condition sur la session login
?>
<?php 
include "../../core/AdresseC.php";
include "../../core/CommandeC.php";
include "../../entities/Commande.php";


$toggle;
$login2;
if(!empty($_SESSION["login"]))
   {
      extract($_SESSION);
       echo $login;
        $GLOBALS['login2']=$login;
     	$sql="SELECT COUNT(*) as 'nombre'
FROM adressetotal where email=:email";
    	$sql2="SELECT nom,prenom 
FROM utilisateur where email=:email";
    $db = config1::getConnexion();
		try
		{
	     $req=$db->prepare($sql);
	     $req2=$db->prepare($sql2);
        $req->bindValue(':email',$login);
        $req2->bindValue(':email',$login);
        if($req->execute()){
            $rows=$req->fetchAll();
            if($rows[0]["nombre"]!='0'){
               // cela existe
                  $GLOBALS['toggle']=0;
            }
            else{
                $GLOBALS['toggle']=1;
            }
        }else{
             $GLOBALS['toggle']=1;
        }
            echo $toggle;
            if($req2->execute()){
                $rows=$req2->fetchAll();
                
                $GLOBALS['nom']=$rows[0]["nom"];
               $GLOBALS['prenom']=$rows[0]["prenom"];
                
            }
		
}
    catch (Exception $e)
        {
            die('Erreur: '.$e->getMessage());
        }	

    
   }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>checkout-review</title>

    <meta name="keywords" content="HTML5 Template" />
    <meta name="description" content="Porto - Bootstrap eCommerce Template">
    <meta name="author" content="SW-THEMES">

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="assets/images/icons/favicon.ico">

    <!-- Plugins CSS File -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <!-- Main CSS File -->
    <link rel="stylesheet" href="assets/css/style.min.css">
    <link rel="stylesheet" href="Commande.css">
    <link rel="stylesheet" href="commandes.css">

   
</head>

<body>
<?PHP
    include "../../entities/comptes/client.php";
    include "../../core/comptes/clientC.php";

    if (isset($_SESSION['email'])) {
        $clientC = new ClientC();
        $result = $clientC->recupererClient($_SESSION['email']);
        foreach ($result as $row) {
            $nom = $row['nom'];
            $prenom = $row['prenom'];
            $datenaissance = $row['datenaissance'];
            $sexe = $row['sexe'];
            $password = $row['motdepasse'];
            $tel = $row['tel'];
            $code = $row['codePostal'];
            $addlivr = $row['adresse'];
        }
    }
    ?>
    <div class="page-wrapper">

        <main class="main">
            <nav aria-label="breadcrumb" class="breadcrumb-nav">
                <div class="container-fluid">
                    <ol class="breadcrumb">

                    </ol>
                </div><!-- End .container-fluid -->
            </nav>

            <div class="container">
                <ul class="checkout-progress-bar">
                    <li>
                        <span>Connexion</span>
                    </li>
                    <li class="active">
                        <span>Commande</span>
                    </li>
                </ul>
                <div class="row">


                    <div class="col-lg-8 order-lg-first">
                        <div class="checkout-payment">
                            <h2 class="step-title step-title2" id="step1">Informations:</h2>

                            <!--<h4>Check / Money order</h4>-->

                            <div class="form-group-custom-control">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="change-bill-address" value="1">
                                    <!--  <label class="custom-control-label" for="change-bill-address">My billing and shipping address are the same</label>-->
                                </div><!-- End .custom-checkbox -->
                            </div><!-- End .form-group -->

                            <div id="checkout-shipping-address">
                                <address>
                                    Desmond Mason <br>
                                    123 Street Name, City, USA <br>
                                    Los Angeles, California 03100 <br>
                                    United States <br>
                                    (123) 456-7890
                                </address>
                            </div><!-- End #checkout-shipping-address -->

                            <div id="new-checkout-address" class="show ">

                                <form action="" method="post" id="informations">
                                    <div class="form-group required-field" style>
                                        <label>Nom </label>

                                        <input type="text" class="form-control" id="firstName" oninput="controlSaisie(this)" required >

                                    </div><!-- End .form-group -->

                                    <div class="form-group required-field">
                                        <label>Prenom </label>
                                        <input type="text" class="form-control" required id="lastName" oninput="controlSaisie(this)" >
                                    </div><!-- End .form-group -->

                                    <div class="form-group">
                                        <label>Companie <i>(optionnel)</i> </label>
                                        <input type="text" class="form-control" id="company" oninput="controlSaisie(this)" >
                                    </div><!-- End .form-group -->

                                    <div class="form-group required-field">
                                        <label>Adresse </label>
                                        <input type="text" class="form-control" required id="streetAddress1" oninput="controlSaisie(this)">
                                        <input type="text" class="form-control" id="streetAddress2" oninput="controlSaisie(this)" >

                                    </div><!-- End .form-group -->

                                    <div class="form-group required-field">
                                        <label>Ville </label>
                                        <input type="text" class="form-control" required id="city" oninput="controlSaisie(this)" >
                                    </div><!-- End .form-group -->

                                    <div class="form-group">
                                        <label>Pays</label>
                                        <div class="select-custom">
                                            <select id="country" class="form-control">
                                                <option value="CA">Tunisie</option>
                                            </select>
                                        </div><!-- End .select-custom -->
                                    </div><!-- End .form-group -->

                                    <div class="form-group required-field">
                                        <label>Code postal\Zip </label>
                                        <input type="text" class="form-control" required id="zipCode" oninput="controlSaisie(this) " >
                                    </div><!-- End .form-group -->

                                    <div class="form-group">
                                        <label>Region</label>
                                        <div class="select-custom">
                                            <select class="form-control" id="region" >
                                                <option value="USA">Grand Tunis</option>
                                                <option value="Turkey">Sousse</option>
                                            </select>
                                        </div><!-- End .select-custom -->
                                    </div><!-- End .form-group -->

                                    <div class="form-group required-field">
                                        <label>Numero de telephone </label>
                                        <div class="form-control-tooltip">
                                            <input type="tel" class="form-control" required id="phoneNumber" oninput="controlSaisie(this)" >
                                            <span class="input-tooltip" data-toggle="tooltip" title="For delivery questions." data-placement="right"><i class="icon-question-circle"></i></span>
                                        </div><!-- End .form-control-tooltip -->
                                    </div><!-- End .form-group -->


                                    <div class="form-group-custom-control">
                                        <div class="custom-control custom-checkbox">

                                        </div><!-- End .custom-checkbox -->
                                    </div><!-- End .form-group -->
                                    <input type="button" value="valider" class="btn btn-primary float-right "  bouton="1">

                                </form>
                            </div><!-- End #new-checkout-address -->
                              <form> 
                            <div class="form-group-custom-control" style="margin-bottom: 50px;">
                                <h1 class="step-title step-title2" style="margin-bottom: 25px;">Mode de paiement </h1>

                                <input type="radio" name="paiement" moi="a" id="cheque" required> <label>Cheque à la livraison</label><br>
                                <input type="radio" name="paiement" moi="b" required id="cash" > <label>Cash à la livraison</label><br>
                                <input type="radio" name="paiement" moi="c" required id="carteBancaire"> <label>Carte bancaire</label><br>
                                <input type="button" value="valider" class="btn btn-primary float-right" bouton="modePaiement" sytle="margin" >
                            </div>
                            
                            </form>

                            <div id="new-checkout-address" class="show ">

                                <form action="" method="post" id="paiement">
                                    <div class="form-group required-field" style>
                                        <label>Name on Card </label>

                                        <input type="text" class="form-control" id="firstName" name="CardName" oninput="controlSaisie(this)" required>

                                    </div><!-- End .form-group -->


                                    <div class="form-group required-field">
                                        <label>Credit Card Number </label>
                                        <input type="text" class="form-control" required id="cardNumber" oninput="controlSaisie(this)" name="CardNumber"  >
                                    </div><!-- End .form-group -->
                                    <div class="row">
                                        <div class="form-group required-field col-lg-4" style="margin-right:80px;">
                                            <label>Expiration Month </label>

                                            <input type="text" class="form-control" id="firstName" oninput="controlSaisie(this)" required name="ExpirationMonth" >

                                        </div><!-- End .form-group -->
                                        <div class="form-group required-field col-lg-4" style>
                                            <label>Expiration Year</label>
                                            <div class="select-custom">
                                                <select class="form-control" name="ExpirationYear">
                                                    <option value="Year">2019</option>
                                                    <option value="Year">2020</option>
                                                    <option value="Year">2021</option>
                                                    <option value="Year">2022</option>
                                                    <option value="Year">2023</option>
                                                    <option value="Year">2024</option>
                                                </select>
                                            </div><!-- End .form-group -->


                                        </div><!-- End .form-group -->

                                    </div>

                                    <div class="form-group required-field">
                                        <label>CVV </label>
                                        <div class="form-control-tooltip">
                                            <input type="tel" class="form-control" required id="CVV" oninput="controlSaisie(this)" name="CVV">
                                            <span class="input-tooltip" data-toggle="tooltip" title="For delivery questions." data-placement="right"><i class="icon-question-circle"></i></span>
                                        </div><!-- End .form-control-tooltip -->
                                    </div><!-- End .form-group -->


                                    <div class="form-group-custom-control">
                                        <div class="custom-control custom-checkbox">

                                        </div><!-- End .custom-checkbox -->
                                    </div><!-- End .form-group -->
                                    <input type="button" value="valider" class="btn btn-primary float-right "  bouton="2">

                                </form>
                            </div><!-- End #new-checkout-address -->
                            
                            
                            <h2 class="step-title step-title2">Adresse de Livraison</h2>

                            <div class="shipping-step-addresses">
                              
                               <?php 
                               
                             AdresseC::afficherAdresse($login);
                                
                              ?>
                   
                            </div><!-- End .shipping-step-addresses -->

                            <a href="#" class="btn btn-sm btn-outline-secondary btn-new-address" data-toggle="modal" data-target="#myModal">+ New Address</a>
                            <!-- Modal -->
                            <div class="modal fade" id="myModal" role="dialog">
                                <div class="modal-dialog">

                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Nouvelle adresse</h4>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>
                                        <div class="modal-body">
                                            <div id="new-checkout-address" class="show ">

                                                <form action="" method="post" id="informations2">
                                                    <div class="form-group required-field" style>
                                                        <label>Nom </label>

                                                        <input type="text" class="form-control" id="firstName2" oninput="controlSaisie(this)" required>

                                                    </div><!-- End .form-group -->

                                                    <div class="form-group required-field">
                                                        <label>Prenom </label>
                                                        <input type="text" class="form-control" required id="lastName2" oninput="controlSaisie(this)">
                                                    </div><!-- End .form-group -->

                                                    <div class="form-group">
                                                        <label>Companie <i>(optionnel)</i> </label>
                                                        <input type="text" class="form-control" id="company2" oninput="controlSaisie(this)">
                                                    </div><!-- End .form-group -->

                                                    <div class="form-group required-field">
                                                        <label>Adresse </label>
                                                        <input type="text" class="form-control" required id="streetAddress12" oninput="controlSaisie(this)">
                                                        <input type="text" class="form-control" id="streetAddress22" oninput="controlSaisie(this)">

                                                    </div><!-- End .form-group -->

                                                    <div class="form-group required-field">
                                                        <label>Ville </label>
                                                        <input type="text" class="form-control" required id="city2" oninput="controlSaisie(this)">
                                                    </div><!-- End .form-group -->

                                                    <div class="form-group">
                                                        <label>Pays</label>
                                                        <div class="select-custom" >
                                                            <select class="form-control" id="country2">
                                                                <option value="CA">Tunisie</option>
                                                            </select>
                                                        </div><!-- End .select-custom -->
                                                    </div><!-- End .form-group -->

                                                    <div class="form-group required-field">
                                                        <label>Code postal\Zip </label>
                                                        <input type="text" class="form-control" required id="zipCode2" oninput="controlSaisie(this)">
                                                    </div><!-- End .form-group -->

                                                    <div class="form-group">
                                                        <label>Region</label>
                                                        <div class="select-custom">
                                                            <select id="region2" class="form-control">
                                                                <option value="USA">Grand Tunis</option>
                                                                <option value="Turkey">Sousse</option>
                                                            </select>
                                                        </div><!-- End .select-custom -->
                                                    </div><!-- End .form-group -->

                                                    <div class="form-group required-field">
                                                        <label>Numero de telephone </label>
                                                        <div class="form-control-tooltip">
                                                            <input type="tel" class="form-control" required id="phoneNumber2" oninput="controlSaisie(this)">
                                                            <span class="input-tooltip" data-toggle="tooltip" title="For delivery questions." data-placement="right"><i class="icon-question-circle"></i></span>
                                                        </div><!-- End .form-control-tooltip -->
                                                    </div><!-- End .form-group -->


                                                    <div class="form-group-custom-control">
                                                        <div class="custom-control custom-checkbox">

                                                        </div><!-- End .custom-checkbox -->
                                                    </div><!-- End .form-group -->
                                                    <input type="button" value="valider" class="btn btn-primary float-right "  bouton="3">

                                                </form>
                                            </div><!-- End #new-checkout-address -->
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>

                                </div>
                            </div>
							
							<?php $PC = 0; ?>
                            <button type="button" class="btn btn-primary float-right " id="commander" style="margin-top:50px;" >Commander <?php $PC = 1; ?> </button>
							<?php 
								if($PC == 1)
								{
									
								}

							?>









                            <div class="clearfix">
                                <!--<a href="#" class="btn btn-primary float-right" >Place Order</a>-->
                            </div><!-- End .clearfix -->
                        </div><!-- End .checkout-payment -->


                    </div><!-- End .col-lg-8 -->
                </div><!-- End .row -->
            </div><!-- End .container -->

            <div class="mb-6"></div><!-- margin -->
        </main><!-- End .main -->


    <div class="mobile-menu-overlay"></div><!-- End .mobil-menu-overlay -->

    <div class="mobile-menu-container">
        <div class="mobile-menu-wrapper">
            <span class="mobile-menu-close"><i class="icon-cancel"></i></span>
            <nav class="mobile-nav">
                <ul class="mobile-menu">
                    <li><a href="index.php">Home</a></li>
                    <li>
                        <a href="category.php">Categories</a>
                        <ul>
                            <li><a href="category-banner-full-width.php">Full Width Banner</a></li>
                            <li><a href="category-banner-boxed-slider.php">Boxed Slider Banner</a></li>
                            <li><a href="category-banner-boxed-image.php">Boxed Image Banner</a></li>
                            <li><a href="category-sidebar-left.php">Left Sidebar</a></li>
                            <li><a href="category-sidebar-right.php">Right Sidebar</a></li>
                            <li><a href="category-flex-grid.php">Product Flex Grid</a></li>
                            <li><a href="category-horizontal-filter1.php">Horizontal Filter 1</a></li>
                            <li><a href="category-horizontal-filter2.php">Horizontal Filter 2</a></li>
                            <li><a href="#">Product List Item Types</a></li>
                            <li><a href="category-infinite-scroll.php">Ajax Infinite Scroll<span class="tip tip-new">New</span></a></li>
                            <li><a href="category-3col.php">3 Columns Products</a></li>
                            <li><a href="category-4col.php">4 Columns Products</a></li>
                            <li><a href="category.php">5 Columns Products</a></li>
                            <li><a href="category-6col.php">6 Columns Products</a></li>
                            <li><a href="category-7col.php">7 Columns Products</a></li>
                            <li><a href="category-8col.php">8 Columns Products</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="product.php">Products</a>
                        <ul>
                            <li>
                                <a href="#">Variations</a>
                                <ul>
                                    <li><a href="product.php">Horizontal Thumbnails</a></li>
                                    <li><a href="product-full-width.php">Vertical Thumbnails<span class="tip tip-hot">Hot!</span></a></li>
                                    <li><a href="product.php">Inner Zoom</a></li>
                                    <li><a href="product-addcart-sticky.php">Addtocart Sticky</a></li>
                                    <li><a href="product-sidebar-left.php">Accordion Tabs</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">Variations</a>
                                <ul>
                                    <li><a href="product-sticky-tab.php">Sticky Tabs</a></li>
                                    <li><a href="product-simple.php">Simple Product</a></li>
                                    <li><a href="product-sidebar-left.php">With Left Sidebar</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">Product Layout Types</a>
                                <ul>
                                    <li><a href="product.php">Default Layout</a></li>
                                    <li><a href="product-extended-layout.php">Extended Layout</a></li>
                                    <li><a href="product-full-width.php">Full Width Layout</a></li>
                                    <li><a href="product-grid-layout.php">Grid Images Layout</a></li>
                                    <li><a href="product-sticky-both.php">Sticky Both Side Info<span class="tip tip-hot">Hot!</span></a></li>
                                    <li><a href="product-sticky-info.php">Sticky Right Side Info</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">Pages<span class="tip tip-hot">Hot!</span></a>
                        <ul>
                            <li><a href="cart.php">Shopping Cart</a></li>
                            <li>
                                <a href="#">Checkout</a>
                                <ul>
                                    <li><a href="checkout-shipping.php">Checkout Shipping</a></li>
                                    <li><a href="checkout-shipping-2.php">Checkout Shipping 2</a></li>
                                    <li><a href="checkout-review.php">Checkout Review</a></li>
                                </ul>
                            </li>
                            <li><a href="about.php">About</a></li>
                            <li><a href="#" class="login-link">Login</a></li>
                            <li><a href="forgot-password.php">Forgot Password</a></li>
                        </ul>
                    </li>
                    <li><a href="blog.php">Blog</a>
                        <ul>
                            <li><a href="single.php">Blog Post</a></li>
                        </ul>
                    </li>
                    <li><a href="contact.php">Contact Us</a></li>
                    <li><a href="#">Special Offer!<span class="tip tip-hot">Hot!</span></a></li>
                    <li><a href="#">Buy Porto!</a></li>
                </ul>
            </nav><!-- End .mobile-nav -->

            <div class="social-icons">
                <a href="#" class="social-icon" target="_blank"><i class="icon-facebook"></i></a>
                <a href="#" class="social-icon" target="_blank"><i class="icon-twitter"></i></a>
                <a href="#" class="social-icon" target="_blank"><i class="icon-instagram"></i></a>
            </div><!-- End .social-icons -->
        </div><!-- End .mobile-menu-wrapper -->
    </div><!-- End .mobile-menu-container -->

    <div class="newsletter-popup mfp-hide" id="newsletter-popup-form" style="background-image: url(assets/images/newsletter_popup_bg.jpg)">
        <div class="newsletter-popup-content">
            <img src="assets/images/logo-black.png" alt="Logo" class="logo-newsletter">
            <h2>BE THE FIRST TO KNOW</h2>
            <p>Subscribe to the Porto eCommerce newsletter to receive timely updates from your favorite products.</p>
            <form action="#">
                <div class="input-group">
                    <input type="email" class="form-control" id="newsletter-email" name="newsletter-email" placeholder="Email address" required>
                    <input type="submit" class="btn" value="Go!">
                </div><!-- End .from-group -->
            </form>
            <div class="newsletter-subscribe">
                <div class="checkbox">
                    <label>
                        <input type="checkbox" value="1">
                        Don't show this popup again
                    </label>
                </div>
            </div>
        </div><!-- End .newsletter-popup-content -->
    </div><!-- End .newsletter-popup -->
    <!--     body transparence for popup-->

    <a id="scroll-top" href="#top" title="Top" role="button"><i class="icon-angle-up"></i></a>

    <!-- Plugins JS File -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/plugins.min.js"></script>

    <!-- Main JS File -->
    <script src="assets/js/main.min.js"></script>
    <script src="Commandes.js"></script>
    <script src="Commandes2.js"></script>
    <script src="../backend/vendors/js/vendor.bundle.base.js"></script>
    <script src="../backend/vendors/js/vendor.bundle.addons.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page-->
    <!-- End plugin js for this page-->
    <!-- inject:js -->
    <script src="../backend/js/template.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="../backend/js/alerts.js"></script>
    <script src="../backend/js/avgrund.js"></script>
    <script>
        $(function() {
            var toggle = "<?php echo $toggle ?>";
            if (toggle == 1) {
                $("#informations").show(2000);

            }
            var nom = "<?php echo $nom ?>";
            var prenom = "<?php echo $prenom ?>";
            var login2 = "<?php echo $login2 ?>";
            console.log(nom, prenom, login2, toggle);
            $("#firstName").val(prenom);
            $("#lastName").val(nom);
//             alert($("#region").val());
            $("[value='valider']").eq(0).click(function() {
                $.post("ajouterAdresse.php", {
                        adresse: $("#streetAddress1").val() + $("#streetAddress2").val(),
                        ville: $("#city").val(),
                        pays: $("#country").val(),
                        codePostal: $("#zipCode").val(),
                        tel: $("#phoneNumber").val(),
                        region: $("#region").val(),
                        login: login2,
                        companie: $("#company").val()
                    },
                    function(data, status) {

//                        alert(data, status);
                     showSwal('title-and-text');


                    });


            })
            
           
            var modePaiement="";
            var etat="";
            var date=new Date();
            var date2=date.getFullYear()+"-"+date.getMonth()+"-"+date.getDate()+ " "+ date.getHours()+":"+date.getMinutes()+":"+date.getSeconds();
            var totalPaiement="<?php echo $_SESSION['prixTotal']?>";
           
//            alert(totalPaiement+" "+idPanier);
            
            
             $("[value='valider']").eq(1).click(function(){
                 console.log($('[name="paiement"]').eq(0).is(':checked')+"mangerrt");
                 
                   if ($('[name="paiement"]').eq(0).is(':checked') ||$('[name="paiement"]').eq(1).is(':checked')|| $('[name="paiement"]').eq(2).is(':checked') ){
                        if ($('[name="paiement"]').eq(0).is(':checked')) {
                       modePaiement="Cheque à la livraison";
                       etat="non paye";
                   }
                       else if ($('[name="paiement"]').eq(1).is(':checked')) {
                           modePaiement="Cash à la livraison";
                           etat="non paye";
                       }
                       else if ($('[name="paiement"]').eq(2).is(':checked')) {
                           modePaiement="Carte bancaire";
                       etat="paye";}
                          $.post("ajouterCommande.php", {
                     
                        totalPaiement:totalPaiement ,
                        etat: etat,
                        date: date2,
                        login: login2,
                        modeDePaiment:  modePaiement
                    },
                    function(data, status) {

//                        alert(data, status);
                               showSwal('title-and-text');
//                              alert(data);
                    });

                       
                   }
                 
                 
            })
           
             $("[value='valider']").eq(2).click(function(){
//                  alert($("[ name='CardName']").val());
//                  alert($("[ name='CardNumber']").val());
//                  alert($("[ name='ExpirationMonth']").val());
//                  alert($("[ name='ExpirationYear']").val());
//                  alert($("[ name='CVV']").val());
                 if ($('[name="paiement"]').eq(2).is(':checked')) {
                           modePaiement="Carte bancaire";
                       etat="paye";}
                          $.post("ajouterCommande.php", {
                        totalPaiement:totalPaiement ,
                        etat: etat,
                        date: date2,
                        login: login2,
                        modeDePaiment:  modePaiement
                    },
                    function(data, status) {

//                        alert(data, status);
                               showSwal('title-and-text');
                              alert(data);


                    });
                  
                    $.post("ajouterBanque.php", {
                        cardName: $("[name='CardName']").val(),
                       cardNumber: $("[ name='CardNumber']").val(),
                        expirationMonth: $("[name='ExpirationMonth']").val(),
                        expirationYear: $("[name='ExpirationYear']").val(),
                        CVV: $("[name='CVV']").val(),
                        login:  login2
                    },
                    function(data, status) {

//                        alert(data, status);
                        showSwal('title-and-text');


                    });
                 
             })
            
            $("[value='valider']").eq(3).click(function() {
                 
                $.post("ajouterAdresse.php", {
                        adresse: $("#streetAddress12").val() + $("#streetAddress22").val(),
                        ville: $("#city2").val(),
                        pays: $("#country2").val(),
                        codePostal: $("#zipCode2").val(),
                        tel: $("#phoneNumber2").val(),
                        region: $("#region2").val(),
                        login: login2,
                        companie: $("#company2").val()
                    },
                    function(data, status) {

                    
                    


                    });


            })
            $("#commander").click(function(){
                showSwal('success-message');
                window.location.href="historique.php";
            })
            
            
        })
        
//        var x=document.getElementsByTagName("input");
//        for(let i=0;i<x.length;i++){
//            x[i].placeholder.style.color="red";
//        }
        

    </script>
</body>

</html>

<?php 

    
?>
