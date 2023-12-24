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
	<title>Moyennes eleves</title>
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

<!--systeme de recherche d'elelves-->


	<section class="container-fluid mt-5">

		<div class="row">

			<div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 py-5 h-50" style="background-color: #000033;">

				<form method="POST" action="">
					<table class="container">
						<tr class="row">
							<td class="col w-100"><input class="form-control" type="text" name="code_eleve" required = "required" placeholder="Entrez le code  Ex: ELV1"></td>
						</tr>
						<tr>
							<td><input class="form-control btn btn-success mt-4" type="submit" name="submit" value="Consulter"/></td>
						</tr>
					</table>
					
				</form>

			</div>

			<div class="col-xl-9 col-lg-9 col-md-9 col-sm-12" style="background-color: #e6e6e6; border-radius: 5px;">

				<table class="table text-center">
					<thead class="table-light">
						<tr>
							<th>Libellés</th>
							<th>Les coefficients</th>
							<th>Nombre de notes</th>
							<th>Somme des notes</th>
							<th>Moyennes Pondérées</th>
							<th>Moyennes Coéfficientées</th>
							<th>Observations</th>
						</tr>
					</thead>
					<tbody>

					<?php

						if(isset($_POST['submit'])){

							$code_eleve = $_POST['code_eleve'];

							if(!empty($code_eleve)){

							$_SESSION['code_eleve'] = $code_eleve;

	//systeme d'affichage du nombre de notes dans chaque matières

	//système d'affichage du nombre de notes en math

							$libelle = "mathematiques";

							$req_select = "SELECT libelle FROM notes WHERE libelle = :libelle AND code_eleve = :code_eleve";

							$req = $bdd -> prepare($req_select);

							$req -> execute([

								"libelle" => "$libelle",
								"code_eleve" => "$code_eleve"

							]);

							$req -> fetch();

							$nbr_note_math = $req -> rowCount();

	//système d'affichage du nombre de notes en pc

							$libelle = "sciences-physiques";

							$req_select = "SELECT libelle FROM notes WHERE libelle = :libelle AND code_eleve = :code_eleve";

							$req = $bdd -> prepare($req_select);

							$req -> execute([

								"libelle" => "$libelle",
								"code_eleve" => "$code_eleve"

							]);

							$req -> fetch();

							$nbr_note_pc = $req -> rowCount();

	//système d'affichage du nombre de notes en svt

							$libelle = "SVT";

							$req_select = "SELECT libelle FROM notes WHERE libelle = :libelle AND code_eleve = :code_eleve";

							$req = $bdd -> prepare($req_select);

							$req -> execute([

								"libelle" => "$libelle",
								"code_eleve" => "$code_eleve"

							]);

							$req -> fetch();

							$nbr_note_svt = $req -> rowCount();

	//système d'affichage du nombre de notes en fr

							$libelle = "Francais";

							$req_select = "SELECT libelle FROM notes WHERE libelle = :libelle AND code_eleve = :code_eleve";

							$req = $bdd -> prepare($req_select);

							$req -> execute([

								"libelle" => "$libelle",
								"code_eleve" => "$code_eleve"

							]);

							$req -> fetch();

							$nbr_note_fr = $req -> rowCount();

	//système d'affichage du nombre de notes en ang

							$libelle = "Anglais";

							$req_select = "SELECT libelle FROM notes WHERE libelle = :libelle AND code_eleve = :code_eleve";

							$req = $bdd -> prepare($req_select);

							$req -> execute([

								"libelle" => "$libelle",
								"code_eleve" => "$code_eleve"

							]);

							$req -> fetch();

							$nbr_note_ang = $req -> rowCount();

	//système d'affichage du nombre de notes en h-g

							$libelle = "Histoire-Geographie";

							$req_select = "SELECT libelle FROM notes WHERE libelle = :libelle AND code_eleve = :code_eleve";

							$req = $bdd -> prepare($req_select);

							$req -> execute([

								"libelle" => "$libelle",
								"code_eleve" => "$code_eleve"

							]);

							$req -> fetch();

							$nbr_note_hg = $req -> rowCount();

	//système d'affichage du nombre de notes en esp

							$libelle = "Espagnol";

							$req_select = "SELECT libelle FROM notes WHERE libelle = :libelle AND code_eleve = :code_eleve";

							$req = $bdd -> prepare($req_select);

							$req -> execute([

								"libelle" => "$libelle",
								"code_eleve" => "$code_eleve"

							]);

							$req -> fetch();

							$nbr_note_esp = $req -> rowCount();

	//système d'affichage du nombre de notes en all

							$libelle = "Allemand";

							$req_select = "SELECT libelle FROM notes WHERE libelle = :libelle AND code_eleve = :code_eleve";

							$req = $bdd -> prepare($req_select);

							$req -> execute([

								"libelle" => "$libelle",
								"code_eleve" => "$code_eleve"

							]);

							$req -> fetch();

							$nbr_note_all = $req -> rowCount();

	//système d'affichage du nombre de notes en philo

							$libelle = "Philosophie";

							$req_select = "SELECT libelle FROM notes WHERE libelle = :libelle AND code_eleve = :code_eleve";

							$req = $bdd -> prepare($req_select);

							$req -> execute([

								"libelle" => "$libelle",
								"code_eleve" => "$code_eleve"

							]);

							$req -> fetch();

							$nbr_note_philo = $req -> rowCount();

	//système d'affichage du nombre de notes en edhc

							$libelle = "EDHC";

							$req_select = "SELECT libelle FROM notes WHERE libelle = :libelle AND code_eleve = :code_eleve";

							$req = $bdd -> prepare($req_select);

							$req -> execute([

								"libelle" => "$libelle",
								"code_eleve" => "$code_eleve"

							]);

							$req -> fetch();

							$nbr_note_edhc = $req -> rowCount();

	//systeme d'affichage de la somme des notes dans chaque discipline

	//systeme d'affichage de la somme des notes en math


							$libelle = "mathematiques";

							$req_select = "SELECT SUM(valeur) AS 'total_note_math' FROM notes WHERE libelle = :libelle AND code_eleve = :code_eleve";

							$req = $bdd -> prepare($req_select);

							$req -> execute([

								"libelle" => "$libelle",
								"code_eleve" => "$code_eleve"

							]);

							$result = $req -> fetch();

							$total_note_math = $result['total_note_math'];


	//systeme d'affichage de la somme des notes en pc


							$libelle = "sciences-physiques";

							$req_select = "SELECT SUM(valeur) AS 'total_note_pc' FROM notes WHERE libelle = :libelle AND code_eleve = :code_eleve";

							$req = $bdd -> prepare($req_select);

							$req -> execute([

								"libelle" => "$libelle",
								"code_eleve" => "$code_eleve"

							]);

							$result = $req -> fetch();

							$total_note_pc = $result['total_note_pc'];

	//systeme d'affichage de la somme des notes en svt


							$libelle = "SVT";

							$req_select = "SELECT SUM(valeur) AS 'total_note_svt' FROM notes WHERE libelle = :libelle AND code_eleve = :code_eleve";

							$req = $bdd -> prepare($req_select);

							$req -> execute([

								"libelle" => "$libelle",
								"code_eleve" => "$code_eleve"

							]);

							$result = $req -> fetch();

							$total_note_svt = $result['total_note_svt'];

	//systeme d'affichage de la somme des notes en fr


							$libelle = "Francais";

							$req_select = "SELECT SUM(valeur) AS 'total_note_fr' FROM notes WHERE libelle = :libelle AND code_eleve = :code_eleve";

							$req = $bdd -> prepare($req_select);

							$req -> execute([

								"libelle" => "$libelle",
								"code_eleve" => "$code_eleve"

							]);

							$result = $req -> fetch();

							$total_note_fr = $result['total_note_fr'];

	//systeme d'affichage de la somme des notes en ang


							$libelle = "Anglais";

							$req_select = "SELECT SUM(valeur) AS 'total_note_ang' FROM notes WHERE libelle = :libelle AND code_eleve = :code_eleve";

							$req = $bdd -> prepare($req_select);

							$req -> execute([

								"libelle" => "$libelle",
								"code_eleve" => "$code_eleve"

							]);

							$result = $req -> fetch();

							$total_note_ang = $result['total_note_ang'];

	//systeme d'affichage de la somme des notes en hg


							$libelle = "Histoire-Geographie";

							$req_select = "SELECT SUM(valeur) AS 'total_note_hg' FROM notes WHERE libelle = :libelle AND code_eleve = :code_eleve";

							$req = $bdd -> prepare($req_select);

							$req -> execute([

								"libelle" => "$libelle",
								"code_eleve" => "$code_eleve"

							]);

							$result = $req -> fetch();

							$total_note_hg = $result['total_note_hg'];

	//systeme d'affichage de la somme des notes en esp


							$libelle = "Espagnol";

							$req_select = "SELECT SUM(valeur) AS 'total_note_esp' FROM notes WHERE libelle = :libelle AND code_eleve = :code_eleve";

							$req = $bdd -> prepare($req_select);

							$req -> execute([

								"libelle" => "$libelle",
								"code_eleve" => "$code_eleve"

							]);

							$result = $req -> fetch();

							$total_note_esp = $result['total_note_esp'];

	//systeme d'affichage de la somme des notes en all


							$libelle = "Allemand";

							$req_select = "SELECT SUM(valeur) AS 'total_note_all' FROM notes WHERE libelle = :libelle AND code_eleve = :code_eleve";

							$req = $bdd -> prepare($req_select);

							$req -> execute([

								"libelle" => "$libelle",
								"code_eleve" => "$code_eleve"

							]);

							$result = $req -> fetch();

							$total_note_all = $result['total_note_all'];

	//systeme d'affichage de la somme des notes en philo


							$libelle = "Philosophie";

							$req_select = "SELECT SUM(valeur) AS 'total_note_philo' FROM notes WHERE libelle = :libelle AND code_eleve = :code_eleve";

							$req = $bdd -> prepare($req_select);

							$req -> execute([

								"libelle" => "$libelle",
								"code_eleve" => "$code_eleve"

							]);

							$result = $req -> fetch();

							$total_note_philo = $result['total_note_philo'];

	//systeme d'affichage de la somme des notes en edhc


							$libelle = "EDHC";

							$req_select = "SELECT SUM(valeur) AS 'total_note_edhc' FROM notes WHERE libelle = :libelle AND code_eleve = :code_eleve";

							$req = $bdd -> prepare($req_select);

							$req -> execute([

								"libelle" => "$libelle",
								"code_eleve" => "$code_eleve"

							]);

							$result = $req -> fetch();

							$total_note_edhc = $result['total_note_edhc'];

//système de recuperation des coefficients

//En math

							$req_select = "SELECT coefficient FROM matieres WHERE libelle = 'mathematiques'";

							$req = $bdd -> prepare($req_select);

							$req -> execute();

							$result = $req -> fetch();

							$coef_math = $result[0];

//En pc

							$req_select = "SELECT coefficient FROM matieres WHERE libelle = 'Sciences-Physiques'";

							$req = $bdd -> prepare($req_select);

							$req -> execute();

							$result = $req -> fetch();

							$coef_pc = $result[0];

//En svt

							$req_select = "SELECT coefficient FROM matieres WHERE libelle = 'SVT'";

							$req = $bdd -> prepare($req_select);

							$req -> execute();

							$result = $req -> fetch();

							$coef_svt = $result[0];

//En fr

							$req_select = "SELECT coefficient FROM matieres WHERE libelle = 'Francais'";

							$req = $bdd -> prepare($req_select);

							$req -> execute();

							$result = $req -> fetch();

							$coef_fr = $result[0];


//En ang

							$req_select = "SELECT coefficient FROM matieres WHERE libelle = 'Anglais'";

							$req = $bdd -> prepare($req_select);

							$req -> execute();

							$result = $req -> fetch();

							$coef_ang = $result[0];

//En hg

							$req_select = "SELECT coefficient FROM matieres WHERE libelle = 'Histoire-Geographie'";

							$req = $bdd -> prepare($req_select);

							$req -> execute();

							$result = $req -> fetch();

							$coef_hg = $result[0];

//En esp

							$req_select = "SELECT coefficient FROM matieres WHERE libelle = 'Espagnol'";

							$req = $bdd -> prepare($req_select);

							$req -> execute();

							$result = $req -> fetch();

							$coef_esp = $result[0];

//En all

							$req_select = "SELECT coefficient FROM matieres WHERE libelle = 'Allemand'";

							$req = $bdd -> prepare($req_select);

							$req -> execute();

							$result = $req -> fetch();

							$coef_all = $result[0];

//En philo

							$req_select = "SELECT coefficient FROM matieres WHERE libelle = 'Philosophie'";

							$req = $bdd -> prepare($req_select);

							$req -> execute();

							$result = $req -> fetch();

							$coef_philo = $result[0];

//En edhc

							$req_select = "SELECT coefficient FROM matieres WHERE libelle = 'EDHC'";

							$req = $bdd -> prepare($req_select);

							$req -> execute();

							$result = $req -> fetch();

							$coef_edhc = $result[0];

//systeme d'afficahge des moyennes pondérées

//en math

							$req_select = "SELECT AVG(valeur) AS 'moyenne_math' FROM notes WHERE code_eleve = :code_eleve AND libelle = 'mathematiques'";

							$req = $bdd -> prepare($req_select);

							$req -> execute([

								"code_eleve" => "$code_eleve",

							]);

							$result = $req -> fetch();

							$moy_math = $result['moyenne_math'];

//en pc

							$req_select = "SELECT AVG(valeur) AS 'moyenne_pc' FROM notes WHERE code_eleve = :code_eleve AND libelle = 'Sciences-Physiques'";

							$req = $bdd -> prepare($req_select);

							$req -> execute([

								"code_eleve" => "$code_eleve",

							]);

							$result = $req -> fetch();

							$moy_pc = $result['moyenne_pc'];

//en svt

							$req_select = "SELECT AVG(valeur) AS 'moyenne_svt' FROM notes WHERE code_eleve = :code_eleve AND libelle = 'SVT'";

							$req = $bdd -> prepare($req_select);

							$req -> execute([

								"code_eleve" => "$code_eleve",

							]);

							$result = $req -> fetch();

							$moy_svt = $result['moyenne_svt'];

//en fr

							$req_select = "SELECT AVG(valeur) AS 'moyenne_fr' FROM notes WHERE code_eleve = :code_eleve AND libelle = 'Francais'";

							$req = $bdd -> prepare($req_select);

							$req -> execute([

								"code_eleve" => "$code_eleve",

							]);

							$result = $req -> fetch();

							$moy_fr = $result['moyenne_fr'];

//en ang

							$req_select = "SELECT AVG(valeur) AS 'moyenne_ang' FROM notes WHERE code_eleve = :code_eleve AND libelle = 'Anglais'";

							$req = $bdd -> prepare($req_select);

							$req -> execute([

								"code_eleve" => "$code_eleve",

							]);

							$result = $req -> fetch();

							$moy_ang = $result['moyenne_ang'];

//en hg

							$req_select = "SELECT AVG(valeur) AS 'moyenne_hg' FROM notes WHERE code_eleve = :code_eleve AND libelle = 'Histoire-Geographie'";

							$req = $bdd -> prepare($req_select);

							$req -> execute([

								"code_eleve" => "$code_eleve",

							]);

							$result = $req -> fetch();

							$moy_hg = $result['moyenne_hg'];

//en esp

							$req_select = "SELECT AVG(valeur) AS 'moyenne_esp' FROM notes WHERE code_eleve = :code_eleve AND libelle = 'Espagnol'";

							$req = $bdd -> prepare($req_select);

							$req -> execute([

								"code_eleve" => "$code_eleve",

							]);

							$result = $req -> fetch();

							$moy_esp = $result['moyenne_esp'];

//en all

							$req_select = "SELECT AVG(valeur) AS 'moyenne_all' FROM notes WHERE code_eleve = :code_eleve AND libelle = 'Allemand'";

							$req = $bdd -> prepare($req_select);

							$req -> execute([

								"code_eleve" => "$code_eleve",

							]);

							$result = $req -> fetch();

							$moy_all = $result['moyenne_all'];

//en philo

							$req_select = "SELECT AVG(valeur) AS 'moyenne_philo' FROM notes WHERE code_eleve = :code_eleve AND libelle = 'Philosophie'";

							$req = $bdd -> prepare($req_select);

							$req -> execute([

								"code_eleve" => "$code_eleve",

							]);

							$result = $req -> fetch();

							$moy_philo = $result['moyenne_philo'];

//en edhc

							$req_select = "SELECT AVG(valeur) AS 'moyenne_edhc' FROM notes WHERE code_eleve = :code_eleve AND libelle = 'EDHC'";

							$req = $bdd -> prepare($req_select);

							$req -> execute([

								"code_eleve" => "$code_eleve",

							]);

							$result = $req -> fetch();

							$moy_edhc = $result['moyenne_edhc'];

							include("fonctions.php");

							$moy_coef_math = moy_coef_math($moy_math,$coef_math);
							$moy_coef_pc = moy_coef_pc($moy_pc,$coef_pc);
							$moy_coef_svt = moy_coef_svt($moy_svt,$coef_svt);
							$moy_coef_fr = moy_coef_fr($moy_fr,$coef_fr);
							$moy_coef_ang = moy_coef_ang($moy_ang,$coef_ang);
							$moy_coef_hg = moy_coef_hg($moy_hg,$coef_hg);
							$moy_coef_esp = moy_coef_esp($moy_esp,$coef_esp);
							$moy_coef_all = moy_coef_all($moy_all,$coef_all);
							$moy_coef_philo = moy_coef_philo($moy_philo,$coef_philo);
							$moy_coef_edhc = moy_coef_edhc($moy_edhc,$coef_edhc);

							$obs_math = obs_math();
							$obs_pc = obs_pc();
							$obs_svt = obs_svt();
							$obs_fr = obs_fr();
							$obs_ang = obs_ang();
							$obs_hg = obs_hg();
							$obs_esp = obs_esp();
							$obs_all = obs_all();
							$obs_philo = obs_philo();
							$obs_edhc = obs_edhc();

							echo "
								<tr>

									<td><strong>Mathématiques</strong></td>
									<td>".$coef_math."</td>
									<td>".$nbr_note_math."</td>
									<td>".$total_note_math."</td>
									<td>".$moy_math."</td>
									<td>".$moy_coef_math."</td>
									<td><strong>".$obs_math."</strong></td>

								</tr>
								<tr>

									<td><strong>Sciences-Physiques</strong></td>
									<td>".$coef_pc."</td>
									<td>".$nbr_note_pc."</td>
									<td>".$total_note_pc."</td>
									<td>".$moy_pc."</td>
									<td>".$moy_coef_pc."</td>
									<td><strong>".$obs_pc."</strong></td>

								</tr>
								<tr>

									<td><strong>SVT</strong></td>
									<td>".$coef_svt."</td>
									<td>".$nbr_note_svt."</td>
									<td>".$total_note_svt."</td>
									<td>".$moy_svt."</td>
									<td>".$moy_coef_svt."</td>
									<td><strong>".$obs_svt."</strong></td>

								</tr>
								<tr>

									<td><strong>Français</strong></td>
									<td>".$coef_fr."</td>
									<td>".$nbr_note_fr."</td>
									<td>".$total_note_fr."</td>
									<td>".$moy_fr."</td>
									<td>".$moy_coef_fr."</td>
									<td><strong>".$obs_fr."</strong></td>

								</tr>
								<tr>

									<td><strong>Anglais</strong></td>
									<td>".$coef_ang."</td>
									<td>".$nbr_note_ang."</td>
									<td>".$total_note_ang."</td>
									<td>".$moy_ang."</td>
									<td>".$moy_coef_ang."</td>
									<td><strong>".$obs_ang."</strong></td>

								</tr>
								<tr>

									<td><strong>Histoire-Geographie</strong></td>
									<td>".$coef_hg."</td>
									<td>".$nbr_note_hg."</td>
									<td>".$total_note_hg."</td>
									<td>".$moy_hg."</td>
									<td>".$moy_coef_hg."</td>
									<td><strong>".$obs_hg."</strong></td>

								</tr>
								<tr>

									<td><strong>Espagnol</strong></td>
									<td>".$coef_esp."</td>
									<td>".$nbr_note_esp."</td>
									<td>".$total_note_esp."</td>
									<td>".$moy_esp."</td>
									<td>".$moy_coef_esp."</td>
									<td><strong>".$obs_esp."</strong></td>

								</tr>
								<tr>

									<td><strong>Allemand</strong></td>
									<td>".$coef_all."</td>
									<td>".$nbr_note_all."</td>
									<td>".$total_note_all."</td>
									<td>".$moy_all."</td>
									<td>".$moy_coef_all."</td>
									<td><strong>".$obs_all."</strong></td>

								</tr>
								<tr>

									<td><strong>Philosophie</strong></td>
									<td>".$coef_philo."</td>
									<td>".$nbr_note_philo."</td>
									<td>".$total_note_philo."</td>
									<td>".$moy_philo."</td>
									<td>".$moy_coef_philo."</td>
									<td><strong>".$obs_philo."</strong></td>

								</tr>
								<tr>

									<td><strong>EDHC</strong></td>
									<td>".$coef_edhc."</td>
									<td>".$nbr_note_edhc."</td>
									<td>".$total_note_edhc."</td>
									<td>".$moy_edhc."</td>
									<td>".$moy_coef_edhc."</td>
									<td><strong>".$obs_edhc."</strong></td>

								</tr>


								";

							}else{

							 	echo "hello!";

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