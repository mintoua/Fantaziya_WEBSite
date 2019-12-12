<?php
    session_start();

    $db=mysqli_connect('localhost','root','','fantaziya');

    if (isset($_POST['register'])){
        $nom=$_POST['nom'];
        $prenom=$_POST['prenom'];
        $username=$_POST['username'];
        $email=$_POST['email'];
        $password=$_POST['password'];
        $adresse=$_POST['adresse'];
        $tel=$_POST['tel'];

        $sql="insert into utilisateurs (nom,prenom,username,email,motdepasse,adresse,tel) values('$nom','$prenom','$username','$email','$password','$adresse','$tel')";
        mysqli_query($db,$sql);
        $_SESSION['username']=$username;
        header('location:index.php');
    }
?>