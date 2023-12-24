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
		<title>modifier eleve</title>
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


		<section class="container-fluid mt-5">

			<div class="row">

				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 py-5 h-50" style="background-color: #000033;">

					<form method="POST" action="">

						<?php

							if(isset($_GET['id'])){

								$id = $_GET['id'];

								$req_select = "SELECT * FROM eleves WHERE id = :id";

								$req = $bdd -> prepare($req_select);

								$req -> execute([

									"id" => "$id",

								]);

								$result = $req -> fetchAll();

							}

						?>

						<table class="container">
							<tr class="row">
								<td class="col w-100"><input class="form-control mt-2" type="text" name="nom" value="<?php foreach($result as $result_final){echo $result_final[1]; }?>"></td>
							</tr>
							<tr class="row">
								<td class="col w-100"><input class="form-control mt-2" type="text" name="prenoms" value="<?php foreach($result as $result_final){echo $result_final[2]; }?>"></td>
							</tr>
							<tr class="row">
								<td class="col w-100"><input class="form-control mt-2" type="number" name="annee" value="<?php foreach($result as $result_final){echo $result_final[3]; }?>"></td>
							</tr>
							<tr class="row">
								<td class="col w-100"><input class="form-control mt-2" type="text" name="code_eleve" value="<?php foreach($result as $result_final){echo $result_final[4]; }?>"></td>
							</tr>
							<tr class="row">
								<td class="col w-100"><input class="form-control mt-2" type="text" name="genre" value="<?php foreach($result as $result_final){echo $result_final[5]; }?>"></td>
							</tr>
							<tr class="row">
								<td class="col w-100 text-center" style="color: #ffcc00;">

<!--systeme de modification des informations des eleves-->

									<?php

										if(isset($_POST['submit']) AND isset($_GET['id'])){

											$nom = htmlspecialchars($_POST['nom']);
											$prenoms = htmlspecialchars($_POST['prenoms']);
											$annee = htmlspecialchars($_POST['annee']);
											$code_eleve = htmlspecialchars(strtoupper($_POST['code_eleve']));
											$genre = htmlspecialchars($_POST['genre']);
											$id = $_GET['id'];


											if($nom&&$prenoms&&$annee&&$code_eleve&&$genre){

												$long_annee = 4;

												if(strlen($annee) == $long_annee){

													$long_code_eleve = 6;

													if(strlen($code_eleve) <= $long_code_eleve){

														$genre_g = "garcon";
														$genre_f = "fille";

														if($genre == $genre_g OR $genre == $genre_f){


															$req_update = "UPDATE eleves SET nom = :nom, prenoms = :prenoms, annee = :annee, code_eleve = :code_eleve, genre = :genre WHERE id = :id" ;

															$req = $bdd -> prepare($req_update);

															$req -> execute([
																"id" => "$id",
																"nom" => "$nom",
																"prenoms" => "$prenoms",
																"annee" => "$annee",
																"code_eleve" => "$code_eleve",
																"genre" => "$genre",

															]);

															echo "La modification c'est effectuée avec succès!";


														}else{

															echo "Désoler! ecrivez garcon ou fille au niveau du genre.";

														}


													}else{

														echo "Désoler le format du code n'est pas correcte!";

													}


												}else{

													echo "Désoler! le format de l'année n'est pas correct.";

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

<!-- tableau d'affichage des eleves-->

					<table class="table text-center">

						<thead class="table-light">

							<tr>
							
								<th>Nom</th>
								<th>Prenoms</th>
								<th>Années scolaire</th>
								<th>codes</th>
								<th>Genre</th>
							
							</tr>

						<thead>
						<tbody>


							<?php

								$req_select = "SELECT * FROM eleves";

								$req = $bdd -> prepare($req_select);

								$req -> execute();

								$result = $req -> fetchAll();

								foreach($result as $result_final){

									echo "<tr>
											<td>".$result_final['nom']."</td>
											<td>".$result_final['prenoms']."</td>
											<td>".$result_final['annee']."</td>
											<td>".$result_final['code_eleve']."</td>
											<td>".$result_final['genre']."</td>
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