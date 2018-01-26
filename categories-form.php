<?php include('connection.php');
	$msg="";
	if (isset($_POST['btnValider'])){

		if (move_uploaded_file($_FILES['image']['tmp_name'], 'upload/'.$_FILES['image']['name'])) {

			$sql= "INSERT INTO categories (libelle,image) 
			VALUES ('".mysqli_real_escape_string($link,$_POST['libelle'])."',
				 	'".$_FILES['image']['name']."')";
			$result=mysqli_query($link	,$sql);

			
			if ($result) {
				$msg='Insertion reussie';
			}else{
				$msg=mysqli_error($link);
			}
		}


	}
	if (isset($_GET['id'])){
		$update="SELECT * FROM categories WHERE id=".$_GET['id'];
		$res=mysqli_query($link,$update);
		$dataU=mysqli_fetch_array($res);
	}

	if (isset($_GET['sup'])){
		$delete="DELETE FROM categories WHERE id=".$_GET['sup'];
		$res=mysqli_query($link,$delete);
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
		<?php include('bar_menu-resto.php');
      ?>
      
			<div class="container">
           <div class="well">
			<div class="row">
				<div class="col-md-2"></div>
				<div class="col-md-8">

					<form action="" method="POST" role="form"  enctype="multipart/form-data">
						<h1>Formulaire Des Categories</h1>
						<span> <?php echo $msg; ?> </span>
					
						<div class="form-group">
							<label for="">Libelle</label>
							<input name="libelle" type="text" class="form-control" id="" placeholder="Entrer le libelle" value="<?php if (isset($_GET['id'])) echo $dataU['libelle']; ?>">
						</div>
						<div class="form-group">
							<label for="">image</label>
							<input name="image" type="file" class="form-control" id="" placeholder="image">
						</div>

						<button name="btnValider" type="submit" class="btn btn-primary btn-lg btn-block">Valider</button>
					</form>
				</div>
				<div class="col-md-2"></div>
			</div>
			</div>
<br>
			<div class="row">
				<table class="table">
					<thead>
						<tr>
							<th>Numero</th>
							<th>Libelle</th>
							<th>Image</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php 
							$n=1;
							$list=" SELECT * FROM categories";
							$res= mysqli_query($link,$list);
	while ($data = mysqli_fetch_array($res)){
								
							
						 ?>
						<tr>
							<td> <?php echo $n; ?> </td>
							<td><?php echo $data['libelle']; ?></td>
							<td><img src="upload/<?php echo $data['image']; ?>"  width="30px" height="30px" alt=""> </td>
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