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
		<title>inserer eleve</title>

	</head>

	<body>

		<?php

			include('connect_bdd.php');

		?>

		<div>

			<?php

				include("menu_prof.php");

			?>

		</div>

		<br><br><br>

		<section class="container-fluid mt-5">

			<div class="row">

				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 py-5 h-50" style="background-color: #000033;">

					<form method="POST" action="">
						<table class="container">
							<tr class="row">
								<td class="col w-100"><input class="form-control mt-2" type="text" name="nom" placeholder="Le nom"></td>
							</tr>
							<tr class="row">
								<td class="col w-100"><input class="form-control mt-2" type="text" name="prenoms" placeholder="le(s) prenom(s)"></td>
							</tr>
							<tr class="row">
								<td class="col w-100"><input class="form-control mt-2" type="number" name="annee" placeholder="L'année scolaire"></td>
							</tr>
							<tr class="row">
								<td class="col w-100"><input class="form-control mt-2" type="text" name="code_eleve" placeholder="Code ex: ELV1"></td>
							</tr>
							<tr class="row">
								<td class="col w-100"><input class="form-control mt-2" type="text" name="genre" placeholder="Garçon ou Fille"></td>
							</tr>
							<tr class="row">
								<td class="col w-100 text-center" style="color: #ffcc00;">

<!--Systeme d'insertion des eleves -->

									<?php

										if(isset($_POST['submit'])){

											$nom = htmlspecialchars($_POST['nom']);
											$prenoms = htmlspecialchars($_POST['prenoms']);
											$annee = htmlspecialchars($_POST['annee']);
											$code_eleve = htmlspecialchars(strtoupper($_POST['code_eleve']));
											$genre = htmlspecialchars($_POST['genre']);


											if($nom&&$prenoms&&$annee&&$code_eleve&&$genre){

												$long_annee = 4;

												if(strlen($annee) == $long_annee){

													$long_code_eleve = 6;

													if(strlen($code_eleve) <= $long_code_eleve){

														$genre_g = "garcon";
														$genre_f = "fille";

														if($genre == $genre_g OR $genre == $genre_f){


															$req_select = "SELECT * FROM eleves WHERE code_eleve = :code_eleve";

															$req = $bdd -> prepare($req_select);

															$req -> execute([

																"code_eleve" => "$code_eleve",

															]);

															if($req -> rowCount() == 0){

																$req_insert = "INSERT INTO eleves(nom, prenoms, annee, code_eleve, genre) VALUES(:nom, :prenoms, :annee, :code_eleve, :genre)";

																$req = $bdd -> prepare($req_insert);

																$req -> execute([

																	"nom" => "$nom",
																	"prenoms" => "$prenoms",
																	"annee" => "$annee",
																	"code_eleve" => "$code_eleve",
																	"genre" => "$genre",

																]);

																echo "Félicitation! un (1) élève a été enregistrer avec succès.";

															}else{

																echo "Désoler cet élève existe déjà!";

															}


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
								<td class="col w-100"><input class="btn btn-success form-control mt-4" type="submit" name="submit" value="Enregistrer"><input class="btn btn-primary form-control mt-1" type="reset" name="reset" value="Annuler"></td>
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

									<h3 style="color: red;">Êtes vous sûre de supprimer cet élève? </h3>
									<button class ="btn btn-warning"><a style="text-decoration :none; color: white;" href="?action=confirm_supprimer&amp;id=<?php echo $id; ?>"> <i class="fa-solid fa-check fa-shake"></i> </a></button> 
									<button class ="btn btn-primary"><a style="text-decoration :none; color: white;" href="?action=annul_supprimer"> <i class="fa-solid fa-xmark fa-beat"></i> </a></button><br><br>

								<?php

								
							}else if($_GET['action'] == 'confirm_supprimer'){

									$req_delete = "DELETE FROM eleves WHERE id = :id";

									$req = $bdd -> prepare($req_delete);

									$req -> execute([

										"id" => "$id",

									]);

									echo "Suppression réussit!<br><br>";


							}else if($_GET['action'] == 'annul_supprimer'){

								header("Location: inserer_eleve.php");

							}


						}


					?>

<!--systeme recherche -->

				<nav class="navbar navbar-light" style="background: #000033;">
					<div class="container-fluid">
		    			<form method="GET" action="#" class="d-flex" role="search">

		      				<input class="form-control me-2" type="search" name="recherche" placeholder="Entrez le code..."/>
		      				<input class="form-control me-2" type="search" name="annee" placeholder="Entrez l'annee..."/>
		      				<input class="form-control me-2" type="search" name="genre" placeholder="Entrez le genre..."/>
							<button class="btn btn-outline-primary" type="submit" name="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
							<button class="btn btn-outline-success" type="reset" name="reset"><i class="fa-solid fa-rotate-left"></i></button>
		      				
		    			</form>
	  				</div>
  				</nav>	


					<table class="table text-center">

						<thead class="table-light">

							<tr>
							
								<th>Nom</th>
								<th>Prenoms</th>
								<th>Années scolaire</th>
								<th>codes</th>
								<th>Genre</th>
								<th>Actions</th>
							
							</tr>

						<thead>
						<tbody>

							<?php

//Systeme d'affichage de la liste des eleves recherchés

								if(isset($_GET['submit']) AND !empty($_GET['recherche'])){

									if(isset($_GET['recherche'])){

										$code_eleve = $_GET['recherche'];

										$req_select = "SELECT * FROM eleves WHERE code_eleve LIKE '$code_eleve'";

										$req = $bdd -> prepare($req_select);

										$req -> execute();

										$req -> fetchAll();

										if($req -> rowCount() == 1){

											if(isset($_GET['recherche'])){

												$code_eleve = $_GET['recherche'];

												$req_select = "SELECT * FROM eleves WHERE code_eleve LIKE '$code_eleve'";

												$req = $bdd -> prepare($req_select);

												$req -> execute();

												$result = $req -> fetchAll();

												$nbr_result = $req -> rowCount();

												foreach($result as $result_final){

													echo "<tr>
														<td>".strtoupper($result_final['nom'])."</td>
														<td>".$result_final['prenoms']."</td>
														<td>".$result_final['annee']."</td>
														<td>".$result_final['code_eleve']."</td>
														<td>".$result_final['genre']."</td>
														<td>
															<button class='btn btn-success'><a style='text-decoration :none; color: white;' href='modifier_eleve.php?id=$result_final[0]'><span class='icon'><i class='fa-solid fa-pen-to-square'></i></span></a></button>
															<button class='btn btn-danger'><a style='text-decoration :none; color: white;'  href='?action=supprimer&amp;id=$result_final[0]'><span class='icon'><i class='fa-solid fa-trash'></i></span></a></button>
														</td>
											
													</tr>";


												}

												echo "<h2>".$nbr_result." résultat(s) trouvé(s)!</h2>";

											}


										}else{

											echo "<h3 style='text-align: center;'>Aucun élève n'a été enregistré avec le: ".$code_eleve." !</h3>";
										}


									}


								}else if(isset($_GET['submit']) AND empty($_GET['recherche']) AND !empty($_GET['annee'])){

//systeme d'affichage des eleves en fonction de l'annee

									$annee = $_GET['annee'];

									$req_select = "SELECT * FROM eleves WHERE annee LIKE '%$annee%'";

									$req = $bdd -> prepare($req_select);

									$req -> execute();

									$req -> fetchAll();

									if(!empty($req -> rowCount())){

										$annee = $_GET['annee'];

										$req_select = "SELECT * FROM eleves WHERE annee LIKE '$annee'";

										$req = $bdd -> prepare($req_select);

										$req -> execute();

										$result = $req -> fetchAll();

										$nbr_result = $req -> rowCount();

										foreach($result as $result_final){

											echo "<tr>
												<td>".strtoupper($result_final['nom'])."</td>
												<td>".$result_final['prenoms']."</td>
												<td>".$result_final['annee']."</td>
												<td>".$result_final['code_eleve']."</td>
												<td>".$result_final['genre']."</td>
												<td>
													<button class='btn btn-success'><a style='text-decoration :none; color: white;' href='modifier_eleve.php?id=$result_final[0]'><span class='icon'><i class='fa-solid fa-pen-to-square'></i></span></a></button>
													<button class='btn btn-danger'><a style='text-decoration :none; color: white;'  href='?action=supprimer&amp;id=$result_final[0]'><span class='icon'><i class='fa-solid fa-trash'></i></span></a></button>
												</td>
											
											</tr>";

										}

											echo "<h2>".$nbr_result." résultat(s) trouvé(s)!</h2>";


									}else{

										echo "<h3 style='text-align: center;'>Aucun élève n'a été enregistré pour l'année ".$annee." !</h3>";

									}


								}else if(isset($_GET['submit']) AND empty($_GET['recheche']) AND empty($_GET['annee']) AND !empty($_GET['genre'])){

//Systeme d'affichage de la liste des eleves en fonction du genre

									$genre = $_GET['genre'];

									$req_select = "SELECT * FROM eleves WHERE genre LIKE '%$genre%'";

									$req = $bdd -> prepare($req_select);

									$req -> execute();

									$req -> fetchAll();

									if(!empty($req -> rowCount())){

										$genre = $_GET['genre'];

										$req_select = "SELECT * FROM eleves WHERE genre LIKE '$genre'";

										$req = $bdd -> prepare($req_select);

										$req -> execute();

										$result = $req -> fetchAll();

										$nbr_result = $req -> rowCount();

										foreach($result as $result_final){

											echo "<tr>
												<td>".strtoupper($result_final['nom'])."</td>
												<td>".$result_final['prenoms']."</td>
												<td>".$result_final['annee']."</td>
												<td>".$result_final['code_eleve']."</td>
												<td>".$result_final['genre']."</td>
												<td>
													<button class='btn btn-success'><a style='text-decoration :none; color: white;' href='modifier_eleve.php?id=$result_final[0]'><span class='icon'><i class='fa-solid fa-pen-to-square'></i></span></a></button>
													<button class='btn btn-danger'><a style='text-decoration :none; color: white;'  href='?action=supprimer&amp;id=$result_final[0]'><span class='icon'><i class='fa-solid fa-trash'></i></span></a></button>
												</td>
											
											</tr>";

										}

											echo "<h2>".$nbr_result." résultat(s) trouvé(s)!</h2>";


									}else{

										echo "<h3 style='text-align: center;'>Aucun élève n'a été enregistré sous le genre: ".$genre." !</h3>";

									}


								}else if(empty($_GET['recherche'])){

//Systeme d'affichage de la liste des eleves

									$req_select = "SELECT * FROM eleves";

									$req = $bdd -> prepare($req_select);

									$req -> execute();

									$result = $req -> fetchAll();


									foreach($result as $result_final){

										echo "<tr>
												<td>".strtoupper($result_final['nom'])."</td>
												<td>".$result_final['prenoms']."</td>
												<td>".$result_final['annee']."</td>
												<td>".$result_final['code_eleve']."</td>
												<td>".$result_final['genre']."</td>
												<td>
													<button class='btn btn-success'><a style='text-decoration :none; color: white;' href='modifier_eleve.php?id=$result_final[0]' title='modifier'><span class='icon'><i class='fa-solid fa-pen-to-square'></i></span></a></button>
													<button class='btn btn-danger'><a style='text-decoration :none; color: white;'  href='?action=supprimer&amp;id=$result_final[0]' title='supprimer'><span class='icon'><i class='fa-solid fa-trash'></i></span></a></button>
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

		</footer>

		<script type="text/javascript" src="js/popper.min.js"></script>
		<script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>
		<script type="text/javascript" src="js/bootstrap.min.js"></script>

	</body>

</html>