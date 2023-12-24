<?php

//Fonctions pour l'affichage des moyennes pondérées
	
	function moy_coef_math ($x,$y){

		$z = $x * $y;

		return $z;

	}


	function moy_coef_pc ($x,$y){

		$z = $x * $y;

		return $z;
		
	}

	function moy_coef_svt ($x,$y){

		$z = $x * $y;

		return $z;
		
	}

	function moy_coef_fr ($x,$y){

		$z = $x * $y;

		return $z;
		
	}

	function moy_coef_ang ($x,$y){

		$z = $x * $y;

		return $z;
		
	}

	function moy_coef_hg ($x,$y){

		$z = $x * $y;

		return $z;
		
	}

	function moy_coef_esp ($x,$y){

		$z = $x * $y;

		return $z;
		
	}

	function moy_coef_all ($x,$y){

		$z = $x * $y;

		return $z;
		
	}

	function moy_coef_philo ($x,$y){

		$z = $x * $y;

		return $z;
		
	}

	function moy_coef_edhc ($x,$y){

		$z = $x * $y;

		return $z;
		
	}

//Fonctions pour l'affichage des observations

//en math

function obs_math(){

	if(isset($_SESSION['code_eleve'])){

		$code_eleve = $_SESSION['code_eleve'];

	}

	include('connect_bdd.php');

	$req_select = "SELECT AVG(valeur) AS 'moyenne_math' FROM notes WHERE code_eleve = :code_eleve AND libelle = 'mathematiques'";

	$req = $bdd -> prepare($req_select);

	$req -> execute([

		"code_eleve" => "$code_eleve",

	]);

	$result = $req -> fetch();

	$moy_math = $result['moyenne_math'];

	$moys_nulle = [0,1,2];
	$moys_mauvais = [3,4,5];
	$moys_insuffisant = [6,7,8];
	$moys_passable = [9,10,11];
	$moys_assez_bien = [12,13,14];
	$moys_bien = [15,16,17];
	$moys_tres_bien = [18,19];
	$moys_excellent = [18,19];

	$nulle = "Nulle";
	$mauvais = "Mauvais";
	$insuffisant = "Insuffisant";
	$passable = "Passable";
	$assez_bien = "Assez-Bien";
	$bien = "Bien";
	$tres_bien = "Très-Bien";
	$excellent = "Excellent";


	if(in_array($moy_math, $moys_nulle)){

		return $nulle;

	}else if(in_array($moy_math, $moys_mauvais)){

		return $mauvais;

	}else if(in_array($moy_math, $moys_insuffisant)){

		return $insuffisant;

	}else if(in_array($moy_math, $moys_passable)){

		return $passable;

	}else if(in_array($moy_math, $moys_assez_bien)){

		return $assez_bien;

	}else if(in_array($moy_math, $moys_bien)){

		return $bien;

	}else if(in_array($moy_math, $moys_tres_bien)){

		return $tres_bien;

	}else if(in_array($moy_math, $moys_excellent)){

		return $excellent;

	}


}


//en pc

function obs_pc(){

	if(isset($_SESSION['code_eleve'])){

		$code_eleve = $_SESSION['code_eleve'];

	}

	include('connect_bdd.php');

	$req_select = "SELECT AVG(valeur) AS 'moyenne_pc' FROM notes WHERE code_eleve = :code_eleve AND libelle = 'Sciences-Physiques'";

	$req = $bdd -> prepare($req_select);

	$req -> execute([

		"code_eleve" => "$code_eleve",

	]);

	$result = $req -> fetch();

	$moy_pc = $result['moyenne_pc'];

	$moys_nulle = [0,1,2];
	$moys_mauvais = [3,4,5];
	$moys_insuffisant = [6,7,8];
	$moys_passable = [9,10,11];
	$moys_assez_bien = [12,13,14];
	$moys_bien = [15,16,17];
	$moys_tres_bien = [18,19];
	$moys_excellent = [18,19];

	$nulle = "Nulle";
	$mauvais = "Mauvais";
	$insuffisant = "Insuffisant";
	$passable = "Passable";
	$assez_bien = "Assez-Bien";
	$bien = "Bien";
	$tres_bien = "Très-Bien";
	$excellent = "Excellent";


	if(in_array($moy_pc, $moys_nulle)){

		return $nulle;

	}else if(in_array($moy_pc, $moys_mauvais)){

		return $mauvais;

	}else if(in_array($moy_pc, $moys_insuffisant)){

		return $insuffisant;

	}else if(in_array($moy_pc, $moys_passable)){

		return $passable;

	}else if(in_array($moy_pc, $moys_assez_bien)){

		return $assez_bien;

	}else if(in_array($moy_pc, $moys_bien)){

		return $bien;

	}else if(in_array($moy_pc, $moys_tres_bien)){

		return $tres_bien;

	}else if(in_array($moy_pc, $moys_excellent)){

		return $excellent;

	}


}

//en svt

function obs_svt(){

	if(isset($_SESSION['code_eleve'])){

		$code_eleve = $_SESSION['code_eleve'];

	}

	include('connect_bdd.php');

	$req_select = "SELECT AVG(valeur) AS 'moyenne_svt' FROM notes WHERE code_eleve = :code_eleve AND libelle = 'SVT'";

	$req = $bdd -> prepare($req_select);

	$req -> execute([

		"code_eleve" => "$code_eleve",

	]);

	$result = $req -> fetch();

	$moy_svt = $result['moyenne_svt'];

	$moys_nulle = [0,1,2];
	$moys_mauvais = [3,4,5];
	$moys_insuffisant = [6,7,8];
	$moys_passable = [9,10,11];
	$moys_assez_bien = [12,13,14];
	$moys_bien = [15,16,17];
	$moys_tres_bien = [18,19];
	$moys_excellent = [18,19];

	$nulle = "Nulle";
	$mauvais = "Mauvais";
	$insuffisant = "Insuffisant";
	$passable = "Passable";
	$assez_bien = "Assez-Bien";
	$bien = "Bien";
	$tres_bien = "Très-Bien";
	$excellent = "Excellent";


	if(in_array($moy_svt, $moys_nulle)){

		return $nulle;

	}else if(in_array($moy_svt, $moys_mauvais)){

		return $mauvais;

	}else if(in_array($moy_svt, $moys_insuffisant)){

		return $insuffisant;

	}else if(in_array($moy_svt, $moys_passable)){

		return $passable;

	}else if(in_array($moy_svt, $moys_assez_bien)){

		return $assez_bien;

	}else if(in_array($moy_svt, $moys_bien)){

		return $bien;

	}else if(in_array($moy_svt, $moys_tres_bien)){

		return $tres_bien;

	}else if(in_array($moy_svt, $moys_excellent)){

		return $excellent;

	}


}

//en fr

function obs_fr(){

	if(isset($_SESSION['code_eleve'])){

		$code_eleve = $_SESSION['code_eleve'];

	}

	include('connect_bdd.php');

	$req_select = "SELECT AVG(valeur) AS 'moyenne_fr' FROM notes WHERE code_eleve = :code_eleve AND libelle = 'Francais'";

	$req = $bdd -> prepare($req_select);

	$req -> execute([

		"code_eleve" => "$code_eleve",

	]);

	$result = $req -> fetch();

	$moy_fr = $result['moyenne_fr'];

	$moys_nulle = [0,1,2];
	$moys_mauvais = [3,4,5];
	$moys_insuffisant = [6,7,8];
	$moys_passable = [9,10,11];
	$moys_assez_bien = [12,13,14];
	$moys_bien = [15,16,17];
	$moys_tres_bien = [18,19];
	$moys_excellent = [18,19];

	$nulle = "Nulle";
	$mauvais = "Mauvais";
	$insuffisant = "Insuffisant";
	$passable = "Passable";
	$assez_bien = "Assez-Bien";
	$bien = "Bien";
	$tres_bien = "Très-Bien";
	$excellent = "Excellent";


	if(in_array($moy_fr, $moys_nulle)){

		return $nulle;

	}else if(in_array($moy_fr, $moys_mauvais)){

		return $mauvais;

	}else if(in_array($moy_fr, $moys_insuffisant)){

		return $insuffisant;

	}else if(in_array($moy_fr, $moys_passable)){

		return $passable;

	}else if(in_array($moy_fr, $moys_assez_bien)){

		return $assez_bien;

	}else if(in_array($moy_fr, $moys_bien)){

		return $bien;

	}else if(in_array($moy_fr, $moys_tres_bien)){

		return $tres_bien;

	}else if(in_array($moy_fr, $moys_excellent)){

		return $excellent;

	}


}

//en ang

function obs_ang(){

	if(isset($_SESSION['code_eleve'])){

		$code_eleve = $_SESSION['code_eleve'];

	}

	include('connect_bdd.php');

	$req_select = "SELECT AVG(valeur) AS 'moyenne_ang' FROM notes WHERE code_eleve = :code_eleve AND libelle = 'Anglais'";

	$req = $bdd -> prepare($req_select);

	$req -> execute([

		"code_eleve" => "$code_eleve",

	]);

	$result = $req -> fetch();

	$moy_ang = $result['moyenne_ang'];

	$moys_nulle = [0,1,2];
	$moys_mauvais = [3,4,5];
	$moys_insuffisant = [6,7,8];
	$moys_passable = [9,10,11];
	$moys_assez_bien = [12,13,14];
	$moys_bien = [15,16,17];
	$moys_tres_bien = [18,19];
	$moys_excellent = [18,19];

	$nulle = "Nulle";
	$mauvais = "Mauvais";
	$insuffisant = "Insuffisant";
	$passable = "Passable";
	$assez_bien = "Assez-Bien";
	$bien = "Bien";
	$tres_bien = "Très-Bien";
	$excellent = "Excellent";


	if(in_array($moy_ang, $moys_nulle)){

		return $nulle;

	}else if(in_array($moy_ang, $moys_mauvais)){

		return $mauvais;

	}else if(in_array($moy_ang, $moys_insuffisant)){

		return $insuffisant;

	}else if(in_array($moy_ang, $moys_passable)){

		return $passable;

	}else if(in_array($moy_ang, $moys_assez_bien)){

		return $assez_bien;

	}else if(in_array($moy_ang, $moys_bien)){

		return $bien;

	}else if(in_array($moy_ang, $moys_tres_bien)){

		return $tres_bien;

	}else if(in_array($moy_ang, $moys_excellent)){

		return $excellent;

	}


}

//en hg

function obs_hg(){

	if(isset($_SESSION['code_eleve'])){

		$code_eleve = $_SESSION['code_eleve'];

	}

	include('connect_bdd.php');

	$req_select = "SELECT AVG(valeur) AS 'moyenne_hg' FROM notes WHERE code_eleve = :code_eleve AND libelle = 'Histoire-Geographie'";

	$req = $bdd -> prepare($req_select);

	$req -> execute([

		"code_eleve" => "$code_eleve",

	]);

	$result = $req -> fetch();

	$moy_hg = $result['moyenne_hg'];

	$moys_nulle = [0,1,2];
	$moys_mauvais = [3,4,5];
	$moys_insuffisant = [6,7,8];
	$moys_passable = [9,10,11];
	$moys_assez_bien = [12,13,14];
	$moys_bien = [15,16,17];
	$moys_tres_bien = [18,19];
	$moys_excellent = [18,19];

	$nulle = "Nulle";
	$mauvais = "Mauvais";
	$insuffisant = "Insuffisant";
	$passable = "Passable";
	$assez_bien = "Assez-Bien";
	$bien = "Bien";
	$tres_bien = "Très-Bien";
	$excellent = "Excellent";


	if(in_array($moy_hg, $moys_nulle)){

		return $nulle;

	}else if(in_array($moy_hg, $moys_mauvais)){

		return $mauvais;

	}else if(in_array($moy_hg, $moys_insuffisant)){

		return $insuffisant;

	}else if(in_array($moy_hg, $moys_passable)){

		return $passable;

	}else if(in_array($moy_hg, $moys_assez_bien)){

		return $assez_bien;

	}else if(in_array($moy_hg, $moys_bien)){

		return $bien;

	}else if(in_array($moy_hg, $moys_tres_bien)){

		return $tres_bien;

	}else if(in_array($moy_hg, $moys_excellent)){

		return $excellent;

	}


}

//en esp

function obs_esp(){

	if(isset($_SESSION['code_eleve'])){

		$code_eleve = $_SESSION['code_eleve'];

	}

	include('connect_bdd.php');

	$req_select = "SELECT AVG(valeur) AS 'moyenne_esp' FROM notes WHERE code_eleve = :code_eleve AND libelle = 'Espagnol'";

	$req = $bdd -> prepare($req_select);

	$req -> execute([

		"code_eleve" => "$code_eleve",

	]);

	$result = $req -> fetch();

	$moy_esp = $result['moyenne_esp'];

	$moys_nulle = [0,1,2];
	$moys_mauvais = [3,4,5];
	$moys_insuffisant = [6,7,8];
	$moys_passable = [9,10,11];
	$moys_assez_bien = [12,13,14];
	$moys_bien = [15,16,17];
	$moys_tres_bien = [18,19];
	$moys_excellent = [18,19];

	$nulle = "Nulle";
	$mauvais = "Mauvais";
	$insuffisant = "Insuffisant";
	$passable = "Passable";
	$assez_bien = "Assez-Bien";
	$bien = "Bien";
	$tres_bien = "Très-Bien";
	$excellent = "Excellent";


	if(in_array($moy_esp, $moys_nulle)){

		return $nulle;

	}else if(in_array($moy_esp, $moys_mauvais)){

		return $mauvais;

	}else if(in_array($moy_esp, $moys_insuffisant)){

		return $insuffisant;

	}else if(in_array($moy_esp, $moys_passable)){

		return $passable;

	}else if(in_array($moy_esp, $moys_assez_bien)){

		return $assez_bien;

	}else if(in_array($moy_esp, $moys_bien)){

		return $bien;

	}else if(in_array($moy_esp, $moys_tres_bien)){

		return $tres_bien;

	}else if(in_array($moy_esp, $moys_excellent)){

		return $excellent;

	}


}

//en all

function obs_all(){

	if(isset($_SESSION['code_eleve'])){

		$code_eleve = $_SESSION['code_eleve'];

	}

	include('connect_bdd.php');

	$req_select = "SELECT AVG(valeur) AS 'moyenne_all' FROM notes WHERE code_eleve = :code_eleve AND libelle = 'Allemand'";

	$req = $bdd -> prepare($req_select);

	$req -> execute([

		"code_eleve" => "$code_eleve",

	]);

	$result = $req -> fetch();

	$moy_all = $result['moyenne_all'];

	$moys_nulle = [0,1,2];
	$moys_mauvais = [3,4,5];
	$moys_insuffisant = [6,7,8];
	$moys_passable = [9,10,11];
	$moys_assez_bien = [12,13,14];
	$moys_bien = [15,16,17];
	$moys_tres_bien = [18,19];
	$moys_excellent = [18,19];

	$nulle = "Nulle";
	$mauvais = "Mauvais";
	$insuffisant = "Insuffisant";
	$passable = "Passable";
	$assez_bien = "Assez-Bien";
	$bien = "Bien";
	$tres_bien = "Très-Bien";
	$excellent = "Excellent";


	if(in_array($moy_all, $moys_nulle)){

		return $nulle;

	}else if(in_array($moy_all, $moys_mauvais)){

		return $mauvais;

	}else if(in_array($moy_all, $moys_insuffisant)){

		return $insuffisant;

	}else if(in_array($moy_all, $moys_passable)){

		return $passable;

	}else if(in_array($moy_all, $moys_assez_bien)){

		return $assez_bien;

	}else if(in_array($moy_all, $moys_bien)){

		return $bien;

	}else if(in_array($moy_all, $moys_tres_bien)){

		return $tres_bien;

	}else if(in_array($moy_all, $moys_excellent)){

		return $excellent;

	}


}

//en philo

function obs_philo(){

	if(isset($_SESSION['code_eleve'])){

		$code_eleve = $_SESSION['code_eleve'];

	}

	include('connect_bdd.php');

	$req_select = "SELECT AVG(valeur) AS 'moyenne_philo' FROM notes WHERE code_eleve = :code_eleve AND libelle = 'Philosophie'";

	$req = $bdd -> prepare($req_select);

	$req -> execute([

		"code_eleve" => "$code_eleve",

	]);

	$result = $req -> fetch();

	$moy_philo = $result['moyenne_philo'];

	$moys_nulle = [0,1,2];
	$moys_mauvais = [3,4,5];
	$moys_insuffisant = [6,7,8];
	$moys_passable = [9,10,11];
	$moys_assez_bien = [12,13,14];
	$moys_bien = [15,16,17];
	$moys_tres_bien = [18,19];
	$moys_excellent = [18,19];

	$nulle = "Nulle";
	$mauvais = "Mauvais";
	$insuffisant = "Insuffisant";
	$passable = "Passable";
	$assez_bien = "Assez-Bien";
	$bien = "Bien";
	$tres_bien = "Très-Bien";
	$excellent = "Excellent";


	if(in_array($moy_philo, $moys_nulle)){

		return $nulle;

	}else if(in_array($moy_philo, $moys_mauvais)){

		return $mauvais;

	}else if(in_array($moy_philo, $moys_insuffisant)){

		return $insuffisant;

	}else if(in_array($moy_philo, $moys_passable)){

		return $passable;

	}else if(in_array($moy_philo, $moys_assez_bien)){

		return $assez_bien;

	}else if(in_array($moy_philo, $moys_bien)){

		return $bien;

	}else if(in_array($moy_philo, $moys_tres_bien)){

		return $tres_bien;

	}else if(in_array($moy_philo, $moys_excellent)){

		return $excellent;

	}


}

//en edhc

function obs_edhc(){

	if(isset($_SESSION['code_eleve'])){

		$code_eleve = $_SESSION['code_eleve'];

	}

	include('connect_bdd.php');

	$req_select = "SELECT AVG(valeur) AS 'moyenne_edhc' FROM notes WHERE code_eleve = :code_eleve AND libelle = 'EDHC'";

	$req = $bdd -> prepare($req_select);

	$req -> execute([

		"code_eleve" => "$code_eleve",

	]);

	$result = $req -> fetch();

	$moy_edhc = $result['moyenne_edhc'];

	$moys_nulle = [0,1,2];
	$moys_mauvais = [3,4,5];
	$moys_insuffisant = [6,7,8];
	$moys_passable = [9,10,11];
	$moys_assez_bien = [12,13,14];
	$moys_bien = [15,16,17];
	$moys_tres_bien = [18,19];
	$moys_excellent = [18,19];

	$nulle = "Nulle";
	$mauvais = "Mauvais";
	$insuffisant = "Insuffisant";
	$passable = "Passable";
	$assez_bien = "Assez-Bien";
	$bien = "Bien";
	$tres_bien = "Très-Bien";
	$excellent = "Excellent";


	if(in_array($moy_edhc, $moys_nulle)){

		return $nulle;

	}else if(in_array($moy_edhc, $moys_mauvais)){

		return $mauvais;

	}else if(in_array($moy_edhc, $moys_insuffisant)){

		return $insuffisant;

	}else if(in_array($moy_edhc, $moys_passable)){

		return $passable;

	}else if(in_array($moy_edhc, $moys_assez_bien)){

		return $assez_bien;

	}else if(in_array($moy_edhc, $moys_bien)){

		return $bien;

	}else if(in_array($moy_edhc, $moys_tres_bien)){

		return $tres_bien;

	}else if(in_array($moy_edhc, $moys_excellent)){

		return $excellent;

	}


}


?>