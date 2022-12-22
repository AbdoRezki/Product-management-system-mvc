<?php 
class Categorie{
    private $denomination;
    private $description;
    function __construct($denomination, $description){
        $this->denomination = $denomination;
        $this->description = $description;
    }
    function getDenomination(){
        return $this->denomination;
    }
    function getDescription(){
        return $this->description;
    }
}
?>