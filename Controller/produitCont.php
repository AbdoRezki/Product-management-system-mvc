<?php 
class ProduitController{
	private $con;
	function __construct($con){
		$this->con = $con;
	}
	public function getProducts(){
        $statement = $this->con->query("SELECT * FROM `produit`");
        $produits = $statement->fetchAll(PDO::FETCH_ASSOC);    
        return $produits;
    }
	public function getProduct($ref){
        $result = $this->con->query("select * from produit where reference='$ref'");
    	while($row=$result->fetch()){
		$produit[]=$row;
		return $produit;
    }
    }		
	public function insertProduct(Produit $produit){
    	$sql=$this->con->prepare("INSERT INTO `produit` (`libelle`, `prixUnitaire`, `dateAchat`, `photoProduit`, `idCategorie`) VALUES(?,?,?,?,?);");
      $sql->execute(array($produit->get_libelle(),$produit->get_pu(),$produit->get_date(),$produit->get_image(),$produit->get_categorie()));
    }	
	public function update(Produit $produit,$ref){
      if($produit->get_image()==""){
        $sql=$this->con->prepare("UPDATE `produit` SET `libelle`=?, `prixUnitaire`=?, `dateAchat`=?, `idCategorie`=? where `reference`=?");
        $sql->execute(array($produit->get_libelle(),$produit->get_pu(),$produit->get_date(),$produit->get_categorie(),$ref));
        echo "<script>location.assign('accueil.php')</script>";
      }
      else{
        $sql=$this->con->prepare("UPDATE `produit` SET `libelle`=?, `prixUnitaire`=?, `dateAchat`=?,`photoProduit`=?, `idCategorie`=? where `reference`=?");
        $sql->execute(array($produit->get_libelle(),$produit->get_pu(),$produit->get_date(),$produit->get_image(),$produit->get_categorie(),$ref));
    }
    echo "<script>location.assign('accueil.php')</script>";
}
	public function delete($ref){
    	$this->con->exec("DELETE FROM `produit` WHERE reference='$ref'");
    }

}


?>