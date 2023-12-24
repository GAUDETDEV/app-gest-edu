
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
		<title>modifier matières</title>
	</head>

	<body>

		<?php

			include('connect_bdd.php');

		?>

		<nav>

			<?php

				include("menu_prof.php");

			?>

		</nav>

		<br><br><br>
		<br><br><br>


		<section class="container-fluid">

			<div class="row">

				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 py-5 h-50" style="background-color: #000033;">

					<form method="POST" action="">

						<?php

							if(isset($_GET['id'])){

								$id = $_GET['id'];

								$req_select = "SELECT * FROM matieres WHERE id = :id";

								$req = $bdd -> prepare($req_select);

								$req -> execute([

									"id" => "$id",

								]);

								$result = $req -> fetchAll();

							}

						?>

						<table class="container">
							<tr class="row">
								<td class="col w-100"><input class="form-control mt-2" type="text" name="libelle" value="<?php foreach($result as $result_final){echo $result_final[1]; }?>"></td>
							</tr>
							<tr class="row">
								<td class="col w-100"><input class="form-control mt-2" type="number" name="coefficient" value="<?php foreach($result as $result_final){echo $result_final[2]; }?>"></td>
							</tr>
							<tr class="row">
								<td class="col w-100 text-center" style="color: #ffcc00;">

<!--systeme de modification des informations des eleves-->

									<?php

										if(isset($_POST['submit']) AND isset($_GET['id'])){

											$libelle = htmlspecialchars($_POST['libelle']);
											$coefficient = htmlspecialchars($_POST['coefficient']);
											$id = $_GET['id'];


											if($libelle&&$coefficient){

												$long_coef = 1;

												if(strlen($coefficient) == $long_coef){


													$req_update = "UPDATE matieres SET libelle = :libelle, coefficient = :coefficient WHERE id = :id" ;

													$req = $bdd -> prepare($req_update);

													$req -> execute([
														"id" => "$id",
														"libelle" => "$libelle",
														"coefficient" => "$coefficient",

													]);

													echo "La modification c'est effectuée avec succès!";


												}else{

													echo "Désoler le céofficient doit être un chiffre!";

												}



											}else{

												echo "Veulliez renseigner tous les champs!";

											}


										}



									?>
								</td>
							</tr>
							<tr class="row">
								<td class="col w-100"><input class="btn btn-success form-control mt-4" type="submit" name="submit" value="Modifier"><input class="btn btn-primary form-control mt-1" type="reset" name="reset" value="Annuler"></td>
							</tr>
						</table>

					</form>

				</div>

				<div class="col-xl-8 col-lg-8 col-md-8 col-sm-12" style="background-color: #e6e6e6; border-radius: 5px;">

<!--systeme de suppression d'eleves-->

					<?php


						if(isset($_GET['action']) AND isset($_GET['id'])){

							$id = $_GET['id'];

							if($_GET['action'] == 'supprimer'){

								?>

									<h3>Êtes vous sûre de supprimer cette matière? </h3>
									<button class ="btn btn-warning"><a href="?action=confirm_supprimer&amp;id=<?php echo $id; ?>"> Oui </a></button> 
									<button class ="btn btn-warning"><a href="inserer_matiere.php?action=annul_supprimer"> Non </a></button><br><br>

								<?php

								
							}else if($_GET['action'] == 'confirm_supprimer'){

									$req_delete = "DELETE FROM matieres WHERE id = :id";

									$req = $bdd -> prepare($req_delete);

									$req -> execute([

										"id" => "$id",

									]);

									echo "Suppression réussit!<br><br>";


							}else if($_GET['action'] == 'annul_supprimer'){

								header("Location: inserer_matiere.php");

							}


						}


					?>

<!-- tableau d'affichage des eleves-->

					<table class="table text-center">

						<thead class="table-light">

							<tr>
							
								<th>Libelle</th>
								<th>Coéfficients</th>
							
							</tr>

						<thead>
						<tbody>


							<?php

								$req_select = "SELECT * FROM matieres";

								$req = $bdd -> prepare($req_select);

								$req -> execute();

								$result = $req -> fetchAll();

								foreach($result as $result_final){

									echo "<tr>

											<td>".$result_final['libelle']."</td>
											<td>".$result_final['coefficient']."</td>

										</tr>";

								}


							?>

						</tbody>

					</table>

				</div>

			</div>

		</section>


		<footer>

			<?php

				include("footer_prof.php");

			?>

		</footer>

		<script type="text/javascript" src="js/popper.min.js"></script>
		<script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>
		<script type="text/javascript" src="js/bootstrap.min.js"></script>

	</body>

</html>