<?php
include_once("../View/connexion.php");
include_once('../Model/categorie.php');
include_once('../Model/produits.php');
include_once('../Controller/produitCont.php'); 
class Produit{
    private $libelle;
    private $pu;
    private $dateAchat;
    private $image;
    private $categorie;
    function __construct($libelle, $pu, $dateAchat, $image, $categorie){
        $this->libelle = $libelle;
        $this->pu = $pu;
        $this->dateAchat = $dateAchat;
        $this->image = $image;
        $this->categorie = $categorie;
    }
    function get_libelle(){
        return $this->libelle;
    }
    function get_pu(){
        return $this->pu;
    }
    function get_date(){
        return $this->dateAchat;
    }
    function get_image(){
        return $this->image;
    }
    function get_categorie(){
        return $this->categorie;
    }
}
?>