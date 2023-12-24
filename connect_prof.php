<?php
	
	session_start();

?>

<!DOCTYPE html>

<html>

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="css/bootstrap-icons.css">
		<script type="text/javascript" src="js/all.min.js"></script>
		<title>connexion prof</title>
	</head>
	<body>
		
		<?php

			include('connect_bdd.php');

		?>

		<div>
			
			<form class="container bg-dark" method = "POST" action = "#" style="width: 500px; margin-top: 100px; padding-top: 50px; border-radius: 10px;">

				<div class="container text-center" >

					<a class="navbar-brand fw-blod"><span class="icon"><i class="fa-solid fa-graduation-cap fa-3x text-success"></i></span><span class="text-uppercase fw-bold fs-1 p-1 bg-primary rounded text-light">g</span><span class=" fw-bold fs-3 text-white">edu</span></a>			

				</div>

				<h2 class="text-center mt-4" style="color: #0040ff;"> Formulaire de connexion</h2>

				<table class="container">
					<tr class ="row ">
						<td class="col gy-4"><input class="form-control" type="mail" name="email" placeholder="Adresse mail"></td>
					</tr>
					<tr class ="row">
						<td class="col gy-4"><input class="form-control" type="password" name="password" placeholder="Mot de passe"></td>
					</tr>
					<tr class="row">
						<td class="col gy-4 text-center" style="color: #009999;">

							<?php

								if(isset($_POST['submit'])){

									$email = $_POST['email'];
									$password = sha1($_POST['password']);

									if($email&&$password){

										$req_select = "SELECT * FROM profs WHERE email = :email AND password = :password";

										$req = $bdd->prepare($req_select);

										$req -> execute([

											"email" => "$email",
											"password" => "$password"

										]);

										if($req -> rowCount() == 1){

											$_SESSION['email'] = $email;
											$_SESSION['password'] = $password;

											header('location: index.php');

										}else{

											echo "Désolé! Vous n'êtes pas autoriser à accéder à cette page";

											?>

												<a href='inscription_prof.php' target='_bank'>Créez un compte</a>

											<?php

										}


									}else{

										echo "Veulliez renseigner tous les champs svp!";

									}

								}


							?>
							
						</td>
					</tr>
					<tr class="row">
						<td class="col gy-4 mb-4"><input class="btn btn-success form-control" type="submit" name="submit" value="Connexion"></td>
					</tr>
				</table>
			</form>

		</div>

		<script type="text/javascript" src="js/popper.min.js"></script>
		<script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>
		<script type="text/javascript" src="js/bootstrap.min.js"></script>

	</body>

</html>
