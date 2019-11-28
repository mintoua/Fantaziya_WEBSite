<?php 
//session_start();
include "../../core/PanierC.php";
//print_r($_SESSION);
// echo $_SESSION['idCommande'];
if(!empty($_SESSION["email"])){
    $temp=1;
}
else $temp=0;
?>
<!DOCTYPE html>
<html lang="en">
<head>

   
   
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Chariot</title>

    <meta name="keywords" content="HTML5 Template" />
    <meta name="description" content="Porto - Bootstrap eCommerce Template">
    <meta name="author" content="SW-THEMES">
        
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="assets/images/icons/favicon.ico">
    
    <!-- Plugins CSS File -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <!-- Main CSS File -->
    <link rel="stylesheet" href="assets/css/style.min.css">
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
    }?>
   ?>
            <div class="page-wrapper">
        <main class="main">
            <nav aria-label="breadcrumb" class="breadcrumb-nav">
                <div class="container-fluid">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Panier</li>
                    </ol>
                </div><!-- End .container-fluid -->
            </nav>

            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="cart-table-container">
                            <table class="table table-cart">
                                <thead>
                                    <tr>
                                        <th class="product-col">Produit</th>
                                        <th class="price-col">Prix</th>
                                        <th class="qty-col">Quantite</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                   <?php produitPanierC::afficherPanier($_SESSION['idCommande']) ;?>
      
                                    <tr class="product-action-row">
                                        <td colspan="4" class="clearfix">
                                            <div class="float-left">
                                            </div><!-- End .float-left 
                                            
                                            <div class="float-right">
                                                <a href="#" title="Edit product" class="btn-edit"><span class="sr-only">Edit</span><i class="icon-pencil"></i></a>
                                                <a href="#" title="Remove product" class="btn-remove"><span class="sr-only">Remove</span></a>
                                            </div><!-- End .float-right -->
                                        </td>
                                    </tr>
                                </tbody>

                                <tfoot>
                                    <tr>
                                        <td colspan="4" class="clearfix">
                                            <div class="float-left">
                                                <a href="category2.php" class="btn btn-outline-secondary">continuer le Shopping</a>
                                            </div><!-- End .float-left -->

                                           <!-- End .float-right -->
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div><!-- End .cart-table-container -->

                        <div class="cart-discount">
                         
                        </div><!-- End .cart-discount -->
                    </div><!-- End .col-lg-8 -->

                    <div class="col-lg-4">
                        <div class="cart-summary">
                            <h3>Sommaire</h3>

                

                            <div class="collapse" id="total-estimate-section">
                                <form action="#">
                                    <div class="form-group form-group-sm">
                                        <label>Country</label>
                                        <div class="select-custom">
                                            <select class="form-control form-control-sm">
                                                <option value="USA">United States</option>
                                                <option value="Turkey">Turkey</option>
                                                <option value="China">China</option>
                                                <option value="Germany">Germany</option>
                                            </select>
                                        </div><!-- End .select-custom -->
                                    </div><!-- End .form-group -->

                                    <div class="form-group form-group-sm">
                                        <label>State/Province</label>
                                        <div class="select-custom">
                                            <select class="form-control form-control-sm">
                                                <option value="CA">California</option>
                                                <option value="TX">Texas</option>
                                            </select>
                                        </div><!-- End .select-custom -->
                                    </div><!-- End .form-group -->

                                    <div class="form-group form-group-sm">
                                        <label>Zip/Postal Code</label>
                                        <input type="text" class="form-control form-control-sm">
                                    </div><!-- End .form-group -->

                                    <div class="form-group form-group-custom-control">
                                        <label>Flat Way</label>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="flat-rate">
                                            <label class="custom-control-label" for="flat-rate">Fixed $5.00</label>
                                        </div><!-- End .custom-checkbox -->
                                    </div><!-- End .form-group -->

                                    <div class="form-group form-group-custom-control">
                                        <label>Best Rate</label>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="best-rate">
                                            <label class="custom-control-label" for="best-rate">Table Rate $15.00</label>
                                        </div><!-- End .custom-checkbox -->
                                    </div><!-- End .form-group -->
                                </form>
                            </div><!-- End #total-estimate-section -->

                            <table class="table table-totals">
                                <tbody>
                                    <tr>
                                       
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td>Total Commande</td>
                                        <td id="prixTotal">$17.90</td>
                                    </tr>
                                </tfoot>
                            </table>

                            <div class="checkout-methods">
                                <span  class="btn btn-block btn-sm btn-primary" >passer la commande</span>
                            </div><!-- End .checkout-methods -->
                        </div><!-- End .cart-summary -->
                    </div><!-- End .col-lg-4 -->
                </div><!-- End .row -->
            </div><!-- End .container -->

            <div class="mb-6"></div><!-- margin -->
        </main><!-- End .main -->

    </div><!-- End .page-wrapper -->

    <div class="mobile-menu-overlay"></div><!-- End .mobil-menu-overlay -->

    <div class="mobile-menu-container">
        <div class="mobile-menu-wrapper">
            <span class="mobile-menu-close"><i class="icon-cancel"></i></span>
            <nav class="mobile-nav">
                <ul class="mobile-menu">
                    <li><a href="index.php">Accueil</a></li>
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

    <a id="scroll-top" href="#top" title="Top" role="button"><i class="icon-angle-up"></i></a>

    <!-- Plugins JS File -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/plugins.min.js"></script>

    <!-- Main JS File -->
    <script src="assets/js/main.min.js"></script>
    <script >
        
        $(function(){
            var temp="<?php echo $temp?>";
//            alert(temp);
            var index=0;
            var image;
            $(".btn-remove").click(function() {
                image=$(this).attr("id");
                console.log($(this).parent().parent().parent().prev());
                $(this).parent().parent().parent().prev().remove();
                $(this).parent().parent().parent().remove();
                
                 $.post("supprimerPanier.php", {
                       image:image
                    },
                    function(data, status) {

//                        alert(data, status);


                    });
        })
            
            var prixTotal=0;
             var x=document.getElementsByClassName("prix");
            for(var i=0;i<x.length;i++){
                console.log(typeof(x[i].textContent));
                prixTotal+=parseInt(x[i].textContent);
               
            }
            $(".btn.btn-block.btn-sm.btn-primary").click(function(){
                
                window.location.href="checkout-shipping.php?prixTotal="+prixTotal+"";
            })
           
            $("tbody").eq(1).children("tr").html("<p style='font-size:15px;margin-top:20px;'>Nombre de Produits :"+ x.length+"</p>");
             $("#prixTotal").text(prixTotal+" dinars");
              var quantite=new Array();
              var image2=new Array();
            $(".btn.btn-outline.bootstrap-touchspin-up.icon-up-dir,.btn.btn-outline.bootstrap-touchspin-down.icon-down-dir").click(function() {
                $(this).each(function() {
                    console.log($(this).parent().siblings("input").attr("image2"));
                    var index=parseInt($(this).parent().siblings("input").attr("index"));
                    quantite[index]=$(this).parent().siblings("input").val();
                    console.log(quantite[index]);
                    image2[index]=$(this).parent().siblings("input").attr("image2");
                    })
                
                 $.post("modifierPanier.php", {
                       image2:image2,
                     quantite:quantite
                    },
                    function(data, status) {

//                        alert(data, status);


                    });
                })
            
            
            
            
        })
  
    </script>
    
</body>
</html>