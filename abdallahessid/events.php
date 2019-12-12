<?php include "incl/header.php";?>

    <html>
        <head>
            <title>Evenements</title>
            <style>
                h3,h4{
                    text-align:left;
                }
                h3{
                    font-weight:900;
                    text-transform:uppercase;
                    margin-top:30px;
                    margin-bottom:10px;
                    margin-left:10px;
                }
                h4{
                    margin-left:30px;
                }
            </style>
        </head>
        <body>
        <div class="breadcumb_area breadcumb-style-two bg-img" >
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="page-title text-center">
                        <h2>Evenement</h2>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php 
    
                        $con=mysqli_connect('localhost','root','');
                        $db=mysqli_select_db($con,'fantaziya');

                        $sql="select id,nom,description from events";
                        $result=$con->query($sql);

                        if ($result->num_rows>0){
                        while($row=$result->fetch_assoc()){
                        echo "<h3>".$row["nom"]."</h3><br><h4>".$row["description"]."</h4>";
                        }
                        }
                        ?>

    </body>
    </html>
<?php include "incl/footer.php";?>