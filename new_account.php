<?PHP
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Inscription</title>

    <meta name="keywords" content="HTML5 Template" />
    <meta name="description" content="Porto - Bootstrap eCommerce Template">
    <meta name="author" content="SW-THEMES">
        
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="assets/images/icons/favicon.ico">
    
    <!-- Plugins CSS File -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <!-- Main CSS File -->
    <link rel="stylesheet" href="assets/css/style.min.css">

    <!-- Javascript File -->
    <script type="text/javascript" language="javascript" src="assets/js/my-account.js">
    </script>
</head>
<body>
    <div class="page-wrapper">
      
        <main class="main">
            <nav aria-label="breadcrumb" class="breadcrumb-nav">
                <div class="container-fluid">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Accueil</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Nouveau compte</li>
                    </ol>
                </div><!-- End .container-fluid -->
            </nav>

            <div class="container mt-2">
                <div class="row">
                    <div class="col-lg-9 order-lg-last dashboard-content">
                        <h2>Créer un nouveau compte</h2>
                        
                        <form method = "POST" action="ajouterClient.php" name = "acc_new" onsubmit="return verification()">
                            <div class="row">
                                <div class="col-sm-11">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group required-field">
                                                <label for="acc-name">Nom</label>
                                                <input type="text" class="form-control" id="firstName" name="firstName" onfocusout="validateFirstName(this)" required>
                                            </div><!-- End .form-group -->
                                        </div><!-- End .col-md-4 -->

                                        <div class="col-md-4">
                                            <div class="form-group required-field">
                                                <label for="acc-lastname">Prénom</label>
                                                <input type="text" class="form-control" id="lastName" name="lastName" onfocusout="validateFirstName(this)" required>
                                            </div><!-- End .form-group -->
                                        </div><!-- End .col-md-4 -->
                                    </div><!-- End .row -->
                                </div><!-- End .col-sm-11 -->
                            </div><!-- End .row -->

                            <div class="form-group required-field">
                                <label for="acc-birthday">Date de naissance</label>
                                <input type="date" class="form-control" id="dateNaissance" name="dateNaissance" onfocusout = "validateDateNaissance(this)" required>
                            </div><!-- End .form-group -->
                            
                            <div class="form-group required-field">
                                    <label for="acc-sexe">Sexe</label>
                                    <select name="sexe" id = "sexe" class="form-control" > 
                                            <option value="homme" selected="selected">Homme </option>
                                            <option value="femme">Femme </option>
                                    </select>
                            </div><!-- End .form-group -->

                            <div class="form-group required-field">
                                <label for="acc-email">Email</label>
                                <input type="email" class="form-control" id="email" name="email" onfocusout = "validateEmail(this)" required>
                            </div><!-- End .form-group -->
                            
                            <div class="form-group required-field">
                                <label for="acc-tel">Téléphone</label>
                                <input type="number" class="form-control" id="numTel" name="numTel" onfocusout = "validateNumTel(this)"  required>
                            </div><!-- End .form-group -->

                            <div class="form-group required-field">
                                <label for="acc-region">Région</label>
                                <select name="region" class="form-control" > 
                                    <option value="tunis">Tunis </option>
                                    <option value="sfax">Sfax </option>
                                    <option value="sousse">Sousse </option>
                                    <option value="ariana">Ariana </option>
                                    <option value="kiarouan"> Kiarouan</option>
                                    <option value="bizerte"> Bizerte</option>
                                    <option value="gabès">Gabès </option>
                                    <option value="ben arous">Ben Arous </option>
                                    <option value="gafsa"> Gafsa</option>
                                    <option value="monastir"> Monastir</option>    
                                    <option value="kasserine">Kasserine </option>
                                    <option value="la manouba"> La Manouba</option>
                                    <option value="medenine">Médenine </option>
                                </select>
                            </div><!-- End .form-group -->

                            <div class="form-group required-field">
                                <label for="acc-password">Mot de passe </label>
                                <input type="password" class="form-control" id="password" name="password" onfocusout = "validatePassword(this)" required>
                            </div><!-- End .form-group -->

                            <div class="form-group required-field">
                                <label for="acc-password">Mot de passe de confirmation</label>
                                <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" onfocusout = "validateConfirmPassword(this)" required>
                            </div><!-- End .form-group -->

                            <div class="form-group required-field">
                                <label for="acc-code">Code Postal</label>
                                <input type="text" class="form-control" id="codePostal" name="codePostal" onfocusout = "validateCodePostal(this)" required>
                            </div><!-- End .form-group -->

                            <div class="form-group required-field">
                                <label for="acc-add">Adresse de livraison</label>
                                <input type="text" class="form-control" id="addLivraison" name="addLivraison" required>
                            </div><!-- End .form-group -->


                            <div class="mb-2"></div><!-- margin -->

                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="change-pass-checkbox" value="1">
                                <label class="custom-control-label" for="change-pass-checkbox">Ajouter une 2ème adresse de livraison</label>
                            </div><!-- End .custom-checkbox -->

                            <div id="account-chage-pass">
                                <!--<h3 class="mb-2"></h3>-->
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group required-field">
                                            <label for="acc-pass2">Adresse de livraison 2</label>
                                            <input type="text" class="form-control" id="addLivraison_2" name="addLivraison_2">
                                        </div><!-- End .form-group -->
                                    </div><!-- End .col-md-6 -->
                                </div>
                            </div><!-- End #account-chage-pass -->

                            <div class="required text-right">* Champ requis</div>
                            <div class="form-footer">
                                <a href="#"><i class="icon-angle-double-left"></i>Back</a>

                                <div class="form-footer-right">
                                </div>
                                <button type="submit" bouton="1" class="btn btn-primary">S'inscrire</button>
                            </div><!-- End .form-footer -->
                        </form>
                    </div><!-- End .col-lg-9 -->

                    
                </div><!-- End .row -->
            </div><!-- End .container -->

            <div class="mb-5"></div><!-- margin -->
        </main><!-- End .main -->


    </div><!-- End .page-wrapper -->

    <div class="mobile-menu-overlay"></div><!-- End .mobil-menu-overlay -->

    <div class="mobile-menu-container">
        <div class="mobile-menu-wrapper">
            <span class="mobile-menu-close"><i class="icon-cancel"></i></span>
            <nav class="mobile-nav">
                <ul class="mobile-menu">
                    <li><a href="index.html">Accueil</a></li>
                    <li>
                        <a href="category.html">Categories</a>
                        <ul>
                            <li><a href="category-banner-full-width.html">Full Width Banner</a></li>
                            <li><a href="category-banner-boxed-slider.html">Boxed Slider Banner</a></li>
                            <li><a href="category-banner-boxed-image.html">Boxed Image Banner</a></li>
                            <li><a href="category-sidebar-left.html">Left Sidebar</a></li>
                            <li><a href="category-sidebar-right.html">Right Sidebar</a></li>
                            <li><a href="category-flex-grid.html">Product Flex Grid</a></li>
                            <li><a href="category-horizontal-filter1.html">Horizontal Filter 1</a></li>
                            <li><a href="category-horizontal-filter2.html">Horizontal Filter 2</a></li>
                            <li><a href="#">Product List Item Types</a></li>
                            <li><a href="category-infinite-scroll.html">Ajax Infinite Scroll<span class="tip tip-new">New</span></a></li>
                            <li><a href="category-3col.html">3 Columns Products</a></li>
                            <li><a href="category-4col.html">4 Columns Products</a></li>
                            <li><a href="category.html">5 Columns Products</a></li>
                            <li><a href="category-6col.html">6 Columns Products</a></li>
                            <li><a href="category-7col.html">7 Columns Products</a></li>
                            <li><a href="category-8col.html">8 Columns Products</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="product.html">Products</a>
                        <ul>
                            <li>
                                <a href="#">Variations</a>
                                <ul>
                                    <li><a href="product.html">Horizontal Thumbnails</a></li>
                                    <li><a href="product-full-width.html">Vertical Thumbnails<span class="tip tip-hot">Hot!</span></a></li>
                                    <li><a href="product.html">Inner Zoom</a></li>
                                    <li><a href="product-addcart-sticky.html">Addtocart Sticky</a></li>
                                    <li><a href="product-sidebar-left.html">Accordion Tabs</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">Variations</a>
                                <ul>
                                    <li><a href="product-sticky-tab.html">Sticky Tabs</a></li>
                                    <li><a href="product-simple.html">Simple Product</a></li>
                                    <li><a href="product-sidebar-left.html">With Left Sidebar</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">Product Layout Types</a>
                                <ul>
                                    <li><a href="product.html">Default Layout</a></li>
                                    <li><a href="product-extended-layout.html">Extended Layout</a></li>
                                    <li><a href="product-full-width.html">Full Width Layout</a></li>
                                    <li><a href="product-grid-layout.html">Grid Images Layout</a></li>
                                    <li><a href="product-sticky-both.html">Sticky Both Side Info<span class="tip tip-hot">Hot!</span></a></li>
                                    <li><a href="product-sticky-info.html">Sticky Right Side Info</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">Pages<span class="tip tip-hot">Hot!</span></a>
                        <ul>
                            <li><a href="cart.html">Shopping Cart</a></li>
                            <li>
                                <a href="#">Checkout</a>
                                <ul>
                                    <li><a href="checkout-shipping.html">Checkout Shipping</a></li>
                                    <li><a href="checkout-shipping-2.html">Checkout Shipping 2</a></li>
                                    <li><a href="checkout-review.html">Checkout Review</a></li>
                                </ul>
                            </li>
                            <li><a href="about.html">A propros</a></li>
                            <li><a href="login.php">se connecter</a></li>
                            <li><a href="forgot-password.html">Mot de passe oublié</a></li>
                        </ul>
                    </li>
                    <li><a href="blog.html">Blog</a>
                        <ul>
                            <li><a href="single.html">Blog Post</a></li>
                        </ul>
                    </li>
                    <li><a href="contact.html">Contact Us</a></li>
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

    <a id="scroll-top" href="#top" title="Top" role="button"><i class="icon-angle-up"></i></a>

    <!-- Plugins JS File -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/plugins.min.js"></script>

    <!-- Main JS File -->
    <script src="assets/js/main.min.js"></script>
</body>
</html>