<?php include('connection.php');
if (isset($_GET['id'])){
   $update="SELECT titre,description,restaurants.image,telephone, adresse, categories.libelle FROM restaurants 
      INNER JOIN categories ON
      restaurants.id_categories=categories.id
      WHERE restaurants.id=".$_GET['id'];
   $res=mysqli_query($link,$update);
      $dataU=mysqli_fetch_array($res);

      if (isset($_POST['btnValider'])){
      $sql= "INSERT INTO commentaires (description,id_resto) VALUES ('".$_POST['commentaire']."', '".$_GET['id']."')";
      $result=mysqli_query($link ,$sql);
      if ($result) { 
         $msg='Insertion reussie';
      }else{
         $msg=mysqli_error($link);
      }
   }

   }
 ?>
<!DOCTYPE HTML>
   <HTML lang="en">    
      <head>  
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

         <title>   O'resto </title>  <!-- definit le titre de la page -->
         <!-- logo dans la barre de titre de la page -->
            <link rel="shortcut icon" href="img/icon-oresto.ico" type="img/ico">   
      </head>    

      <body>  
  
      <?php include('bar_menu-resto.php');
      ?>
        
      <!-- cards pour afficher les restaurants -->
            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
               <div class="thumbnail">
                  <a href="#">
                        <img src="upload/<?php echo $dataU['image'];  ?>" width="242px" height="200px" alt="">
                  </a>
                  <div class="caption">
                     <h3><strong> <?php echo $dataU['titre'];  ?> </strong></h3>
                     <p>
                         <?php echo $dataU['description'];  ?>
                     </p>
                     <p>
                         <?php echo $dataU['telephone'];  ?>
                     </p>
                     <p>
                         <?php echo $dataU['adresse'];  ?>
                     </p>

                  </div>
               </div>
             </div>

               

<!-- Code des commentaires -->

            <div class="well well-lg"> 
               <div class="row">   
                     <form action="" method="POST" role="form">
                        <div class = col-sm-6>
                           <div class="form-group">
                              <label for="">Commentaire</label>                   
                              <textarea name="commentaire" class="form-control"  placeholder="Entrer votre Commentaire" rows="10" cols=""> </textarea>
                           </div>

                           <div class="row">
                              <div class = col-sm-4>
                                 <button name="btnValider" type="submit" class="btn btn-primary btn-lg btn-block">Valider
                                 </button>
                             </div>
                           </div> 
                  </div>
                     </form>
                  </div>
                  
               </div>

            <div class="row">
               <table class="table">
                  <thead>
                     <tr>
                        <th>Commentaires</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php 
                        $n=1;
                        $list=" SELECT 
                                 description
                              FROM commentaires
                              WHERE id_resto = ".$_GET['id'];
                        $res= mysqli_query($link,$list);
                   while ($data = mysqli_fetch_array($res)){
                        
                      ?>
                     <tr>
                        <td> <?php echo $n; ?> </td>
                        <td><?php echo $data['description']; ?></td>
                     </tr>
                     <?php $n++;
                      } ?>
                  </tbody>
               </table>
            </div>

      </body>
   </html>
