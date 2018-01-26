<?php include('connection.php');
	$msg="";
	if (isset($_POST['btntrouver'])){
	
		$update="SELECT titre,description,image,communes.commune,restaurants.id FROM restaurants 
		INNER JOIN communes ON
		restaurants.id_commune=communes.id
		WHERE restaurants.id_commune=".$_POST['commune'];
		$res=mysqli_query($link,$update);
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
     

   <!-- definit le titre de la page -->
      <title> O'Resto | Venez découvrir les meilleurs restaurants près de chez vous </title>  
   <!-- logo dans la barre de titre de la page -->
      <link rel="shortcut icon" href="img/icon-oresto.ico" type="img/ico">
      </head>    

      <body> 
		<?php include('bar_menu-resto.php');    ?>

    <br>
      <div class="container">

         <center>
            <h1 style="color: #c41200"> Tous nos restaurants</h1>
          </center>
          <br>
         <div class="row">
           <div class="col-md-2"></div>
           <div class="col-md-8">
               <div class="well">
           
               <?php 
                 while ($datacat=mysqli_fetch_array($res)) {
                   ?>
                 <div class="well">
                   <div class="row">
                     <div class="col-lg-3">
                       <img src="upload/<?php echo $datacat['image'] ?>" width="100px" height="100px" alt="">
                     </div>
                     <div class="col-lg-4">
                               <h3><?php echo $datacat['titre']; ?></h3> 
                     </div>
                     <div class="col-lg-3">
                       <p> <?php echo $datacat['description'];  ?> </p>
                     </div class="col-lg-1">
                     <div>
                       <a href="restaurant.php?id=<?php echo $datacat['id']; ?>">
                                   <button type="button" class="btn btn-primary">Visitez</button>
                               </a>
                     </div>
                   </div>
                         <br>
                 </div>
               <?php 
                 }
               ?>
               </div>  
           </div>
         </div>
		</div>


		<!-- jQuery -->
		<script src=""></script>
		<!-- Bootstrap JavaScript -->
		<script src=""></script>
		<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
 		<script src="Hello World"></script>


	</body>
</html>



