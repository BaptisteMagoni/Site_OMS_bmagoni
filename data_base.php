<?php 
	try{

	$bdd = new PDO('mysql:host=localhost;dbname=bdomsbmagoni;charset=utf8', 'root', '');

	}catch(Exception $e){

		echo "Une erreur est survenu à la connexion de la base de donnée ! \n";

}
?>