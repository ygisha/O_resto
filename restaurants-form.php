<!-- Code -->
<?php include('connection.php');
	$msg="";
	if (isset($_POST['btnValider'])){
		/*echo '<pre>';
		print_r ($_FILES['image']);die();*/
		if (move_uploaded_file($_FILES['image']['tmp_name'], 'upload/'.$_FILES['image']['name'])) {
			if (isset($_GET['id'])){
				$sql="UPDATE restaurants SET titre='".mysqli_real_escape_string($link,$_POST['titre'])."',
				description='".mysqli_real_escape_string($link,$_POST['description'])."',
				image='".$_FILES['image']['name']."',
				telephone='".$_POST['telephone']."',
				adresse='".mysqli_real_escape_string($link,$_POST['adresse'])."',
				id_categories='".$_POST['categories']."',
				id_commune='".$_POST['communes']."' 
				WHERE id=".$_GET['id'];
			}else{
				$sql= "INSERT INTO restaurants
			 (titre,description,image,id_categories,id_commune)
			 VALUES ('".mysqli_real_escape_string($link,$_POST['titre'])."',
			 	'".mysqli_real_escape_string($link,$_POST['description'])."',
			 	'".$_FILES['image']['name']."',
			 	'".$_POST['telephone']."',
				'".mysqli_real_escape_string($link,$_POST['adresse'])."',
			 	'".$_POST['categories']."',
			 	'".$_POST['communes']."')";
			}                          	  
			 		 
			$result=mysqli_query($link,$sql);
			if ($result) {
				$msg='Insertion reussie';
			}else{
				$msg=mysqli_error($link);
			}
		}

	}
     if (isset($_GET['id'])){
		$update="SELECT * FROM restaurants WHERE id=".$_GET['id'];
		$res=mysqli_query($link,$update);
		$dataU=mysqli_fetch_array($res);
	}

	if (isset($_GET['sup'])){
		$delete="DELETE FROM restaurants WHERE id=".$_GET['sup'];
		$res=mysqli_query($link,$delete);
		$msg='element supprime' ;
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

		<div class="container">

			<div class="row">
				<div class="col-md-2"></div>
				<div class="col-md-8">
           <div class="well">
					<form action="" method="POST" role="form" enctype="multipart/form-data">
						<h1>Formulaire Des Restaurants </h1>
						<span> <?php echo $msg; ?> </span>
					
						<div class="form-group">
							<label for="">Titre</label>
							<input name="titre" type="text" class="form-control" id="" placeholder="Entrer le titre" value="<?php if (isset($_GET['id'])) echo $dataU['titre']; ?>">
						</div>

						<div class="form-group">
							<label for="">Description</label>
							<textarea name="description" rows="6" class="form-control" placeholder="Entrer la description" value="<?php if ( isset($_GET['id'])) echo $dataU['description']; ?>"></textarea>
						</div>
					
						<div class="form-group">
							<label for="">image</label>
							<input name="image" type="file" class="form-control" id="" placeholder="image">
						</div>	

						<div class="form-group">
							<label for="">telephone</label>
							<input name="telephone" type="text" class="form-control" id="" placeholder="Entrer le telephone" value="<?php if (isset($_GET['id'])) echo $dataU['telephone']; ?>">
						</div>

						<div class="form-group">
							<label for="">adresse</label>
							<input name="adresse" type="text" class="form-control" id="" placeholder="Entrer votre adresse" value="<?php if (isset($_GET['id'])) echo $dataU['adresse']; ?>">
						</div>

						<div class="form-group">
							<label for="">categories</label>
							
							<select name="categories" class="form-control">
						</div>

							
					<?php
					//recupere toutes les categories dans la bd
					$sqlcategorie="SELECT * FROM categories";
					//execute la requete et on la stock dans $repcategorie
					$repcategorie=mysqli_query($link,$sqlcategorie);
					//mysqli_fetch_array = permet de tran sformer le resultat $repcategorie en variable de type tableau $datacat
					// la boucle while nous permet de parcourir le tableau $datacat et de recuperer les valeurs de chaques elements du tableau $datacat
					while ($datacat=mysqli_fetch_array($repcategorie)) {
						?>
						<option value="<?php echo $datacat['id'];?>">
						<?php echo $datacat['libelle'];?>
							
						</option>

						<?php
					}
					?>
								
							</select>
						
						</div>
						
						<div class="form-group">
							<label for="">communes</label>
							
							<select name="communes" class="form-control">
						</div>

							
					<?php
					//recupere toutes les categories dans la bd
					$sqlcommune="SELECT * FROM communes";
					//execute la requete et on la stock dans $repcategorie
					$repcommune=mysqli_query($link,$sqlcommune);
					//mysqli_fetch_array = permet de tran sformer le resultat $repcategorie en variable de type tableau $datacat
					// la boucle while nous permet de parcourir le tableau $datacat et de recuperer les valeurs de chaques elements du tableau $datacat
					while ($datacom=mysqli_fetch_array($repcommune)) {
						?>
						<option value="<?php echo $datacom['id'];?>">
						<?php echo $datacom['commune'];?>
							
						</option>

						<?php
					}
					?>
								
							</select>
						
						</div>
						<button name="btnValider" type="submit" class="btn btn-primary btn-lg btn-block">Valider</button>
					</form>
					</div>
				</div>
				<div class="col-md-2"></div>
			</div>
<br>
			<div class="row">
				<table class="table">
					<thead>
						<tr>
							<th>Numero</th>
							<th>Titre</th>
							<th>Description</th>
							<th>image</th>
							<th>telephone</th>
							<th>adresse</th>
							<th>Categories</th>
							<th>Communes</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php 
							$n=1;
							$list=" SELECT 
										titre,
										description,
										restaurants.image,
										telephone,
										adresse,
										restaurants.id,
										categories.libelle,
										communes.commune
									FROM restaurants
									INNER JOIN categories
								  ON categories.id = restaurants.id_categories
								  INNER JOIN communes
								  ON communes.id = restaurants.id_commune";
							$res= mysqli_query($link,$list);
	while ($data = mysqli_fetch_array($res)){
								
							
						 ?>	

						<tr>
							<td> <?php echo $n; ?> </td>
							<td><?php echo $data['titre']; ?></td>
							<td><?php echo $data['description']; ?></td>
						<td><img src="upload/<?php echo $data['image'];  ?>" width="30px" height="30px" alt=""></td>
							<td><?php echo $data['telephone']; ?></td>
							<td><?php echo $data['adresse']; ?></td>
							<td><?php echo $data['libelle']; ?></td>
							<td><?php echo $data['commune']; ?></td>
							
							<td>
								<a href="?id=<?php echo $data['id']; ?>"><button type="button" class="btn btn-primary">Modifier</button></a>

				                <a href="?sup=<?php echo $data['id']; ?>"><button type="button" class="btn btn-danger">Supprimer</button></a>
				            </td>
						</tr>
						<?php $n++;
						 } ?>
					</tbody>
				</table>

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



