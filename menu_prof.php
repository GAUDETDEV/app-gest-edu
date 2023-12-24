<nav class="navbar navbar-expand-sm navbar-light bg-dark fixed-top">

	<a class="navbar-brand fw-blod" href="index.php"><span class="icon"><i class="fa-solid fa-graduation-cap fa-3x text-success"></i></span><span class="text-uppercase fw-bold fs-1 p-1 bg-primary rounded offset-1 text-light">g</span><span class=" fw-bold fs-3 text-white">edu</span></a>

	<button class="navbar-toggler bg-primary" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>

	<div class="collapse navbar-collapse justify-content-end" id="navbarNav">
		<ul class="navbar-nav text-white">
			<li class="nav-item active"><a class="nav-link fs-5 text-white" href="index.php" target = "_bank">Accueil</a></li>
			<li class="nav-item "><a class="nav-link fs-5 text-white" href="inserer_eleve.php" target = "_bank">Elèves</a></li>
			<li class="nav-item "><a class="nav-link fs-5 text-white" href="inserer_matiere.php" target = "_bank">Matières</a></li>
			<li class="nav-item "><a class="nav-link fs-5 text-white" href="inserer_note.php" target = "_bank">Notes</a></li>
			<li class="nav-item "><a class="nav-link fs-5 text-white" href="moyenne_eleve.php" target = "_bank">Moyennes</a></li>
			<li class="nav-item "><a class="nav-link fs-5 text-white">Résultats</a></li>
			<li class="nav-item "><a class="nav-link btn btn-success text-white fw-bold fs-5" href="deconnect_prof.php">Déconnexion<span class="icon"><i class="fa-solid fa-arrow-right-from-bracket fa-1x"></i></span></a></li>
		</ul>
	</div>

	<?php

		if(!isset($_SESSION['password'])){

			header("location: connect_prof.php");

		}

	?>

</nav>
