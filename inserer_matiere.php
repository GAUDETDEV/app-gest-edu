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
	<title>Matiere eleves</title>
	<!--
	<script src="https://kit.fontawesome.com/a510c54c07.js" crossorigin="anonymous"></script> 
	-->



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

	<section class="container-fluid mt-5 ">

		<div class="row">

			<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 py-5 h-50" style="background-color: #000033;">

				<form method="POST" action="">

					<table class="container">
						<tr class="row">
							<td class="col w-100">
								<select name="libelle" class="form-select mt-2">

									<option value="Francais">Francais</option>
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
							<td class="col w-100"><input class="form-control mt-2" type="number" name="coefficient" placeholder="Coefficient"></td>
						</tr>
						<tr class="row">
							<td class="col w-100 text-center" style="color: #ffcc00;">
								<?php

									if(isset($_POST['submit'])){

										$libelle = $_POST['libelle'];
										$coefficient = $_POST['coefficient'];

										if($libelle && $coefficient){

											$long_coef = 1;

											if(strlen($coefficient) == $long_coef){

												$req_select = "SELECT * FROM matieres WHERE libelle = :libelle AND coefficient = :coefficient";

												$req = $bdd -> prepare($req_select);

												$req -> execute([

													"libelle" => "$libelle",
													"coefficient" => "$coefficient"

												]);

												if($req -> rowCount() == 0){


													$req_insert = "INSERT INTO matieres(libelle, coefficient) VALUES(:libelle, :coefficient)";

													$req = $bdd -> prepare($req_insert);

													$req -> execute([

														"libelle"=>"$libelle",
														"coefficient"=>"$coefficient"

													]);

													echo "Félicitation! la matiere est ajoutée avec succès!";


												}else{

													echo "Désoler! Cette matière exite déjà dans la liste des matières!";

												}



											}else{

												echo "Désoler le céofficient doit être un chiffre!";

											}	


										}else{

											echo "Veulliez renseigner tous les champs svp!";

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

<!--systeme de suppression des matieres-->

					<?php


						if(isset($_GET['action']) AND isset($_GET['id'])){

							$id = $_GET['id'];

							if($_GET['action'] == 'supprimer'){

								?>

									<h3 style="color: red;">Êtes vous sûre de supprimer cette matière? </h3>
									<button class ="btn btn-warning"><a style="text-decoration :none; color: white;" href="?action=confirm_supprimer&amp;id=<?php echo $id; ?>"><i class="fa-solid fa-check fa-shake"></i></a></button> 
									<button class ="btn btn-primary"><a style="text-decoration :none; color: white;" href="?action=annul_supprimer"><i class="fa-solid fa-xmark fa-beat"></i></a></button><br><br>

								<?php

								
							}else if($_GET['action'] == 'confirm_supprimer'){

									$req_delete = "DELETE FROM matieres WHERE id = :id";

									$req = $bdd -> prepare($req_delete);

									$req -> execute([

										"id" => "$id",

									]);

									echo "Suppression réussit!<br><br>";


							}else if($_GET['action'] == 'annul_supprimer'){

								header("Location: matiere_eleve.php");

							}


						}


					?>
					

				<table class="table text-center">

					<thead class="table-light">

						<tr>
							
							<th>Libelle</th>
							<th>Coéfficients</th>
							<th>Actions</th>
							
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
									<td><strong>".$result_final['coefficient']."</strong></td>
									<td>
										<button class='btn btn-success'><a style='text-decoration :none; color: white;' href='modifier_matiere.php?id=$result_final[0]'><span class='icon'><i class='fa-solid fa-pen-to-square'></i></span></a></button>
										<button class='btn btn-danger'><a style='text-decoration :none; color: white;'  href='?action=supprimer&amp;id=$result_final[0]'><span class='icon'><i class='fa-solid fa-trash'></i></span></a></button>
									</td>
											
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