<?php include('connection.php'); /* Import du fichier de connection à la base de données [db_resto]*/
?>
<!DOCTYPE HTML>
<!-- definit la langue de la page -->
<HTML lang="en">    
   <head>  
   <!-- definit l'encodage des charactères de la page -->
      <meta charset="utf-8"> 
   <!-- définit la description de la page -->
      <meta name="description" content=" Venez découvrir les meilleurs restaurants près de chez vous"> 
   <!-- definit les mots clés pour les moteurs de recherche -->
      <meta name="keywords" content="food restaurant plats cuisine "> 
   <!-- definit l'auteur de la page -->
      <meta name="author" content="O'Resto"> 
   <!-- Interdire le mode de compatibilité sur IE -->
      <meta http-equiv="X-UA-Compatible" content="IE=edge" /> 
   <!-- Donne les instructions au navigateur sur comment controler l'échelle et les dimensions de la page "doit apparaître dans toutes les pages "-->
      <meta name="viewport" content="width=device=width, initial-scale=1.0"> 

   <!--  ****  liens bootstrap | fonts (polices) | feuilles de styles css  **** -->
      <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
      <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
      <link rel="stylesheet" type="text/css" href="css/styles.css">
      
   <!--   ****  Insertion des bibliothèques javascript  ****  -->
      <script type="text/javascript" src="js/bootstrap.min.js"></script>
      <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>

         <!--  script de la bannière "fading" de jquery de la page d'accueil  -->
      <link rel="stylesheet" type="text/css" href="css/bg_container.css">
   <!-- definit le titre de la page -->
      <title> O'Resto | Venez découvrir les meilleurs restaurants près de chez vous </title>  
   <!-- logo dans la barre de titre de la page -->
      <link rel="shortcut icon" href="img/icon-oresto.ico" type="img/ico">

           
   </head>       

   <body> 
   <!--  Entête de la page -->
      <header id="banner-menu">
         <!--  Insertion du menu   -->
            <?php include('bar_menu-resto.php'); ?>
      </header>

   <!-- ***  Création de la bannière d'accueil qui mue "fading banner avec jquey  ***  -->

      <!--  Insertion de la section banner des images accueil de la page -->

       <?php include('bg_container.php'); ?>

   <!--  Bloc de recherche des restaurants par commune -->

   <div id="container">
      
      <br>
      <div class="banner">
         <div class="row">
            <h1>Découvrez les meilleurs restaurants près de chez vous</h1>
         </div>
         <form action="restaurants.php" class="form-inline" method="POST">
            <select name="" id="" class="form-control input-lg">
               <option value="1">Abidjan</option>
            </select>
            <select name="commune" id="" class="form-control input-lg">
               <?php
               //recupere toutes les categories dans la bd
               $sqlcategorie="SELECT * FROM communes";
               //execute la requete et on la stock dans $repcategorie
               $repcategorie=mysqli_query($link,$sqlcategorie);
               //mysqli_fetch_array = permet de tran sformer le resultat $repcategorie en variable de type tableau $datacat
               // la boucle while nous permet de parcourir le tableau $datacat et de recuperer les valeurs de chaques elements du tableau $datacat
               while ($datacat=mysqli_fetch_array($repcategorie)) {
                  ?>
                  <option value="<?php echo $datacat['id'];?>">
                  <?php echo $datacat['commune'];?>
                     
                  </option>

                  <?php
               }
               ?>
            </select>
            <input type="submit" name="btntrouver" class="btn btn-primary btn-lg" value="trouver" target="_blank">
            <?php ?>
         </form>
      </div>

      <br><br>
      <!--  Insertion de la gallery photoy   -->
      <?php include('thumbnails.php'); ?>
    
      <br>

   </div>
   
   <!--  Insertion du footer   -->
      <?php include('footer.php'); ?>
  

 </body>
</HTML>



