<?php
    $hostname="localhost";
    $username="root";
    $password="";
    $database="testbd";
    $connect=mysqli_connect($hostname,$username,$password,$database);
    $query="SELECT * FROM events";
    $result=mysqli_query($connect,$query);

    if (isset($_POST['submit'])){
        $nom=$_POST['nom'];
        $description=$_POST['description'];
        $query="UPDATE events SET nom='$nom',description='$description' where id='$id'";
        $result1=mysqli_query($connect,$query);
        if ($result1){
            echo"data updated";
        }
    }
    ?>
    <html>
    <head>
    </head>
    <body>
        <form action="" method="POST"></form>
        <?php while($row=mysqli_fetch_array($result)) { ?>
        Nom: <input type="text" name="nom" value="<?php echo $row['nom']; ?>">
        Description: <input type="text" name="description" value="<?php echo $row['description']; ?>">
        <input type="submit" name="submit" value="submit">
        <?php } ?>
    </body>
    </html>
