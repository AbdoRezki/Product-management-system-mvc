<?php 
include_once("../View/connexion.php");
include_once('../Controller/categorieController.php');
include_once('../Model/produits.php');
include_once('../Controller/produitCont.php');
    session_start();
    $ref=$_GET["ref"];
    $p= new ProduitController($con);
    $p->delete($ref);
    echo "<script>location.assign('accueil.php')</script>";
    ?>