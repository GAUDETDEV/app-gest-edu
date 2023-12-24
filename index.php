<?php
	
	session_start();

?>

<!DOCTYPE html>
<html>
	<head>

		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
<!--fichiers css du compteur-->
		<link rel="stylesheet" href="style.css">
		<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css">
		
<!--fichiers js du compteur-->
		<script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script type="text/javascript" src="compteur.js"></script>

<!--les fichiers standard-->
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="css/bootstrap-icons.css">
		<script type="text/javascript" src="js/all.min.js"></script>
		<title>Accueil prof</title>

	</head>
	<body>

		<?php
		
			include('connect_bdd.php');

			include("menu_prof.php");

		?>

		<h2 class="container text-center"> 

			<?php

				 if(isset($_SESSION['email'])){

				 	$email = $_SESSION['email'];

				 	$req_select = "SELECT nom,genre FROM profs WHERE email = :email";

				 	$req = $bdd -> prepare($req_select);

				 	$req -> execute([

				 		"email" => "$email",
				 	]);

				 	$result = $req -> fetch();

				 	$genre = $result['genre'];

				 	$genre_h = "homme";
				 	$genre_f = "femme";

				 	if($genre == $genre_h ){

				 		echo "Bienvenue Mr ".ucfirst($result['nom'])." sur votre espace de gestion!";

				 	}else if($genre == $genre_f){

				 		echo "Bienvenue Mme ".ucfirst($result['nom'])." sur votre espace de gestion!";

				 	}


				 }

			?>
			
		</h2>

		<section class="shadow-lg p-2 bg-body rounded">

			<?php

				include("compteur.php");

			?>

		</section>

		<footer>

			<?php

				include("footer_prof.php");

			?>

		<script type="text/javascript" src="js/popper.min.js"></script>
		<script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>
		<script type="text/javascript" src="js/bootstrap.min.js"></script>

		</footer>

	</body>
</html>