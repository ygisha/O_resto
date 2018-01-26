<?php 
include('connection.php'); /* Import du fichier de connection à la base de données [db_blog]*/ 
$msg="";
	if (isset($_POST['btnValider'])){
		$sql= "INSERT INTO utilisateur (email,mdp,nom,prenoms) VALUES ('".$_POST['email']."','".$_POST['mdp']."','".$_POST['nom']."','".$_POST['prenoms']."')";
		$result=mysqli_query($link,$sql);
		if ($result) {
			$msg='Insertion reussie';
		}else{
			$msg=mysqli_error($link);
		}
	}

	if (isset($_GET['id'])){
	$update="SELECT * FROM utilisateur WHERE id=".$_GET['id'];
	$res=mysqli_query($link,$update);
		$dataU=mysqli_fetch_array($res);
	}

	if (isset($_GET['sup'])){
		$delete="DELETE FROM utilisateur WHERE id=".$_GET['sup'];
		$res=mysqli_query($link,$delete);
	}
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
      <!-- liens bootstrap | fonts (polices) | feuilles de styles css -->
         <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
         <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
         <link rel="stylesheet" type="text/css" href="css/style-menu-resto.css">

         <link rel="stylesheet" href="css/footer-dist.css">
      <!-- definit le titre de la page -->
         <title> O'Resto | Venez découvrir les meilleurs restaurants près de chez vous </title>  
      <!-- logo dans la barre de titre de la page -->
         <link rel="shortcut icon" href="img/icon-oresto.ico" type="img/ico">

         <style>

         .container-signup{
      		padding-top: 25px;
      	}

      	.sign{
      		height: 480px;
      		width: 300px;
      		border: 1px solid #D3D3D3;
      		padding: 20px 40px!important;
      		background-color: #4682B4;
      	}

      	.signupform{
      		display: block;
      		align-items: center;
      	}
     
     		.signupform >legend{
      		font-size: 40px;
      		font-weight: bold;
      		color: #ffffff;
      		text-align: center;;
      	}
         </style>
      </head>       

      <body>  
      		<!--  Entête de la page -->
      <header id="banner-menu">
         <!--  Insertion du menu   -->
            <?php include('bar_menu-resto.php'); ?>
      </header>

			<div class="container-signup">

				<div class="row">
					<div class="col-md-4"> </div>
					<div class="col-md-4 sign">

						<form action="" class="signupform" method="POST" role="form">
							<legend>Inscription</legend>
						
							<div class="form-group">
								<label for="">Email*</label>
								<input name="email" type="email" class="form-control" id="" placeholder="aichagyeo@gmail.com" required>
							</div>

							<div class="form-group">
								<label for="">Mot de passe*</label>
								<input name="mdp" type="password" class="form-control" id="" placeholder="Entrer un mot de passe" required>
							</div> 

							<div class="form-group">
								<label for="">Nom</label>
								<input name="nom" type="text" class="form-control" id="" placeholder="Entrer votre nom">
							</div>

							<div class="form-group">
								<label for="">Prenoms</label>
								<input name="prenoms" type="text" class="form-control" id="" placeholder="Entrer votre prenom">
							</div>

							<button name="btnValider" type="submit" class="btn btn-primary btn-lg btn-block"> Valider
							</button>	
						</form>
					</div>
					<div class="col-md-2"></div>
				</div>
			</div>

	<!--  Insertion du footer   -->
            <?php include('footer.php'); ?>


	</body>

</HTML>