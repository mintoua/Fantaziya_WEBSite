<?php


$con=mysqli_connect('localhost','root','');

if(!$con){
    echo 'Not connected to Database';
}

if(!mysqli_select_db($con,'Fantaziya')){
    echo 'Database not connected';
}

$id = $_POST['id'];
$categorie = $_POST['categorie'];
$prix = $_POST['prix'];
$disponible = $_POST['disponible'];
$img = $_POST['img'];

$sql = "INSERT INTO produit (id,categorie,prix,disponible,img) VALUES ('$id','$categorie', '$prix', '$disponible', '$img')";

if (!mysqli_query($con,$sql)){
    echo 'Pas enregistré';
}
else{
    echo 'Enregistré';
}


