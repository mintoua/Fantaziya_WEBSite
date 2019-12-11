<?php

session_start();
$mysqli = new mysqli('localhost', 'root', '', 'fantaziya') or die (mysqli_error($mysqli));
$nom='';
$type='';
$id=0;
$update=false;
if (isset($_POST['save'])){
   $nom= $_POST['nom'] ;
   $type = $_POST['type'];
   
   $mysqli->query("INSERT INTO categorie (nom, type) VALUES ('$nom','$type')") or die ($mysqli->error);
   $_SESSION ['message']= "Recordhas been saved";
   header("location: categorie.php");
}
if (isset($_GET['delete'])){
    $id = $_GET['delete'];
    $mysqli->query("DELETE FROM categorie  WHERE id=$id") or die ($mysqli->error());
    $_SESSION ['message']= "Record has been deleted";
    header("location: categorie.php");
}
if (isset($_GET['edit'])){
    $id=$_GET['edit'];
    $update=true;
    $result=$mysqli->query("SELECT * FROM categorie WHERE id=$id") or die ($mysqli->error);
    
    
        $row = $result->fetch_array();
        $nom = $row ['nom'];
        $type = $row['type'];
    
}
if (isset($_POST['update'])){
    $id = $_POST['id'];
    $nom= $_POST['nom'] ;
    $type = $_POST['type'];
    
    $mysqli->query("UPDATE categorie SET nom='$nom',type='$type' WHERE id =$id" ) or die ($mysqli->error);
    $_SESSION ['message']= "Record has been update";
    header("location: categorie.php");
 }
 if(isset($_GET['recherche']) and !empty($_GET['rehcerhce'])){
     $recherche=htmlspecialchars($_GET['recherche']);
     $re=$mysqli->query("SELECT * FROM categorie WHERE nom LIKE %.$recherche.%") or die ($mysqli->error);
 }