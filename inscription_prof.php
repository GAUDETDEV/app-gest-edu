<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/bootstrap-icons.css">
	<title>inscription prof</title>
</head>
<body>
		<?php

			include('connect_bdd.php');

		?>

	<div style=" background-color: #000033; margin-top: 200px; padding-left: 20px; padding-right: 20px; margin-left: 30px; margin-right: 30px; border-radius: 10px; z-index: 1000;">

		<h2 class="text-center" style="color: #0099cc;"> Formulaire d'inscription </h2>
			
		<form method = "POST" action = "#">
			<table class="container ">
				<tr class="row py-3" >
					<td class="col-lg-4 col-md-4 col-sm-12"><input class="form-control" type="text" name="nom" placeholder="votre nom"></td>
					<td class="col-lg-4 col-md-4 col-sm-12"><input class="form-control" type="text" name="prenoms" placeholder="votre prenom"></td>
					<td class="col-lg-4 col-md-4 col-sm-12"><input class="form-control" type="text" name="genre" placeholder="Homme ou Femme?"></td>
				</tr>
				<tr class="row py-3">
					<td class="col-lg-4 col-md-4 col-sm-12"><input class="form-control" type="email" name="email" placeholder="Adresse mail"></td>
					<td class="col-lg-4 col-md-4 col-sm-12"><input class="form-control" type="text" name="contact" placeholder="Contact ex: 0103286759"></td>
					<td class="col-lg-4 col-md-4 col-sm-12"><input class="form-control" type="password" name="password" placeholder="Mot de passe"></td>
				</tr>
				<tr class="row py-3">
					<td class="col-lg-4 col-md-4 col-sm-12"><input class="form-control" type="password" name="confirm_password" placeholder="Confirmez le mot de passe"></td>
					<td class="col-lg-4 col-md-4 col-sm-12"><input style="width: 100%;" class ="btn btn-primary" type="submit" name="submit" value="S'inscrire"></td>
					<td class="col-lg-4 col-md-4 col-sm-12"><input style="width: 100%;" class= "btn btn-warning" type="reset" name="reset" value="Annuler"></td>
				</tr>
				<tr>
					<td class="text-center py-3" style="color: yellow;">

						<?php

							if(isset($_POST['submit'])){

								$nom = htmlspecialchars($_POST['nom']);
								$prenoms = htmlspecialchars($_POST['prenoms']);
								$genre = htmlspecialchars($_POST['genre']);
								$email = htmlspecialchars($_POST['email']);
								$contact = htmlspecialchars($_POST['contact']);
								$password = sha1($_POST['password']);
								$confirm_password = sha1($_POST['confirm_password']);

								if($nom&&$prenoms&&$genre&&$email&&$contact&&$password&&$confirm_password){

									$genre_h = "homme";
									$genre_f = "femme";

									if($genre == $genre_h OR $genre == $genre_f){

										$taille_contact = 10;

										if(strlen($contact) == $taille_contact){

											if($password == $confirm_password){

												$long_password = 6;

												if(strlen($password) >= $long_password){

													$req_select = "SELECT * FROM profs WHERE email = :email AND contact = :contact";

													$req = $bdd -> prepare($req_select);

													$req -> execute([

														"email" => "$email",
														"contact" => "$contact",

													]);

													if($req -> rowCount() == 0){

														$req_insert = "INSERT INTO profs(nom, prenoms, genre, email, contact, password)
														VALUES(:nom, :prenoms, :genre, :email, :contact, :password)";

														$req = $bdd -> prepare($req_insert);

														$req -> execute([

															"nom" => "$nom",
															"prenoms" => "$prenoms",
															"genre" => "$genre",
															"email" => "$email",
															"contact" => "$contact",
															"password" => "$password"

														]);

														echo "Félicitation! inscription réussit! Vous pouvez à présent vous connecter en cliquant <a href='connect_prof.php'>ici</a>";

													}else{

														echo "Désoler cette adresse mail est déjà utilisée! cliquez <a href='connect_prof.php'>ici</a> pour vous connectez.";

													}


												}else{

													echo "Le mot de passe doit contenir au moins six (6) caractères!";

												}


											}else{

												echo "Les mots de passe doivent être conformes!";

											}


										}else{

											echo "Désoler le contact doit comporter 10 chiffres.";

										}


									}else{

										echo 'Veulliez spécifier soit "homme" ou "femme" au niveau du genre svp!';

									}


								}else{

									echo "Veulliez renseigner tous les champs svp!";

								}

							}


						?>
							
					</td>
				</tr>

			</table>
		</form>

	</div>


	<script type="text/javascript" src="js/popper.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>

</body>
</html>