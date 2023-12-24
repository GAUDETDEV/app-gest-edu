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
	<title>modifier notes</title>
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

							$req_select = "SELECT * FROM notes WHERE id = :id";

							$req = $bdd -> prepare($req_select);

							$req -> execute([

								"id" => "$id",

							]);

							$result = $req -> fetchAll();

						}

					?>
					<table class="container">
						<tr class="row">
							<td class="col w-100"><input class="form-control mt-2" type="text" name="valeur" value="<?php foreach($result as $result_final){echo $result_final[1]; }?>"></td>
						</tr>
						<tr class="row">
							<td class="col w-100">
								<select name="libelle" class="form-select mt-2">

									<option value="<?php foreach($result as $result_final){echo $result_final[2]; }?>"><?php foreach($result as $result_final){echo $result_final[2]; }?></option>
									<option value="Anglais">Anglais</option>
									<option value="Histoire-Geographie">Histoire-Geographie</option>
									<option value="EDHC">EDHC</option>
									<option value="SVT">SVT</option>
									<option value="Mathematiques">Mathematiques</option>
									<option value="Sciences-Physiques">Sciences-Physiques</option>
									<option value="Philosophie">Philosophie</option>
									<option value="Allemand">Allemand</option>
									<option value="Espagnol">Espagnol</option>

								</select>
							</td>
						</tr>
						<tr class="row">
							<td class="col w-100"><input class="form-control mt-2" type="text" name="code_eleve" value="<?php foreach($result as $result_final){echo $result_final[3]; }?>"></td>
						</tr>
						<tr class="row">
							<td class="col w-100 text-center" style="color: #ffcc00;">

<!--systeme de modification des notes-->

									<?php

										if(isset($_POST['submit']) AND isset($_GET['id'])){

											$valeur = htmlspecialchars($_POST['valeur']);
											$libelle = htmlspecialchars($_POST['libelle']);
											$code_eleve = htmlspecialchars($_POST['code_eleve']);
											$id = $_GET['id'];


											if($valeur&&$libelle&&$code_eleve){

												$req_update = "UPDATE notes SET valeur = :valeur, libelle = :libelle, code_eleve = :code_eleve WHERE id = :id" ;

												$req = $bdd -> prepare($req_update);

												$req -> execute([

													"id" => "$id",
													"valeur" => "$valeur",
													"libelle" => "$libelle",
													"code_eleve" => "$code_eleve"

												]);

													echo "La modification c'est effectuée avec succès!";


											}else{

												echo "Veulliez renseigner tous les champs!";

											}


										}


									?>
							</td>
						</tr>
						<tr class="row">
							<td class="col w-100"><input class="btn btn-success form-control mt-4" type="submit" name="submit" value="Enregistrer"><input class="btn btn-primary form-control mt-1" type="reset" name="reset" value="Annuler"></td>
						</tr>
					</table>

				</form>

			</div>

			<div class="col-xl-8 col-lg-8 col-md-8 col-sm-12" style="background-color: #e6e6e6; border-radius: 5px;">

				<table class="table text-center">

					<thead class="table-light">

						<tr>
							
							<th>Valeur</th>
							<th>Libelle</th>
							<th>codes</th>
							
						</tr>

					<thead>
					<tbody>

<!--systeme d'affichage des notes -->

						<?php


							$req_select = "SELECT * FROM notes";

							$req = $bdd -> prepare($req_select);

							$req -> execute();

							$result = $req -> fetchAll();


							foreach($result as $result_final){

								echo "<tr>

										<td>".$result_final['valeur']."</td>
										<td>".$result_final['libelle']."</td>
										<td>".$result_final['code_eleve']."</td>

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