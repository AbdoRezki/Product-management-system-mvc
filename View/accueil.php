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
    <?php 
include_once("../View/connexion.php");
include_once('../Controller/categorieController.php');
include_once('../Model/produits.php');
include_once('../Controller/produitCont.php');

// if (!isset($_SESSION['loginProp'])){
    //   echo "<script>location.assign('login.php')</script>";
    // }
    session_start()

    ?>
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
        <a class="nav-link" href="ajouterProduit.php">Ajouter Produit</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="deconnexion.php">Quitter la session</a>
      </li>
    </ul>
  </div>
</nav>
<?php 
$now=date("H:i:s");
if (strtotime($now)<strtotime("17:00:00")){?>
    <h1 class="text-center mt-3" style="color:#6c757d">Bonjour <?php echo $_SESSION['nom']." ".$_SESSION['prenom'] ?></h1>
<?php }
else{?>
<h1 class="text-center mt-3" style="color:#6c757d">Bonsoir <?php echo $_SESSION['nom']." ".$_SESSION['prenom'] ?></h1>
<?php } ?>
<?php

    $pc= new ProduitController($con);
    $produits=$pc->getProducts();
    
?>

        <section class="container">
            <div class="row">
                    <div class="col-12">
                        <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Produits</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-head-fixed text-nowrap">
                            <thead>
                                <tr>
                                <th>Reference</th>
                                <th>Libelle</th>
                                <th>Prix Unitaire</th>
                                <th>Date Achat</th>
                                <th>Photo</th>
                                <th>Catégorie</th>
                                <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($produits as $i => $produit):?>
                                <tr>
                                <td><?php echo $produit["reference"];?></td>
                                <td><?php echo $produit["libelle"];?></td>
                                <td><?php echo $produit["prixUnitaire"];?></td>
                                <td><?php echo $produit["dateAchat"];?></td>
                                <td><img style="width:100px;height:100px"src="../images/<?php echo $produit["photoProduit"];?>"></td>
                                
                                

                                <?php
                                $idc = $produit["idCategorie"];
                                $cate= new CategorieController($con);
                                $cat= $cate->getCat($idc);
                                foreach($cat as $i=>$ca):
                                ?>
                                <td><?php echo $ca["denomination"]; endforeach?></td>
                                <td>   
									                  <a class="btn btn-success" href="modifierProduit.php?ref=<?php echo $produit["reference"];?>" role="button">Modifier</a>
                                    <a href="supprimerProduit.php?ref=<?php echo $produit["reference"];?>" class="btn btn-danger" onclick="return confirm('Are you sure!');" role="button">Supprimer</a>
                                    <!-- <a href="role="button" name="supprimer"><input type="submit" class="btn btn-danger" value="Supprimer"></a> -->
                                </td>
                                </tr>
                                <?php endforeach;  ?>
                            </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            </section>
</body>

</html>