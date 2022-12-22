<?php
class CategorieController{
    private $con;
    public function __construct($con) {
		// $db= new DatabaseConnection;
        $this->con=$con;
	}
    public function getCats(){
        $statement = $this->con->query("SELECT * FROM `categorie`");
        $categories = $statement->fetchAll(PDO::FETCH_ASSOC);    
        return $categories;
    }
    public function getCatsE($categorie){
        $sql = $this->con->query("SELECT * FROM categorie where id!= $categorie");
        $categories = $sql->fetchAll(PDO::FETCH_ASSOC);    
        return $categories;
    }
    public function getCat($categorie){
        $sql = $this->con->query("SELECT * FROM categorie where id= $categorie");
        while ($row=$sql->fetch()){
            $cat[]=$row;
        }
        return $cat;
    }
    
}
?>