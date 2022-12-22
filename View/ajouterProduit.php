<?php 
include_once("../View/connexion.php");
include_once('../Controller/categorieController.php');
include_once('../Model/produits.php');
include_once('../Controller/produitCont.php');
    session_start();
    if (isset($_POST['submit'])){
     $a= new ProduitController($con);
     $libelle=$_POST['libelle'];
		$pu=$_POST['prixUnitaire'];
		$dateAchat=$_POST['dateAchat'];
		$categorie=$_POST['categorie'];
		$filename = $_FILES["file"]["name"];
		$filename = str_replace("'", "_", $filename);
		$tempname = $_FILES["file"]["tmp_name"];
		$folder = "../images/" . $filename;
		if (move_uploaded_file($tempname, $folder)) {
			echo "<h3>  Image uploaded successfully!</h3>";
		} else {
			echo "<script>  alert('Failed to upload image!')</script>";
		}
    $produit= new Produit($libelle,$pu,$dateAchat,$filename,$categorie);
     $a->insertProduct($produit);
    echo "<script>location.assign('accueil.php')</script>";
    }
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    
    <title>Accueil</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Application Produit</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="accueil.php">Accueil </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Ajouter Produit</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="deconnexion.php">Quitter la session</a>
      </li>
    </ul>
  </div>
</nav>
<h2 class="text-center">Ajouter un produit</h2>
<form enctype="multipart/form-data" class="text-center" action="ajouterProduit.php" method="POST" style="width:40%;margin-left:30%;margin-top:3%;padding-bottom:6.55%" >
  		<div class="form-group row">
  		<label for="staticEmail" class="col-sm-2 col-form-label">Libelle</label>
  		<div class="col-sm-10">
    		<input type="text" class="form-control" id="staticEmail" name="libelle" placeholder="Libelle">
  		</div>
	</div>
	<div class="form-group row" style="margin-top:2%">
  		<label for="staticEmail" class="col-sm-2 col-form-label">Prix Unitaire</label>
  		<div class="col-sm-10">
    		<input type="text" class="form-control" id="staticEmail" name="prixUnitaire" placeholder="Prix">
  		</div>
	</div>
    <div class="form-group row" style="margin-top:2%">
  		<label for="staticEmail" class="col-sm-2 col-form-label">Date Achat</label>
  		<div class="col-sm-10">
    		<input type="date" class="form-control" id="staticEmail" name="dateAchat">
  		</div>
	</div>
    <div class="form-group row" style="margin-top:2%">
        <label for="" class="col-sm-2 col-form-label">Ajouter l'image</label>
        <div class="col-sm-10">
            <input type="file" name="file" class="form-control" id="staticEmail">
        </div>
    </div>
    <div class="form-group row" style="margin-top:2%">
        <label for="" class="col-sm-2 col-form-label">Categorie</label>
        <div class="col-sm-10">
        <select name="categorie">
            <option value="">selectionner une catégorie</option>
        <?php 
        $categorie=new CategorieController($con);
        $categories= $categorie->getCats();
        foreach($categories as $i => $categorie):?>
        <option value="<?php echo $categorie["id"] ?>"> <?php echo $categorie["denomination"] ?></option>
        <?php endforeach;  ?>
        </select>
        </div>
        </div>
        <input type="submit" name="submit" value="submit" class="btn btn-primary" style="margin-top:2%; width:30%;">
	</form>
</body>