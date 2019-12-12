<?php

    if (isset($_POST['insert'])){
        $hostname="localhost";
        $username="root";
        $password="";
        $database="fantaziya";

        $first_name=$_POST['firstname'];
        $last_name=$_POST['lastname'];
        $email=$_POST['email'];
        $message=$_POST['message'];

        $connect=mysqli_connect($hostname,$username,$password,$database);
        $query="INSERT INTO `reclamation`(`first name`,`last name`,`E-mail`,`message`) VALUES ('$first_name','$last_name','$email','$message')";

        $result=mysqli_query($connect,$query);
    }
?>




<?php include "incl/header.php";?>



    <!-- ##### Breadcumb Area Start ##### -->
    <div class="breadcumb_area bg-img" style="background-image: url(img/bg-img/breadcumb.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="page-title text-center">
                        <h2>Votre reclamation</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Breadcumb Area End ##### -->

    <!-- ##### Checkout Area Start ##### -->
    <div class="checkout_area section-padding-80">
        <div class="container">
            <div class="row">

                <div class="col-12 col-md-6">
                    <div class="checkout_details_area mt-50 clearfix">

                        <div class="cart-page-heading mb-30">
                            
                        </div>

                        <form name="form1" action="" method="post">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label >Nom <span>*</span></label>
                                    <input type="text" class="form-control" id="firstname" name="firstname" value="" required="required">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label >Prénom<span>*</span></label>
                                    <input type="text" class="form-control" id="lastname" name="lastname"value="" required="required">
                                </div>
                                <div class="col-12 mb-3">
                                    <label >Adresse e-mail<span>*</span></label>
                                    <input type="email" class="form-control" id="email"name="email" value=""required="required">
                                </div>
                                
                                <div class="col-12 mb-3">
                                    <label >message reclamtion<span>*</span></label>
                                    <input type="text" class="form-control" id="message" name="message"value="" required="required">
                                </div>
                                

                                <div class="col-12">
                                    <div class="custom-control custom-checkbox d-block mb-2">
                                        
                                    </div>
                                </div>
                            </div>
                            <button class="btn essence-btn" name="insert">envoyer reclamtion</button>
                             
                        </form>
                    </div>
                </div>

                
                        
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
            
    <!-- ##### Checkout Area End ##### -->

    <?php include "incl/footer.php";?>