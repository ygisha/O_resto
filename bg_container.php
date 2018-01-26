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
      <!--    
         <link rel="stylesheet" type="text/css" href="css/bg_img_fader.css"> 
      -->

   <!--   ****  Insertion des bibliothèques javascript  ****  -->
      <script type="text/javascript" src="js/bootstrap.min.js"></script>
      <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
      <!--    
         <script type="text/javascript" src="js/bg_img_fader.js"></script>
      -->
   <!-- definit le titre de la page -->
      <title> O'Resto | Venez découvrir les meilleurs restaurants près de chez vous </title>  
   <!-- logo dans la barre de titre de la page -->
      <link rel="shortcut icon" href="img/icon-oresto.ico" type="img/ico">

            <!--  Balise de style de la bannière "fading" de jquery de la page d'accueil  -->
      <style>
         .bg_container{
             height:347px;
         }
         
      /* ---  Règles de changement d'images de la bannière  ---  */
         @-webkit-keyframes cfFadeInOut{
             0% {
                 opacity:1;
             }
             20%{
                 opacity:1;
             }
             25%{
                 opacity:0;
             }
             96%{
                 opacity:0;
             }
             100% {
                 opacity:1;
             }
         }

         @keyframes cfFadeInOut {
             0% {
                 opacity:1;
             }
             20%{
                 opacity:1;
             }
             25%{
                 opacity:0;
             }
             96%{
                 opacity:0;
             }
             100% {
                 opacity:1;
             }
         }

         .images_container {
           position:relative;
           height:281px;
           width:100%;
           margin:0 auto;
           height: 100%;
           overflow: hidden;
         }

         .images_container img.animation {
             min-width:100%;
             position:absolute;
             left:0;
             -webkit-animation-name: cfFadeInOut;
             -webkit-animation-iteration-count: infinite;
             -webkit-animation-duration: 50s;
             animation-iteration-count: infinite;
             animation-name: cfFadeInOut;
             animation-duration: 50s;
         }

         /*  Détermine la durée de changement de l'image */
         .images_container img.i1{
             -webkit-animation-delay:40s;
             animation-delay:40s;
         }
         .images_container img.i2{
             -webkit-animation-delay:30s;
             animation-delay:30s;
         }
         .images_container img.i3{
             -webkit-animation-delay:20s;
             animation-delay:20s;
         }
         .images_container img.i4{
             -webkit-animation-delay:10s;
             animation-delay:10s;
         }
         .images_container img.i5{
             -webkit-animation-delay:0s;
             animation-delay:0s;
         }
         img.default{
             opacity:0;
         }
     </style>
   </head>       

   <body> 

   <!-- ***  Création de la bannière d'accueil qui mue "fading banner avec jquey  ***  -->

      <!--  Section banner des images accueil de la page -->
      <section class="bg_container">
         <div class="images_container" id="images_container">
             <img class="animation i1" src="img/bg/bg_h1.jpg">
             <img class="animation i2" src="img/bg/bg_h2.jpg">
             <img class="animation i3" src="img/bg/bg_h3.jpg">
             <img class="animation i4" src="img/bg/bg_h4.jpg">
             <img class="animation i5" src="img/bg/bg_h5.jpg">
         </div>
     </section>
     
      <!--  Script jquery de la banner d'accueil qui change d'image de fond-->   
     <script type="text/javascript">
        
         var basic_url = "/static/v4/images/s_welcome/images/bg_h"; 
         var images_numbers = [1,2,3,4,5].shuffle();
         images_numbers.each(function(value, index){
             var index_value = parseInt(index)+1;
             $$('.i' + index_value).set('src', basic_url + value + '.jpg');
         });
         $$('#images_container').addClass('images_container');
     
     </script>


 </body>
</HTML>



