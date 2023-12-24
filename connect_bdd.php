<?php

 	try{
 		$bdd = new PDO('mysql:host=localhost;dbname=gest_edu','root','');
 	}catch(Exception $e){

 		die('erreur: ' .$e->getMessage());
 	}

?>