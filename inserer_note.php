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
	<title>Notes eleves</title>
</head>

<body>

	<?php

		include('connect_bdd.php');

	?>


	<?php

		include("menu_prof.php");

	?>
    <br><br><br>

	<section class="container-fluid mt-5">

		<div class="row">

			<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 py-5 h-50" style="background-color: #000033;">

				<form method="POST" action="" style="background-color: #000033;">
					<table class="container">
						<tr class="row">
							<td class="col w-100"><input class="form-control mt-2" type="text" name="valeur" placeholder="Valeur de la note"></td>
						</tr>
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
							<td class="col w-100"><input class="form-control mt-2" type="text" name="code_eleve" placeholder="Code de l'eleve ex: ELV1"></td>
						</tr>
						<tr class="row">
							<td class="col w-100 text-center" style="color: #ffcc00;">

<!-- systeme d'insertion des notes -->

								<?php

									if(isset($_POST['submit'])){

										$valeur = htmlspecialchars($_POST['valeur']);
										$libelle = htmlspecialchars($_POST['libelle']);
										$code_eleve = htmlspecialchars($_POST['code_eleve']);

										if($valeur&&$libelle&&$code_eleve){

											$req_select = "SELECT * FROM eleves WHERE code_eleve = :code_eleve";

											$req = $bdd -> prepare($req_select);

											$req -> execute([

												"code_eleve" => "$code_eleve",

											]);

											if($req -> rowCount() == 1){

												$req_insert = "INSERT INTO notes(valeur, libelle, code_eleve) VALUES(:valeur, :libelle, :code_eleve)";

												$req = $bdd -> prepare($req_insert);

												$req -> execute([

													"valeur" => "$valeur",
													"libelle" => "$libelle",
													"code_eleve" => "$code_eleve"

												]);

												echo "Félicitation la note a été attribuée avec succès!";

											}else{

												echo "Désoler! cet l'élève avec ce code : ".$code_eleve.", n'a pas été enregistré!";

											}


										}else{

											echo "Veulliez renseigner tous les champs svp!";

										}


									}
									

								?>
							</td>
						</tr>
						<tr class="row">
							<td class="col w-100"><input class="btn btn-success form-control mt-2" type="submit" name="submit" value="Enregistrer"><input class="btn btn-primary form-control mt-2" type="reset" name="reset" value="Annuler"></td>
						</tr>
					</table>

				</form>

			</div>

			<div class="col-xl-8 col-lg-8 col-md-8 col-sm-12" style="background-color: #e6e6e6; border-radius: 5px; padding-top: 20px;">

<!--systeme de suppression-->

					<?php


						if(isset($_GET['action']) AND isset($_GET['id'])){

							$id = $_GET['id'];

							if($_GET['action'] == 'supprimer'){

								?>

									<h3 style="color: red;">Êtes vous sûre de supprimer cette note? </h3>
									<button class ="btn btn-warning"><a style="text-decoration :none; color: white;" href="?action=confirm_supprimer&amp;id=<?php echo $id; ?>"> <i class="fa-solid fa-check fa-shake"></i> </a></button> 
									<button class ="btn btn-primary"><a style="text-decoration :none; color: white;" href="?action=annul_supprimer"> <i class="fa-solid fa-xmark fa-beat"></i> </a></button><br><br>

								<?php

								
							}else if($_GET['action'] == 'confirm_supprimer'){

									$req_delete = "DELETE FROM notes WHERE id = :id";

									$req = $bdd -> prepare($req_delete);

									$req -> execute([

										"id" => "$id",

									]);

									echo "Suppression réussit!<br><br>";


							}else if($_GET['action'] == 'annul_supprimer'){

								header("Location: inserer_note.php");

							}


						}


					?>

<!--systeme recherche -->

				<nav class="navbar navbar-light" style="background: #000033;">
					<div class="container-fluid">
		    			<form method="GET" action="#" class="d-flex" role="search">

		      				<input class="form-control me-2" type="search" name="recherche" placeholder="Entrez le code..."/>
		      				<input class="form-control me-2" type="search" name="note" placeholder="Entrez la note..."/>
		      				<input class="form-control me-2" type="search" name="matieres" placeholder="Entrez la matière..."/>
							<button class="btn btn-outline-primary" type="submit" name="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
							<button class="btn btn-outline-success" type="reset" name="reset"><i class="fa-solid fa-rotate-left"></i></button>
		      				
		    			</form>
	  				</div>
  				</nav>	


				<table class="table text-center">

					<thead class="table-light">

						<tr>
							
							<th>Valeur</th>
							<th>Libelle</th>
							<th>codes</th>
							<th>Actions</th>
							
						</tr>

					<thead>
					<tbody>

						<?php

//Systeme d'affichage de la liste des eleves recherchés par code eleves

								if(isset($_GET['submit']) AND !empty($_GET['recherche']) AND empty($_GET['note']) AND empty($_GET['matieres'])){

									if(isset($_GET['recherche'])){

										$code_eleve = $_GET['recherche'];

										$req_select = "SELECT * FROM notes WHERE code_eleve = :code_eleve";

										$req = $bdd -> prepare($req_select);

										$req -> execute([

													"code_eleve" => "$code_eleve",

												]);

										$req -> fetchAll();

										if(!empty($req -> rowCount())){

												$req_select = "SELECT * FROM notes WHERE code_eleve = :code_eleve";

												$req = $bdd -> prepare($req_select);

												$req -> execute([

													"code_eleve" => "$code_eleve",

												]);

												$result = $req -> fetchAll();

												$nbr_result = $req -> rowCount();

												foreach($result as $result_final){

													echo "<tr>
														<td>".strtoupper($result_final['valeur'])."</td>
														<td>".$result_final['libelle']."</td>
														<td>".$result_final['code_eleve']."</td>
														<td>
															<button class='btn btn-success'><a style='text-decoration :none; color: white;' href='modifier_eleve.php?id=$result_final[0]'><span class='icon'><i class='fa-solid fa-pen-to-square'></i></span></a></button>
															<button class='btn btn-danger'><a style='text-decoration :none; color: white;'  href='?action=supprimer&amp;id=$result_final[0]'><span class='icon'><i class='fa-solid fa-trash'></i></span></a></button>
														</td>
											
													</tr>";


												}


													echo $nbr_result." : résultat(s) trouvé(s)!";


										}else{

											echo "<h3 style='text-align: center;'>Aucune note(s) trouvée(s) pour l'élève avec le code : ".$code_eleve."</h3>";

										}


									}


								}else if(isset($_GET['submit']) AND empty($_GET['recherche']) AND empty($_GET['note']) AND !empty($_GET['matieres'])){

//Systeme d'affichage de la liste des notes recherchés par matieres

									$libelle = $_GET['matieres'];

									$req_select = "SELECT * FROM notes WHERE libelle = :libelle";

									$req = $bdd -> prepare($req_select);

									$req -> execute([

										"libelle" => "$libelle",

									]);

									$req -> fetchAll();

									if(!empty($req -> rowCount())){

										$libelle = $_GET['matieres'];

										$req_select = "SELECT * FROM notes WHERE libelle = :libelle";

										$req = $bdd -> prepare($req_select);

										$req -> execute([

											"libelle" => "$libelle",

										]);


										$result = $req -> fetchAll();

										$nbr_result = $req -> rowCount();

										foreach($result as $result_final){

											echo "<tr>
													<td>".strtoupper($result_final['valeur'])."</td>
													<td>".$result_final['libelle']."</td>
													<td>".$result_final['code_eleve']."</td>
													<td>
														<button class='btn btn-success'><a style='text-decoration :none; color: white;' href='modifier_eleve.php?id=$result_final[0]'><span class='icon'><i class='fa-solid fa-pen-to-square'></i></span></a></button>
														<button class='btn btn-danger'><a style='text-decoration :none; color: white;'  href='?action=supprimer&amp;id=$result_final[0]'><span class='icon'><i class='fa-solid fa-trash'></i></span></a></button>
													</td>
											
												</tr>";


										}

										echo $nbr_result." : résultat(s) trouvé(s)!";


									}else{

										echo "<h3 style='text-align: center;'>Aucune notes en ".$libelle." !</h3>";

									}



								}else if(isset($_GET['submit']) AND !empty($_GET['recherche']) AND empty($_GET['note']) AND !empty($_GET['matieres'])){

//Systeme d'affichage de la liste des notes des matieres en fonction de l'eleve  recherchés

									$code_eleve = $_GET['recherche'];

									$libelle = $_GET['matieres'];

										$req_select = "SELECT * FROM notes WHERE libelle = :libelle AND code_eleve = :code_eleve ";

										$req = $bdd -> prepare($req_select);

										$req -> execute([

											"libelle" => "$libelle",
											"code_eleve" => "$code_eleve",
										
										]);

										$req -> fetchAll();

										if(!empty($req -> rowCount())){

											$code_eleve = $_GET['recherche'];

											$libelle = $_GET['matieres'];

											$req_select = "SELECT * FROM notes WHERE libelle = :libelle AND  code_eleve = :code_eleve";

											$req = $bdd -> prepare($req_select);

											$req -> execute([

												"libelle" => "$libelle",
												"code_eleve" => "$code_eleve",
										
											]);


											$result = $req -> fetchAll();

											$nbr_result = $req -> rowCount();

											foreach($result as $result_final){

												echo "<tr>
														<td>".strtoupper($result_final['valeur'])."</td>
														<td>".$result_final['libelle']."</td>
														<td>".$result_final['code_eleve']."</td>
														<td>
															<button class='btn btn-success'><a style='text-decoration :none; color: white;' href='modifier_eleve.php?id=$result_final[0]'><span class='icon'><i class='fa-solid fa-pen-to-square'></i></span></a></button>
															<button class='btn btn-danger'><a style='text-decoration :none; color: white;'  href='?action=supprimer&amp;id=$result_final[0]'><span class='icon'><i class='fa-solid fa-trash'></i></span></a></button>
														</td>
											
													</tr>";


											}

											echo $nbr_result." : résultat(s) trouvé(s)!";


										}else{

											echo "<h3 style='text-align: center;'>Aucune notes a été attribuée en ".$libelle." à cet élève avec le code: ".$code_eleve.".</h3>";

										}



								}else if(isset($_GET['submit']) AND empty($_GET['recherche']) AND !empty($_GET['note']) AND empty($_GET['matieres'])){

//systeme d'affichage de la liste des notes de tous les matieres en fonction de la note recherchée

									$valeur = $_GET['note'];

									$req_select = "SELECT * FROM notes WHERE valeur = :valeur";

									$req = $bdd -> prepare($req_select);

									$req -> execute([

										"valeur" => "$valeur",
										
									]);

									$req -> fetchAll();

									if(!empty($req -> rowCount())){

										$valeur = $_GET['note'];

										$req_select = "SELECT * FROM notes WHERE valeur = :valeur";

										$req = $bdd -> prepare($req_select);

										$req -> execute([

											"valeur" => "$valeur",
										
										]);


										$result = $req -> fetchAll();

										$nbr_result = $req -> rowCount();

										foreach($result as $result_final){

											echo "<tr>
													<td>".strtoupper($result_final['valeur'])."</td>
													<td>".$result_final['libelle']."</td>
													<td>".$result_final['code_eleve']."</td>
													<td>
														<button class='btn btn-success'><a style='text-decoration :none; color: white;' href='modifier_eleve.php?id=$result_final[0]'><span class='icon'><i class='fa-solid fa-pen-to-square'></i></span></a></button>
														<button class='btn btn-danger'><a style='text-decoration :none; color: white;'  href='?action=supprimer&amp;id=$result_final[0]'><span class='icon'><i class='fa-solid fa-trash'></i></span></a></button>
													</td>
											
												</tr>";


										}

											echo $nbr_result." résultat(s) trouvé(s)!";


									}else{

										echo "<h3 style='text-align: center;'>Aucune note = ".$valeur." n'a été attribuée à un élève dans l'une des matieres.</h3>";

									}



								}else if(empty($_GET['recherche'])){

//systeme d'affichage de la liste des notes de tous les eleves

									$req_select = "SELECT * FROM notes";

									$req = $bdd -> prepare($req_select);

									$req -> execute();

									$result = $req -> fetchAll();


									foreach($result as $result_final){

										echo "<tr>
											<td>".$result_final['valeur']."</td>
											<td>".$result_final['libelle']."</td>
											<td>".$result_final['code_eleve']."</td>
											<td>
												<button class='btn btn-success'><a style='text-decoration :none; color: white;' href='modifier_note.php?id=$result_final[0]'><span class='icon'><i class='fa-solid fa-pen-to-square'></i></span></a></button>
												<button class='btn btn-danger'><a style='text-decoration :none; color: white;'  href='?action=supprimer&amp;id=$result_final[0]'><span class='icon'><i class='fa-solid fa-trash'></i></span></a></button>
											</td>
											
										</tr>";

									}


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

		<script type="text/javascript" src="js/popper.min.js"></script>
		<script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>
		<script type="text/javascript" src="js/bootstrap.min.js"></script>

	</footer>

</body>
</html>