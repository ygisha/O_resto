<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Gallerie Spécialités</title>
    
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/thumbnails.css">

    <!-- Custom styles for this template -->

  </head>

  <body>

    <?php 
         //recupere toutes les categories dans la bd
               $sqlcategorie="SELECT * FROM categories";
               //execute la requete et on la stock dans $repcategorie
               $repcategorie=mysqli_query($link,$sqlcategorie);
               //mysqli_fetch_array = permet de tran sformer le resultat $repcategorie en variable de type tableau $datacat
               // la boucle while nous permet de parcourir le tableau $datacat et de recuperer les valeurs de chaques elements du tableau $datacat
               
                  ?>
                     
               

    <div class="container">

      <h1 class="my-4 text-center text-lg-left grdtitre">Nos Spécialités</h1>
      <br>
      <div class="row text-center text-lg-left">
        <?php while ($datacat=mysqli_fetch_array($repcategorie)) { ?>
        <div class="col-lg-3 col-md-4 col-xs-6">
          <a href="specialites.php?id=<?php echo $datacat['id']; ?>" class="d-block mb-4 h-100">
            <img class="img-fluid img-thumbnail" src="upload/<?php echo $datacat['image']  ?>" alt="">

            <h3 class="legende"><?php echo $datacat['libelle'] ?></h3>
          </a>
        </div>
        <?php }
     ?>
      </div>

    </div>
    
    <!-- /.container -->


    <!-- Bootstrap core JavaScript -->
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

  </body>

</html>
